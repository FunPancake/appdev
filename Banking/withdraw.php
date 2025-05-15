<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = floatval($_POST['amount']);
    if ($amount > $_SESSION['balance']) {
        $error = 'Insufficient funds.';
    } else {
        $_SESSION['balance'] -= $amount;  // Update balance
        header('Location: balance.php');  // Redirect to balance page
        exit();
    }
}
?>
<!DOCTYPE html>
<!-- CREATE FORM HERE -->
<form action="" method="POST">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount">
        <button type="submit">Withdraw</button>
    </form>
    <a href="index.php">Back to Home</a>
