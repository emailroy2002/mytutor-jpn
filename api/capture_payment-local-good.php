<?php
header('Content-Type: application/json');


require('paypal-config.php'); // Ensure this file correctly gets your PayPal access token

// Get request body

$input = json_decode(file_get_contents("php://input"), true);
$orderId = $input["orderID"] ?? null;
if (!$orderId) {
    echo json_encode(["error" => "Invalid order ID"]);
    exit;
}

// Get access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$url/v1/oauth2/token");
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



// Capture payment

// Capture payment
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$url/v2/checkout/orders/$orderId/capture");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $accessToken"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = json_decode(curl_exec($ch), true);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Check if PayPal responded with an error
if ($httpCode >= 400) {
    $error = $response['message'] ?? ($response['error_description'] ?? 'Unknown error');
    echo json_encode(["status" => "FAILED", "error" => $error, "details" => $response]);
} else {
    $status = $response["status"] ?? "FAILED";
    echo json_encode(["status" => $status, "details" => $response]);
}


/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$url/v2/checkout/orders/$orderId/capture");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $accessToken"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = json_decode(curl_exec($ch), true);
curl_close($ch);

$status = $response["status"] ?? "FAILED";
echo json_encode(["status" => $status]);
*/



?>