<?php
session_start();

if (!isset($_SESSION['booking'])) {
    echo "No booking found.";
    exit;
}

$booking = $_SESSION['booking'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            padding: 30px;
        }
        .card {
            background: white;
            max-width: 500px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.15);
        }
        h2 {
            text-align: center;
        }
        .btn {
            margin-top: 20px;
            display: block;
            text-align: center;
        }
        .btn a {
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        .btn a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Booking Summary</h2>
        <p><strong>Number of Guests:</strong> <?= htmlspecialchars($booking['guests']) ?></p>
        <p><strong>Reservation Date:</strong> <?= htmlspecialchars($booking['resdate']) ?></p>
        <p><strong>Room Type:</strong> <?= htmlspecialchars($booking['roomType']) ?></p>

        <div class="btn">
            <a href="booking.php">Change Booking</a>
        </div>
    </div>
</body>
</html>
