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
$transactionID = $booking['transactionID'] ?? 0;

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
$redirect = false;

// DB Connection
$host = "sql300.infinityfree.com";
$db_user = "if0_39385475";
$db_pass = "EyfTf8ZDoWKAK";
$db_name = "if0_39385475_hoteldatabase";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
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
                // Update booking status to 'Cancelled'
                $stmt = $conn->prepare("UPDATE bookcred SET payment_status = 'Cancelled' WHERE transactionID = ?");
                $stmt->bind_param("i", $transactionID);
                $stmt->execute();

                $message = "Booking cancelled. Penalty: {$penalty_percent}% of room total (₱" . number_format($penalty_amount) . ")";
            }
        }
    }

    if (isset($_POST['pay'])) {
        $stmt = $conn->prepare("UPDATE bookcred SET payment_status = 'Paid' WHERE transactionID = ?");
        $stmt->bind_param("i", $transactionID);
        if ($stmt->execute()) {
            $message = "Payment of ₱" . number_format($total_cost) . " successful. Thank you!";
            $redirect = true;
        } else {
            $message = "Failed to update payment status.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="style.css?v=3">
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
        <section style="margin-top: 20px;">
            <p style="color: darkgreen; font-weight: bold;"><?= $message ?></p>

            <?php if ($redirect): ?>
                <p>You will be redirected to your dashboard in 30 seconds.</p>
                <form method="post" action="user.php">
                    <button class="button-17">Go to Dashboard Now</button>
                </form>
                <script>
                    setTimeout(() => {
                        window.location.href = 'user.php';
                    }, 30000);
                </script>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <section class="form-container" style="margin-top: 30px;">
        <form method="post">
            <button type="submit" name="pay" class="button-17">Pay Now</button>
            <button type="submit" name="cancel" class="button-17">Cancel Booking</button>
        </form>
    </section>
</main>

<footer style="margin-top: 50px; text-align: center;">
    &copy; <?= date('Y') ?> Hotel Management System. All rights reserved.
</footer>

</body>
</html>
