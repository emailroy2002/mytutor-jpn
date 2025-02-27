<?php
header('Content-Type: application/json');

$clientId       = "AUrkj6HkKu1dSZy_jcAQbEaJP1jK77_d8zJ9rkOf8uTc7MDxUtBCHPD8bo3cpqJE5PNqKnk0k4ogsfVX";
$secret         = "EMaY79iqy-7yxXngcOCbADeZMK8p0cBZbgWdz4uiSr818TSi4G4RPK0ItDcFnnpkx9HLey15jVfjbups";
$paypalBaseURL  = "https://api-m.sandbox.paypal.com";


// Get price from request
$input = json_decode(file_get_contents("php://input"), true);
$price = $input["price"] ?? "10.00"; // Default to $10 if no price is sent


// Get access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$paypalBaseURL/v1/oauth2/token");
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Accept: application/json", "Accept-Language: en_US"]);
curl_setopt($ch, CURLOPT_USERPWD, "$clientId:$secret");
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = json_decode(curl_exec($ch));
curl_close($ch);

$accessToken = $response->access_token ?? null;
if (!$accessToken) {
    echo json_encode(["error" => "Failed to get PayPal access token"]);
    exit;
}

// Create order
$orderData = [
    "intent" => "CAPTURE",
    "purchase_units" => [[
        "amount" => ["currency_code" => "JPY", "value" => $price]
    ]]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$paypalBaseURL/v2/checkout/orders");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $accessToken"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = json_decode(curl_exec($ch), true);
curl_close($ch);

$orderId = $response["id"] ?? null;
if (!$orderId) {
    echo json_encode(["error" => "Failed to create order"]);
    exit;
}

echo json_encode(["orderId" => $orderId]);
?>
