<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hotel Room Booking</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f7;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .booking-form {
      background: white;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 400px;
    }

    .booking-form h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .booking-form label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      font-weight: bold;
      color: #444;
    }

    .booking-form input[type="date"],
    .booking-form select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    .booking-form input[type="submit"] {
      margin-top: 20px;
      width: 100%;
      padding: 12px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    .booking-form input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .note {
      font-size: 12px;
      color: gray;
    }
  </style>
</head>
<body>

<div class="booking-form">
  <h2>Hotel Room Booking</h2>
  <form action="process_booking.php" method="POST">
    <label for="guests">Number of Guests</label>
    <select name="guests" required>
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
    <div class="note">* Reservation must be at least 2 days from today, and at least 1 night.</div>

    <label for="roomType">Room Type</label>
    <select name="roomType" required>
      <option value="Single">Single</option>
      <option value="Double">Double</option>
      <option value="Twin">Twin</option>
      <option value="Suite">Suite</option>
    </select>

    <input type="submit" value="Book Now">
  </form>
</div>

<script>
  const startInput = document.getElementById("resDateStart");
  const endInput = document.getElementById("resDateEnd");

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
  });
</script>

</body>
</html>