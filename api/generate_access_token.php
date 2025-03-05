<?php 
function getAccessToken() {
    $clientId = 'ATYj-7ZzewIea9u9_RULBGM3Esdwjd-4bIx0BY0BSJ43iSPzU9BLwwMXkDmwlRmDqC4mmNAR0ZjEFyEK';
    $clientSecret = 'ECbYtQYtWhHCKtexAro9BuiosHS904UosEZusLwRGccQIxhelClwtZJ-ea4oWgs9g1pCfm9Zhl_M2uNI';
    $url = "https://api-m.sandbox.paypal.com/v1/oauth2/token";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Basic " . base64_encode("$clientId:$clientSecret"),
        "Content-Type: application/x-www-form-urlencoded"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response);
    return $json->access_token;
}
?>