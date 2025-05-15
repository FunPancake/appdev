
<?php
session_start();

// Clear previous data
//unset($_SESSION['balance']);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = floatval($_POST['amount']);
    $_SESSION['balance'] += $amount;  // Update balance
    header('Location: balance.php');  // Redirect to balance page
    exit();
}
?>
<!DOCTYPE html>
<!-- CREATE FORM HERE -->

<form action="" method="post">
    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" required>
    <button type="submit">Deposit</button>
</form>
    <a href="index.php">Back to Home</a>
