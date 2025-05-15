
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
CREATE FORM HERE