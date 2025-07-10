<?php
session_start();

if (isset($_SESSION['bookingID'])) {
    echo "<h2>Booking successful!</h2>";
    echo "<p>Your transaction ID is: <strong>" . $_SESSION['bookingID'] . "</strong></p>";
    echo "<a href='user.php'>Back to User Page</a>";
} else {
    echo "No booking found.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.1);
            width: 400px;
            text-align: center;
        }
        h2 {
            color: #007BFF;
        }
        .info {
            margin-top: 15px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Booking Successful</h2>
        <div class="info"><strong>Transaction ID:</strong> <?= htmlspecialchars($booking['transactionID']) ?></div>
        <div class="info"><strong>User ID:</strong> <?= htmlspecialchars($booking['userID']) ?></div>
        <div class="info"><strong>Room Type:</strong> <?= htmlspecialchars($booking['roomType']) ?></div>
        <div class="info"><strong>Guests:</strong> <?= htmlspecialchars($booking['guests']) ?></div>
        <div class="info"><strong>From:</strong> <?= htmlspecialchars($booking['resdatestart']) ?></div>
        <div class="info"><strong>To:</strong> <?= htmlspecialchars($booking['resdateend']) ?></div>
        <br><br>
        <a href="user.php">Back to Dashboard</a>
    </div>
</body>
</html>