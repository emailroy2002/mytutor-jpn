<?php

require('generate_access_token.php'); // Ensure this file gets your PayPal access token

function updateBillingPlan($accessToken, $planId) {
    $url = "https://api-m.sandbox.paypal.com/v1/billing/plans/" . urlencode($planId);

    $patchData = [
        [
            "op" => "replace",
            "path" => "/payment_preferences/setup_fee",
            "value" => [
                "currency_code" => "JPY", // Make sure JPY is the original currency of the plan
                "value" => "0" // Fixing invalid parameter issue
            ]
        ]
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($patchData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $accessToken",
        "Content-Type: application/json"
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode >= 200 && $httpCode < 300) {
        return json_decode($response, true); // Successful response
    } else {
        return ["error" => "Failed to update plan $planId", "response" => json_decode($response, true)];
    }
}

// Array of Plan IDs
$planIds = [
    "P-1PA0458901993894CM7DOVDQ",
    "P-8MC092417M473704AM7DOZVA",
    "P-3XS68617TC7460142M7DPGQA",
    "P-10U68481PP335750KM7DPGQA",
    "P-418781999U067851FM7DPGQI",
    "P-1KJ38852DR361722CM7DPGQI",
    "P-0VP11961YX6201515M7DPGQQ",
];

$accessToken = getAccessToken();

$results = [];
foreach ($planIds as $planId) {
    $results[$planId] = updateBillingPlan($accessToken, $planId);
}

echo "<pre>";
print_r($results); // Show the response

?>
