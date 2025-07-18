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

// Check login
if (!isset($_SESSION['username'])) {
    echo "You must be logged in to book.";
    exit;
}

$username = $_SESSION['username'];

// Get user info
$stmt = $conn->prepare("SELECT userID, firstname FROM usercred WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo "User not found.";
    exit;
}
$row = $result->fetch_assoc();
$userID = $row['userID'];
$firstname = strtoupper($row['firstname']);
$stmt->close();

// Form data
$guests = $_POST['guests'];
$roomType = $_POST['roomType'];
$resDateStart = $_POST['resDateStart'];
$resDateEnd = $_POST['resDateEnd'];

// Transaction ID Generation
$first2 = strtoupper(substr($firstname, 0, 2));                        // TH
$monthShort = strtoupper(date('M', strtotime($resDateStart)));        // FEB
$day = date('d', strtotime($resDateStart));                           // 10
$month2 = date('m', strtotime($resDateStart));                        // 02
$year2 = date('y', strtotime($resDateStart));                         // 22
$roomCode = strtoupper(substr($roomType, 0, 3));                      // FIC

// Get count of existing bookings
$countResult = $conn->query("SELECT COUNT(*) as count FROM bookcred");
$countRow = $countResult->fetch_assoc();
$count = str_pad($countRow['count'] + 1, 5, "0", STR_PAD_LEFT);       // 00001

// Final Transaction ID
$transactionID = "{$first2}{$monthShort}{$day}{$month2}{$year2}-{$roomCode}{$count}";

// Insert booking
$insert = $conn->prepare("INSERT INTO bookcred (transactionID, userID, roomtype, guests, resdatestart, resdateend)
                          VALUES (?, ?, ?, ?, ?, ?)");
$insert->bind_param("sissss", $transactionID, $userID, $roomType, $guests, $resDateStart, $resDateEnd);

if ($insert->execute()) {
    $_SESSION['booking'] = [
        'transactionID' => $transactionID,
        'userID' => $userID,
        'guests' => $guests,
        'roomType' => $roomType,
        'resDateStart' => $resDateStart,
        'resDateEnd' => $resDateEnd
    ];
    header("Location: TransacId.php");
    exit;
} else {
    echo "Error: " . $insert->error;
}
?>
