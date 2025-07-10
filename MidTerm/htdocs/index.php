<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$message = "";

// Database connection
$host = "sql300.infinityfree.com";
$db_user = "if0_39385475";
$db_pass = "EyfTf8ZDoWKAK";
$db_name = "if0_39385475_hoteldatabase";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM usercred WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $_SESSION['username'] = $user;
        header("Location: user.php");
        exit();
    } else {
        $message = "<p class='error'>Incorrect username or password!</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css?v=1">
  <style>
    .button-group {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }
    .button-group input,
    .button-group button {
      width: 100%;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>

    <form method="POST" action="">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>

      <div class="button-group">
        <input type="submit" name="login" value="Login">
        <button type="button" onclick="window.location.href='registration.php'">Register</button>
      </div>
    </form>

    <?php echo $message; ?>
  </div>

</body>
</html>