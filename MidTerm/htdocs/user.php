<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// DB Connection
$host = "sql300.infinityfree.com";
$db_user = "if0_39385475";
$db_pass = "EyfTf8ZDoWKAK";
$db_name = "if0_39385475_hoteldatabase";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details
$stmt = $conn->prepare("SELECT userID, firstname, lastname, birthday, username FROM usercred WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $userID = $user['userID'];
} else {
    echo "User not found.";
    exit();
}

// Fetch bookings
$booking_stmt = $conn->prepare("SELECT transactionID, roomtype, guests, resdatestart, resdateend, payment_status FROM bookcred WHERE userID = ? ORDER BY resdatestart DESC");
$booking_stmt->bind_param("i", $userID);
$booking_stmt->execute();
$booking_result = $booking_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css?v=5">
    <style>
        .dashboard {
            max-width: 1100px;
            margin: 40px auto;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.4);
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .info {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            margin-bottom: 30px;
            background-color: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 12px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .info p {
            font-size: 1.1em;
            margin: 5px 0;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .button-inline {
            font-size: 1em;
            background-color: var(--color1, #FDA085);
            color: white;
            text-decoration: none;
            border: none;
            font-family: "Varela Round", sans-serif;
            padding: 12px 24px;
            border-radius: 30px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            min-width: 140px;
        }

        .button-inline:hover {
            background-color: var(--color1g, #F6D365);
            color: black;
        }

        .button-inline.danger {
            background-color: #e74c3c;
        }

        .button-inline.danger:hover {
            background-color: #ff6b6b;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            border-radius: 12px;
            overflow: hidden;
        }

        thead {
            background-color: #6FD6FF;
        }

        thead th {
            color: black;
            padding: 14px;
            text-align: center;
            font-weight: bold;
        }

        tbody td {
            color: white;
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        tbody tr:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .no-booking {
            margin-top: 20px;
            padding: 20px;
            text-align: center;
            font-size: 1.1em;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 10px;
            color: white;
        }

        @media (max-width: 768px) {
            thead {
                display: none;
            }

            table, tbody, tr, td {
                display: block;
                width: 100%;
            }

            tr {
                margin-bottom: 15px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 10px;
                padding: 10px;
            }

            td {
                text-align: right;
                position: relative;
                padding-left: 50%;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                top: 10px;
                font-weight: bold;
                color: #BFF098;
                text-align: left;
            }
        }
    </style>
</head>
<body>

<div class="dashboard">
    <h2>Welcome, <?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?>!</h2>

    <div class="info">
        <p><strong>Full Name:</strong> <?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?></p>
        <p><strong>Birthday:</strong> <?= htmlspecialchars($user['birthday']) ?></p>
        <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
    </div>

    <div class="actions">
        <a href="booking.php" class="button-inline">Book a Room</a>
        <a href="logout.php" class="button-inline danger">Logout</a>
    </div>

    <h3>Your Bookings</h3>

    <?php if ($booking_result->num_rows > 0): ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Room Type</th>
                        <th>Guests</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($booking = $booking_result->fetch_assoc()): ?>
                        <tr>
                            <td data-label="Transaction ID"><?= htmlspecialchars($booking['transactionID']) ?></td>
                            <td data-label="Room Type"><?= htmlspecialchars($booking['roomtype']) ?></td>
                            <td data-label="Guests"><?= htmlspecialchars($booking['guests']) ?></td>
                            <td data-label="Start Date"><?= htmlspecialchars($booking['resdatestart']) ?></td>
                            <td data-label="End Date"><?= htmlspecialchars($booking['resdateend']) ?></td>
                            <td data-label="Payment Status"><?= htmlspecialchars($booking['payment_status']) ?></td>
                            <td data-label="Action">
                                <?php if ($booking['payment_status'] == 'Pending'): ?>
                                    <form method="post" action="set_booking_session.php" style="margin: 0;">
                                        <input type="hidden" name="transactionID" value="<?= $booking['transactionID'] ?>">
                                        <button type="submit" class="button-inline">Pay</button>
                                    </form>
                                <?php else: ?>
                                    <span style="color: #7CFC00;">Paid</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="no-booking">You haven't made any bookings yet.</div>
    <?php endif; ?>
</div>

</body>
</html>
