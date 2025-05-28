<!DOCTYPE html>
<html>
<head>
    <title>Ticketing System</title>
</head>

<body>
    <h1>Ticketing Fee System</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userCode = isset($_POST["code"]) ? intval($_POST["code"]) : 0;

        // Example: you can process a single code from the form:
        echo "Processing code: $userCode<br/>";
        if ($userCode == 50) {
            echo "Processing Special Termination code : $userCode<br/>";
        } elseif ($userCode % 15 == 0) {
            echo "Processing VVIP event tickets: $userCode<br/>";
        } elseif ($userCode % 3 != 0 && $userCode % 5 != 0) {
            echo "General Inquiry code: $userCode, skipping...<br/>";
        } else {
            if ($userCode % 3 == 0) {
                echo "Processing Regular event ticket: $userCode<br/>";
            }
            if ($userCode % 5 == 0) {
                echo "Processing VIP event ticket: $userCode<br/>";
            }
        }
        echo "End of Processing For Code: $userCode <br/><br/>";

        // Or if you want to loop through 1 to 50:
        for ($i = 1; $i <= 50; $i++) {
            if ($i == 50) {
                echo "Processing Special Termination code : $i<br/>";
                break;
            }
            if ($i % 15 == 0) {
                echo "Processing VVIP event tickets: $i<br/>";
                continue;
            }
            if ($i % 3 != 0 && $i % 5 != 0) {
                echo "General Inquiry code: $i, skipping...<br/>";
                continue;
            }
            if ($i % 3 == 0) {
                echo "Processing Regular event ticket: $i<br/>";
            }
            if ($i % 5 == 0) {
                echo "Processing VIP event ticket: $i<br/>";
            }
            echo "End of Processing For Code: $i <br/><br/>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="code">Code:</label>
        <input type="number" id="code" name="code">
        <button type="submit">Check Code</button>
    </form>
</body>
</html>
