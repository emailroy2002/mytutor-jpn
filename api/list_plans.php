<?php


require('generate_access_token.php'); // Ensure this file correctly gets your PayPal access token
function listBillingPlans($accessToken, $productId) {
    $url = "https://api-m.sandbox.paypal.com/v1/billing/plans?product_id=" . urlencode($productId);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $accessToken",
        "Content-Type: application/json"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Usage
$accessToken = getAccessToken();
$productId = "PROD-96F4961667001954S"; // Replace with your actual product ID
$plans = listBillingPlans($accessToken, $productId);

echo "<pre>";

print_r($plans); // Display the response

?>