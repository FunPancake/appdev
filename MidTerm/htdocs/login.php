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

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Admin login
    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: adminpage.php");
        exit();
    }

    // User login
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
  <link rel="stylesheet" href="style.css?v=3">
  <style>
    .login-container {
      max-width: 500px;
      margin: 100px auto;
      padding: 30px;
      background-color: rgba(0, 0, 0, 0.6);
      border-radius: 15px;
      color: white;
      text-align: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
      backdrop-filter: blur(8px);
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 12px 0;
      border: none;
      border-radius: 8px;
      background-color: rgba(255, 255, 255, 0.1);
      color: white;
    }

    input[type="text"]::placeholder, input[type="password"]::placeholder {
      color: #ccc;
    }

    .button-group {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    margin-top: 20px;
    }

    .button-group input[type="submit"],
    .button-group button {
    flex: 1;
    padding: 12px;
    border-radius: 25px;
    border: none;
    font-family: "Varela Round", sans-serif;
    font-size: 1em;
    cursor: pointer;
    background-color: var(--color1);
    color: white;
    transition: background-color 0.3s ease;
    height: 50px;
    line-height: 1;
    }

    .button-group input[type="submit"]:hover,
    .button-group button:hover {
      background-color: var(--color1g);
      color: black;
    }

    .error {
      color: #ff6666;
      margin-top: 15px;
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
