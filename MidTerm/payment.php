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
$resDate = $booking['resDate']; // Expected: YYYY-MM-DD

// Room pricing
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
$total_cost = $base_price + ($extra_guests * $extra_price_per_guest);

// Penalty logic
$today = new DateTime();
$reservation_date = new DateTime($resDate);
$diff_days = $today->diff($reservation_date)->days;
$penalty_percent = 0;
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cancel'])) {
        if ($reservation_date < $today) {
            $message = "❌ Booking date already passed. Cannot cancel.";
        } else {
            if ($diff_days >= 5) {
                $penalty_percent = 10;
            } elseif ($diff_days == 4) {
                $penalty_percent = 15;
            } elseif ($diff_days >= 2) {
                $penalty_percent = 20;
            } else {
                $penalty_percent = 100;
                $message = "⚠️ Too late to cancel. Full room rate will be charged.";
            }
            $penalty_amount = ($penalty_percent / 100) * $base_price;
            if ($penalty_percent < 100) {
                $message = "✅ Booking cancelled. Penalty: {$penalty_percent}% of base rate (₱" . number_format($penalty_amount) . ")";
            }
        }
    }

    if (isset($_POST['pay'])) {
        $message = "✅ Payment of ₱" . number_format($total_cost) . " successful. Thank you!";
        // You can add database saving logic here if needed
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Payment Page</h1>
</header>

<main>
    <section>
        <h2>Payment Summary</h2>
        <p><strong>Room Type:</strong> <?= htmlspecialchars($room) ?></p>
        <p><strong>Guests:</strong> <?= htmlspecialchars($guests) ?></p>
        <p><strong>Reservation Date:</strong> <?= htmlspecialchars($resDate) ?></p>
        <p><strong>Base Price:</strong> ₱<?= number_format($base_price) ?></p>
        <p><strong>Extra Guests (<?= $extra_guests ?> × ₱<?= number_format($extra_price_per_guest) ?>):</strong> ₱<?= number_format($extra_guests * $extra_price_per_guest) ?></p>
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
            <button type="submit" name="cancel" class="extra-button">Cancel Booking</button>
        </form>
    </section>
</main>

<footer>
    &copy; <?= date('Y') ?> Hotel Management System. All rights reserved.
</footer>

</body>
</html>
