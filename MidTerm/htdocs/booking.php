<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Room Booking</title>
    <link rel="stylesheet" href="style.css?v=3">
    <style>
        .booking-form {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background-color: rgba(255,255,255,0.05);
            border-radius: 16px;
            backdrop-filter: blur(6px);
            color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.4);
        }

        .booking-form h2 {
            text-align: center;
            margin-bottom: 25px;
            color: var(--color2g);
        }

        .booking-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .booking-form input,
        .booking-form select {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: none;
            border-radius: 8px;
            background-color: rgba(255,255,255,0.1);
            color: white;
        }

        .booking-form input[type="submit"] {
            background-color: var(--color1);
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .booking-form input[type="submit"]:hover {
            background-color: var(--color1g);
            color: black;
        }

        .note {
            font-size: 0.9em;
            color: #FFD700;
            margin-top: -12px;
            margin-bottom: 18px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            padding: 12px 24px;
            background-color: #6FD6FF;
            color: black;
            border-radius: 30px;
            text-align: center;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            background-color: #BFF098;
            color: black;
        }

        @media (max-width: 600px) {
            .booking-form {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="booking-form">
    <h2>Book a Room</h2>
    <form action="process_booking.php" method="POST">
        <label for="guests">Number of Guests</label>
        <select name="guests" id="guests" required>
            <option value="" disabled selected>Select guests</option>
            <option value="1">1 Guest</option>
            <option value="2">2 Guests</option>
            <option value="3">3 Guests</option>
            <option value="4">4 Guests</option>
            <option value="5">5 Guests</option>
        </select>

        <label for="resDateStart">Start Date</label>
        <input type="date" name="resDateStart" id="resDateStart" required>

        <label for="resDateEnd">End Date</label>
        <input type="date" name="resDateEnd" id="resDateEnd" required>
        <div class="note" id="dateNote" style="display: none;">
            *Start date must be at least 2 days from today, and end date must be at least 1 night after start date.
        </div>

        <label for="roomType">Room Type</label>
        <select name="roomType" id="roomType" required>
            <option value="" disabled selected>Select a room type</option>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Twin">Twin</option>
            <option value="Suite">Suite</option>
        </select>

        <input type="submit" value="Book Now">
    </form>

    <a href="user.php" class="back-link">← Back to Dashboard</a>
</div>

<script>
    const startInput = document.getElementById("resDateStart");
    const endInput = document.getElementById("resDateEnd");
    const note = document.getElementById("dateNote");

    const today = new Date();
    today.setDate(today.getDate() + 2);
    const minStart = today.toISOString().split("T")[0];
    startInput.min = minStart;

    startInput.addEventListener("change", function () {
        const startDate = new Date(startInput.value);
        startDate.setDate(startDate.getDate() + 1);
        const minEnd = startDate.toISOString().split("T")[0];
        endInput.min = minEnd;
        endInput.value = "";

        // Show note
        note.style.display = "block";
    });

    endInput.addEventListener("change", function () {
        note.style.display = "none";
    });
</script>

</body>
</html>
