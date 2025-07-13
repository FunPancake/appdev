<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

// DB Setup
$host = "sql300.infinityfree.com";
$db_user = "if0_39385475";
$db_pass = "EyfTf8ZDoWKAK";
$db_name = "if0_39385475_hoteldatabase";
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle edit or cancel
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cancel_booking'])) {
        $transID = $_POST['transactionID'];
        $conn->query("UPDATE bookcred SET payment_status = 'Cancelled' WHERE transactionID = '$transID'");
    }

    if (isset($_POST['edit_booking'])) {
        $transID = $_POST['transactionID'];
        $roomtype = $_POST['roomtype'];
        $start = $_POST['resdatestart'];
        $end = $_POST['resdateend'];

        $stmt = $conn->prepare("UPDATE bookcred SET roomtype=?, resdatestart=?, resdateend=? WHERE transactionID=?");
        $stmt->bind_param("sssi", $roomtype, $start, $end, $transID);
        $stmt->execute();
    }
}

// Fetch bookings with user info
$query = "SELECT b.transactionID, u.firstname, u.lastname, b.roomtype, b.resdatestart, b.resdateend, b.guests, b.payment_status
          FROM bookcred b
          JOIN usercred u ON b.userID = u.userID
          ORDER BY b.resdatestart DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css?v=7">
    <style>
        body {
            font-family: "Varela Round", sans-serif;
            margin: 0;
            background: url('your-background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .admin-container {
            max-width: 1200px;
            margin: 60px auto;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .admin-header h2 {
            margin: 0;
        }

        .button-17 {
            font-size: 0.95em;
            background-color: #FDA085;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .button-17:hover {
            background-color: #F6D365;
            color: black;
        }

        .button-17.danger {
            background-color: #e74c3c;
        }

        .button-17.danger:hover {
            background-color: #ff6b6b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            text-align: center;
            padding: 12px;
            color: white;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        th {
            background-color: #6FD6FF;
            color: black;
        }

        tr:hover {
            background-color: rgba(255,255,255,0.1);
        }

        form.admin-actions {
            display: contents;
        }

        @media (max-width: 768px) {
            .admin-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            tr {
                margin-bottom: 20px;
                border: 1px solid rgba(255,255,255,0.2);
                border-radius: 10px;
                padding: 10px;
            }

            td {
                position: relative;
                padding-left: 50%;
                text-align: right;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                top: 10px;
                font-weight: bold;
                color: #BFF098;
            }

            th {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="admin-container">
    <div class="admin-header">
        <h2>Admin Dashboard</h2>
        <a href="logout.php" class="button-17 danger">Logout</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>User</th>
                <th>Room Type</th>
                <th>Guests</th>
                <th>Start</th>
                <th>End</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <form method="post" class="admin-actions">
                    <input type="hidden" name="transactionID" value="<?= $row['transactionID'] ?>">
                    <td data-label="Transaction ID"><?= $row['transactionID'] ?></td>
                    <td data-label="User"><?= htmlspecialchars($row['firstname'] . ' ' . $row['lastname']) ?></td>
                    <td data-label="Room Type">
                        <select name="roomtype">
                            <option <?= $row['roomtype'] == 'Single' ? 'selected' : '' ?>>Single</option>
                            <option <?= $row['roomtype'] == 'Double' ? 'selected' : '' ?>>Double</option>
                            <option <?= $row['roomtype'] == 'Twin' ? 'selected' : '' ?>>Twin</option>
                            <option <?= $row['roomtype'] == 'Suite' ? 'selected' : '' ?>>Suite</option>
                        </select>
                    </td>
                    <td data-label="Guests"><?= $row['guests'] ?></td>
                    <td data-label="Start"><input type="date" name="resdatestart" value="<?= $row['resdatestart'] ?>"></td>
                    <td data-label="End"><input type="date" name="resdateend" value="<?= $row['resdateend'] ?>"></td>
                    <td data-label="Status"><?= $row['payment_status'] ?></td>
                    <td data-label="Actions">
                        <button type="submit" name="edit_booking" class="button-17">Edit</button>
                        <button type="submit" name="cancel_booking" class="button-17 danger" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel</button>
                    </td>
                </form>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
