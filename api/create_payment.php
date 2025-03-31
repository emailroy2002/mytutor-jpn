<?php
header('Content-Type: application/json');

require('paypal-config.php');



// Get price from request
$input = json_decode(file_get_contents("php://input"), true);
$price = $input["price"] ?? "10.00"; // Default to $10 if no price is sent



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$url/v1/oauth2/token");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json", 
    "Accept-Language: en_US"
]);
curl_setopt($ch, CURLOPT_USERPWD, "$clientId:$secret");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}

$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$data = json_decode($response, true);
if ($httpStatus !== 200) {
    echo json_encode(["error" => "HTTP Status: $httpStatus", "response" => $response]);
    exit;
}

$accessToken = $data['access_token'] ?? null;
if (!$accessToken) {
    echo json_encode(["error" => "Failed to get PayPal access token", "response" => $response]);
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
curl_setopt($ch, CURLOPT_URL, "$url/v2/checkout/orders");
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
