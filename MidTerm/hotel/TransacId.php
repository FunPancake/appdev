<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['booking'])) {
    header("Location: user.php");
    exit();
}

$booking = $_SESSION['booking'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="style.css?v=3">
    <style>
        .confirmation-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 40px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 16px;
            backdrop-filter: blur(6px);
            color: var(--white);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
            text-align: center;
        }

        .confirmation-container h2 {
            color: var(--color2g);
            font-size: 2.2em;
            margin-bottom: 20px;
        }

        .confirmation-container .info {
            font-size: 1.2em;
            margin: 12px 0;
            color: var(--light);
        }

        .confirmation-container a {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            background-color: var(--color1);
            color: white;
            padding: 14px 28px;
            border-radius: 30px;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        .confirmation-container a:hover {
            background-color: var(--color1g);
            color: black;
        }
    </style>
</head>
<body>

<div class="confirmation-container">
    <h2>Booking Successful!</h2>
    <div class="info"><strong>Transaction ID:</strong> <?= htmlspecialchars($booking['transactionID']) ?></div>
    <div class="info"><strong>Room Type:</strong> <?= htmlspecialchars($booking['roomType']) ?></div>
    <div class="info"><strong>Guests:</strong> <?= htmlspecialchars($booking['guests']) ?></div>
    <div class="info"><strong>From:</strong> <?= htmlspecialchars($booking['resDateStart']) ?></div>
    <div class="info"><strong>To:</strong> <?= htmlspecialchars($booking['resDateEnd']) ?></div>
    <a href="user.php">← Back to Dashboard</a>
</div>

</body>
</html>
