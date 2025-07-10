<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Database connection
$host = "sql300.infinityfree.com";
$db_user = "if0_39385475";
$db_pass = "EyfTf8ZDoWKAK";
$db_name = "if0_39385475_hoteldatabase";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $bday = $_POST['bday'];

    if ($password !== $confirm) {
        $message = "<p class='error'>Passwords do not match!</p>";
    } else {
        $sql = "INSERT INTO usercred (firstname, lastname, username, password, birthday)
                VALUES ('$fname', '$lname', '$username', '$password', '$bday')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['username'] = $username;

            echo "<div class='login-container'>";
            echo "<h3>Registration Successful!</h3>";
            echo "<p><strong>Full Name:</strong> $fname $lname</p>";
            echo "<p><strong>Username:</strong> $username</p>";
            echo "<p><strong>Birthday:</strong> $bday</p>";
            echo "<br><a href='index.php'><button type='button'>Go to Login</button></a>";
            echo "</div>";
            exit();
        } else {
            $message = "<p class='error'>Error: " . $conn->error . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
    <h2>Registration</h2>

    <form method="POST" action="">
        <input type="text" name="fname" placeholder="First Name" required><br>
        <input type="text" name="lname" placeholder="Last Name" required><br>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm" placeholder="Confirm Password" required><br>
        <input type="date" name="bday" required><br>

        <div class="button-group">
          <input type="submit" value="Register">
          <button type="button" onclick="window.location.href='index.php'">Login</button>
        </div>
    </form>

    <?php echo $message; ?>
  </div>

</body>
</html>
