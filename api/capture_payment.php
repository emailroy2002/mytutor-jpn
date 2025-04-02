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

// PayPal API URL (LIVE environment)
$apiBase = "https://api-m.paypal.com";

// Get access token
$auth = base64_encode("$clientId:$secret");
$tokenOptions = [
    'http' => [
        'method' => 'POST',
        'header' => "Accept: application/json\r\n" .
                    "Accept-Language: en_US\r\n" .
                    "Authorization: Basic $auth\r\n" .
                    "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => "grant_type=client_credentials",
        'ignore_errors' => true
    ]
];

$context = stream_context_create($tokenOptions);
$tokenResponse = file_get_contents("$apiBase/v1/oauth2/token", false, $context);
$response = json_decode($tokenResponse, true);

$accessToken = $response["access_token"] ?? null;
if (!$accessToken) {
    echo json_encode(["error" => "Failed to get PayPal access token", "details" => $response]);
    exit;
}

// Capture payment
$paymentOptions = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/json\r\n" .
                    "Authorization: Bearer $accessToken\r\n",
        'content' => '',
        'ignore_errors' => true
    ]
];

$context = stream_context_create($paymentOptions);
$paymentResponse = file_get_contents("$apiBase/v2/checkout/orders/$orderId/capture", false, $context);
$response = json_decode($paymentResponse, true);

// Check HTTP response code
$httpResponseHeader = $http_response_header ?? [];
$httpCode = (int)explode(' ', $httpResponseHeader[0] ?? 'HTTP/1.1 500')[1];

if ($httpCode >= 400) {
    $error = $response['message'] ?? ($response['error_description'] ?? 'Unknown error');
    echo json_encode(["status" => "FAILED", "error" => $error, "details" => $response]);
} else {
    $status = $response["status"] ?? "FAILED";
    echo json_encode(["status" => $status, "details" => $response]);
}