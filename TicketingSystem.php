<!DOCTYPE html>
<html>
<head>
    <title>Ticketing System</title>
</head>

<body>
    <h1>Ticketing Fee System</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $code = isset($_POST["code"]) ? intval( $_POST["code"]) : 0;
        for ($code = 1; $code <= 50; $code++){
            if ($code == 50){
                echo "Processing Special Termination code : $code<br/>";
                break;
            }
            if ($code % 15== 0){
                echo "Processing VVIP event tickets: $code<br/>";
                goto end_of_loop;
            }   
            if ($code % 3 != 0 && $code % 5 != 0){
                echo "General Inquiry code: $code, skipping...<br/>";
                continue;
            }
            if ($code % 3 == 0){
                echo "Processing Regular event ticket: $code<br/>";
            }
            if ($code % 5 == 0){
                echo "Processing VIP event ticket: $code<br/>";
            }
            end_of_loop:
            echo "End of Processing For Code: $code <br/><br/>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="$code">Code:</label>
        <input type="number" id="code" name="code">
        <button type="submit">Check Code</button>
    </form>
</body>
</html>