<?php 

require('../generate_access_token.php'); // Ensure this file correctly gets your PayPal access token

function createProduct($accessToken) {
    $url = "https://api-m.sandbox.paypal.com/v1/catalogs/products";

    $data = [
        "name" => "Subscription Service",
        "description" => "Unlimited monthly subscription",
        "type" => "SERVICE",
        "category" => "SOFTWARE", // Change if needed
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

$accessToken = getAccessToken();
$product = createProduct($accessToken);
print_r($product);



?>
