<?php
header("Content-Type: application/json");

// Enable error reporting (for debugging, remove in production)
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Include database connection
require_once "config.php";  // Ensure this file connects to your database

// Check for POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate subscription ID
    if (!isset($input["subscriptionID"]) || empty($input["subscriptionID"])) {
        echo json_encode(["success" => false, "message" => "Missing subscription ID"]);
        exit;
    }

    $subscriptionID = htmlspecialchars(strip_tags($input["subscriptionID"])); // Sanitize input

    // Store in database
    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO subscriptions (subscription_id, created_at) VALUES (:subscriptionID, NOW())");
        $stmt->bindParam(":subscriptionID", $subscriptionID, PDO::PARAM_STR);
        $stmt->execute();

        echo json_encode(["success" => true, "message" => "Subscription saved successfully"]);
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>
