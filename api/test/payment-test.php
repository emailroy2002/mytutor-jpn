<?php

$clientId       = "ATYj-7ZzewIea9u9_RULBGM3Esdwjd-4bIx0BY0BSJ43iSPzU9BLwwMXkDmwlRmDqC4mmNAR0ZjEFyEK";
$clientSecret         = "ECbYtQYtWhHCKtexAro9BuiosHS904UosEZusLwRGccQIxhelClwtZJ-ea4oWgs9g1pCfm9Zhl_M2uNI";
$apiUrl            = "https://api-m.sandbox.paypal.com";


function getAccessToken($clientId, $clientSecret, $apiUrl) {
    $ch = curl_init("$apiUrl/v1/oauth2/token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$clientId:$clientSecret");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    $response = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($response, true);
    return $json['access_token'] ?? null;
}

function createOrder($accessToken, $apiUrl) {
    $orderData = [
        "intent" => "CAPTURE",
        "purchase_units" => [[
            "amount" => [
                "currency_code" => "USD",
                "value" => "10.00"
            ]
        ]]
    ];
    
    $ch = curl_init("$apiUrl/v2/checkout/orders");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer $accessToken"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderData));
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

function captureOrder($accessToken, $apiUrl, $orderId) {
    $ch = curl_init("$apiUrl/v2/checkout/orders/$orderId/capture");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer $accessToken"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([]));
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

$accessToken = getAccessToken($clientId, $clientSecret, $apiUrl);
if (!$accessToken) {
    die("Error retrieving access token");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'create') {
        $order = createOrder($accessToken, $apiUrl);
        echo json_encode($order);
    } elseif ($_POST['action'] === 'capture' && isset($_POST['orderID'])) {
        $capture = captureOrder($accessToken, $apiUrl, $_POST['orderID']);
        echo json_encode($capture);
    }
} else {
    echo "<form method='post'>
        <input type='hidden' name='action' value='create'>
        <button type='submit'>Create Payment</button>
    </form>";
}

?>
