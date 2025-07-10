<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "sql300.infinityfree.com";
$db_user = "if0_39385475";
$db_pass = "EyfTf8ZDoWKAK";
$db_name = "if0_39385475_hoteldatabase";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get logged-in username
if (!isset($_SESSION['username'])) {
    echo "You must be logged in to book.";
    exit;
}

$username = $_SESSION['username'];

// Get userID from usercred
$stmt = $conn->prepare("SELECT userID FROM usercred WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo "User not found.";
    exit;
}
$row = $result->fetch_assoc();
$userID = $row['userID'];
$stmt->close();

// Get booking inputs
$guests = $_POST['guests'];
$roomType = $_POST['roomType'];
$resDateStart = $_POST['resDateStart'];
$resDateEnd = $_POST['resDateEnd'];

// Insert into bookcred
$insert = $conn->prepare("INSERT INTO bookcred (userID, roomtype, guests, resdatestart, resdateend)
                          VALUES (?, ?, ?, ?, ?)");
$insert->bind_param("isiss", $userID, $roomType, $guests, $resDateStart, $resDateEnd);

if ($insert->execute()) {
    $transactionID = $insert->insert_id;
    $_SESSION['booking'] = [
        'transactionID' => $transactionID,
        'guests' => $guests,
        'roomType' => $roomType,
        'resDateStart' => $resDateStart,
        'resDateEnd' => $resDateEnd
    ];
    header("Location: Transacid.php");
    exit;
} else {
    echo "Error: " . $insert->error;
}
?>