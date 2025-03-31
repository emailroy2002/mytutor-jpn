<?php 
function getAccessToken() {

    require('paypal-config.php');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $oAuthURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Basic " . base64_encode("$clientId:$secret"),
        "Content-Type: application/x-www-form-urlencoded"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response);
    return $json->access_token;
}
?>