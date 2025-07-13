<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $bday = $_POST['bday'];

    if ($password !== $confirm) {
        $message = "<p class='error'>Passwords do not match!</p>";
    } else {
        // Check if username already exists
        $check = $conn->prepare("SELECT * FROM usercred WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $checkResult = $check->get_result();

        if ($checkResult->num_rows > 0) {
            $message = "<p class='error'>Username already exists!</p>";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $stmt = $conn->prepare("INSERT INTO usercred (firstname, lastname, username, password, birthday)
                                    VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $fname, $lname, $username, $hashed_password, $bday);

            if ($stmt->execute()) {
                $_SESSION['username'] = $username;

                echo "<div class='login-container'>";
                echo "<h3>Registration Successful!</h3>";
                echo "<p><strong>Full Name:</strong> " . htmlspecialchars($fname) . " " . htmlspecialchars($lname) . "</p>";
                echo "<p><strong>Username:</strong> " . htmlspecialchars($username) . "</p>";
                echo "<p><strong>Birthday:</strong> " . htmlspecialchars($bday) . "</p>";
                echo "<br><a href='login.php'><button type='button'>Go to Login</button></a>";
                echo "</div>";
                exit();
            } else {
                $message = "<p class='error'>Error: " . $stmt->error . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css?v=3">
</head>
<body>

  <div class="login-container">
    <h2>Registration</h2>

    <form method="POST" action="">
        <input type="text" name="fname" placeholder="First Name" maxlength="50" required><br>
        <input type="text" name="lname" placeholder="Last Name" maxlength="50" required><br>
        <input type="text" name="username" placeholder="Username" maxlength="50" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm" placeholder="Confirm Password" required><br>
        <input type="date" name="bday" required><br>

        <div class="button-group">
          <input type="submit" value="Register">
          <button type="button" onclick="window.location.href='login.php'">Login</button>
        </div>
    </form>

    <?php echo $message; ?>
  </div>

</body>
</html>
