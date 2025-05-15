
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
CREATE FORM HERE