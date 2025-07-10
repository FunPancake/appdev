<?php
session_start();
date_default_timezone_set('Asia/Manila');

// Check if booking session exists
if (!isset($_SESSION['booking'])) {
    echo "No booking data found.";
    exit;
}

$booking = $_SESSION['booking'];
$guests = (int)$booking['guests'];
$room = $booking['roomType'];
$resDateStart = $booking['resDateStart'];
$resDateEnd = $booking['resDateEnd'];

// Room pricing logic
$base_price = 0;
$extra_price_per_guest = 0;
$included_guests = 1;

switch ($room) {
    case 'Single':
        $base_price = 1000;
        $extra_price_per_guest = 500;
        $included_guests = 1;
        break;
    case 'Double':
        $base_price = 1800;
        $extra_price_per_guest = 400;
        $included_guests = 2;
        break;
    case 'Twin':
        $base_price = 2000;
        $extra_price_per_guest = 400;
        $included_guests = 2;
        break;
    case 'Suite':
        $base_price = 3000;
        $extra_price_per_guest = 700;
        $included_guests = 2;
        break;
}

$extra_guests = max(0, $guests - $included_guests);

// Calculate number of nights
$start = new DateTime($resDateStart);
$end = new DateTime($resDateEnd);
$nights = $start->diff($end)->days;
$nights = max(1, $nights);

$room_total = $base_price * $nights;
$extra_guest_total = ($extra_price_per_guest * $extra_guests) * $nights;
$total_cost = $room_total + $extra_guest_total;

// Penalty logic
$today = new DateTime();
$diff_days = $today->diff($start)->days;
$penalty_percent = 0;
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cancel'])) {
        if ($start < $today) {
            $message = "Booking date already passed. Cannot cancel.";
        } else {
            if ($diff_days >= 5) {
                $penalty_percent = 10;
            } elseif ($diff_days == 4) {
                $penalty_percent = 15;
            } elseif ($diff_days >= 2) {
                $penalty_percent = 20;
            } else {
                $penalty_percent = 100;
                $message = "Too late to cancel. Full room rate will be charged.";
            }

            $penalty_amount = ($penalty_percent / 100) * $room_total;

            if ($penalty_percent < 100) {
                $message = "Booking cancelled. Penalty: {$penalty_percent}% of room total (₱" . number_format($penalty_amount) . ")";
            }
        }
    }

    if (isset($_POST['pay'])) {
        $message = "Payment of ₱" . number_format($total_cost) . " successful. Thank you.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="style.css?v=1">
    <style>
        main {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        section {
            margin-bottom: 20px;
        }
        button {
            background-color: #2193b0;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 10px;
            font-size: 16px;
        }
        button:hover {
            background-color: #19778f;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            color: #555;
        }
        .form-container {
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h1 style="text-align:center; color:white;">Payment Page</h1>
</header>

<main>
    <section>
        <h2>Booking Summary</h2>
        <p><strong>Room Type:</strong> <?= htmlspecialchars($room) ?></p>
        <p><strong>Guests:</strong> <?= htmlspecialchars($guests) ?></p>
        <p><strong>Reservation:</strong> <?= htmlspecialchars($resDateStart) ?> to <?= htmlspecialchars($resDateEnd) ?> (<?= $nights ?> night<?= $nights > 1 ? 's' : '' ?>)</p>
        <p><strong>Base Price × <?= $nights ?> night(s):</strong> ₱<?= number_format($room_total) ?></p>
        <p><strong>Extra Guest Fee × <?= $nights ?> night(s):</strong> ₱<?= number_format($extra_guest_total) ?></p>
        <hr>
        <p><strong>Total Payment:</strong> <span style="font-size: 20px;">₱<?= number_format($total_cost) ?></span></p>
    </section>

    <?php if (!empty($message)): ?>
        <section>
            <p style="color: darkred; font-weight: bold;"><?= $message ?></p>
        </section>
    <?php endif; ?>

    <section class="form-container">
        <form method="post">
            <button type="submit" name="pay">Pay Now</button>
            <button type="submit" name="cancel">Cancel Booking</button>
        </form>
    </section>
</main>

<footer>
    &copy; <?= date('Y') ?> Hotel Management System. All rights reserved.
</footer>

</body>
</html>