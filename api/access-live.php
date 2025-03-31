<?php 
require('paypal-config.php');

// Ensure credentials are set
if (!$clientId || !$secret) {
    echo json_encode(["error" => "PayPal credentials missing"]);
    exit;
}

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$url/v1/oauth2/token");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json",
    "Accept-Language: en_US",
    "Content-Type: application/x-www-form-urlencoded",
    "Authorization: Basic " . base64_encode("$clientId:$secret")
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

// Handle errors
if ($curlError) {
    echo json_encode(["error" => "cURL Error: $curlError"]);
    exit;
}

$responseData = json_decode($response, true);
if ($httpCode !== 200 || !isset($responseData['access_token'])) {
    echo json_encode(["error" => "Failed to retrieve PayPal token", "details" => $responseData]);
    exit;
}

// Store Access Token
$accessToken = $responseData['access_token'];
echo json_encode(["access_token" => $accessToken]);

?>
