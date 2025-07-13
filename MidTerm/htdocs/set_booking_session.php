<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if POST data exists and is valid
if (!isset($_POST['transactionID'])) {
    echo "Transaction ID not received.";
    exit();
}

$transactionID = trim($_POST['transactionID']);

// Allow alphanumeric with dashes (e.g., JOJUL170725-DOU00001)
if (!preg_match('/^[a-zA-Z0-9\-]+$/', $transactionID)) {
    echo "Invalid transaction ID received.";
    exit();
}

// DB Connection
$host = "sql300.infinityfree.com";
$db_user = "if0_39385475";
$db_pass = "EyfTf8ZDoWKAK";
$db_name = "if0_39385475_hoteldatabase";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch booking data
$stmt = $conn->prepare("SELECT * FROM bookcred WHERE transactionID = ?");
$stmt->bind_param("s", $transactionID); // 's' because transactionID is a string
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Booking not found for transaction ID: " . htmlspecialchars($transactionID);
    exit();
}

$booking = $result->fetch_assoc();
$_SESSION['booking'] = $booking;

// Redirect to payment page
header("Location: payment.php");
exit();
?>
