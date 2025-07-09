<?php
session_start();

// Get the form data
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$resdate = $_POST['resdate'] ?? '';
$roomType = $_POST['roomType'] ?? '';

// Validate that the reservation date is at least 2 days ahead
$today = new DateTime();
$today->modify('+2 days');
$reservationDate = new DateTime($resdate);

if ($reservationDate < $today) {
    echo "<script>alert('Reservation must be at least 2 days from today.'); window.history.back();</script>";
    exit;
}

// Optional: Save to session for now (or use database)
$_SESSION['booking'] = [
    'firstname' => $firstname,
    'lastname' => $lastname,
    'resdate' => $resdate,
    'roomType' => $roomType
];

// OPTIONAL: Save to database
/*
$connection = new mysqli("localhost", "root", "", "hotel_db");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$stmt = $connection->prepare("INSERT INTO bookings (firstname, lastname, resdate, roomType) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $resdate, $roomType);
$stmt->execute();
$stmt->close();
$connection->close();
*/

// Redirect to dashboard or show summary
header("Location: dashboard.php");
exit;
?>
