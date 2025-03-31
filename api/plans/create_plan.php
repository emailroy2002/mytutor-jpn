<?php 

require('../generate_access_token.php'); // Ensure this file correctly gets your PayPal access token


function createBillingPlan($accessToken, $productId, $price, $name, $description) {
    $url = "https://api-m.sandbox.paypal.com/v1/billing/plans";

    $data = [
        "product_id" => $productId, // Dynamic product ID
        "name" => $name,
        "description" => $description,
        "billing_cycles" => [[
            "frequency" => [
                "interval_unit" => "MONTH", // Change if needed
                "interval_count" => 1
            ],
            "tenure_type" => "REGULAR",
            "sequence" => 1,
            "total_cycles" => 0, // 0 means auto-renew indefinitely
            "pricing_scheme" => [
                "fixed_price" => [
                    "value" => strval($price), // Convert price to string
                    "currency_code" => "JPY" // Change currency if needed
                ]
            ]
        ]],
        "payment_preferences" => [
            "auto_bill_outstanding" => true,
            "payment_failure_threshold" => 3
            /*
            "setup_fee" => [
                "value" => "0",
                "currency_code" => "JPY"
            ],
            "setup_fee_failure_action" => "CONTINUE",
            */            
        ],
        "status" => "ACTIVE"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer $accessToken"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Get Access Token
$accessToken = getAccessToken();

// Define multiple plans
$plans = [
    // ["price" => 6980, "name" => "8 lessons per month", "description" => "Take 8 lessons per month for 6980 yen."],   
    // ["price" => 8980, "name" => "12 lessons per month", "description" => "Take 12 lessons per month for 8980 yen."],   
    ["price" => 10980, "name" => "16 lessons per month", "description" => "This plan allows you to take 16 lessons per month for 10,980 yen ."],
    ["price" => 12980 , "name" => "20 lessons per month", "description" => "This plan allows you to take 20 lessons per month for 12,980 yen ."],
    ["price" => 19980 , "name" => "30  lessons per month", "description" => "This plan allows you to take 30  lessons per month for 19,980 yen ."],
    ["price" => 980  , "name" => "1 point per month ", "description" => "This plan allows you to take 1 lessons per month for 980 yen with Multiple reservations per day possible."],
    ["price" => 1800  , "name" => "2 point per month ", "description" => "This plan allows you to take 2 lessons per month for 1800 yen with Multiple reservations per day possible."]
];

// Create multiple billing plans
foreach ($plans as $plan) {
    $createdPlan = createBillingPlan($accessToken, "PROD-96F4961667001954S", $plan["price"], $plan["name"], $plan["description"]);
    print_r($createdPlan); // Output the result
}

?>