<!-- form.php -->
<form action="Transacid.php" method="post">
  First Name: <input type="text" name="firstname" required><br>
  Last Name: <input type="text" name="lastname" required><br>
  Reservation Date: <input type="date" name="resdate" required><br>
  Room Type:
  <select name="roomType" required>
    <option value="1">Single</option>
    <option value="2">Double</option>
    <option value="3">Twin</option>
    <option value="4">Suite</option>
  </select><br>
  <input type="submit" value="Generate Transaction ID">
</form>