<?php
if (function_exists('curl_version')) {
    echo "✅ cURL is installed.\n";
    $curlInfo = curl_version();
    echo "cURL Version: " . $curlInfo['version'] . "\n";
} else {
    echo "❌ cURL is NOT installed.\n";
}
?>