<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Summative</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <h1>Summative 2: Arrays and Function</h1>
</header>
<body>
    <?php
        function sanitizeInput($data){
            return htmlspecialchars(stripcslashes(trim($data)));
        }
        if (isset($_GET['page'])) {
            $page = sanitizeInput($_GET['page']);

            switch ($page) {
                case 'Fruits':
                    require 'technicalpart1.php';
                    break;
                case 'Calculator':
                    include 'technicalpart2.php';
                    break;
                case 'Profile':
                    include 'technicalpart3.php';
                    break;
                default:
                    echo "<p> Welcome please select one of the options from menu </p>";
                    break;
            }
        }else{
            echo "<p> Welcome please select from menu </p>";
        }
        //Menu
        echo '<nav><ul>';
        echo '<li><a href="summative.php?page=Fruits">Fruits</a></li>';
        echo '<li><a href="summative.php?page=Calculator">T-Calculator</a></li>';
        echo '<li><a href="summative.php?page=Profile">Profile</a></li>';
        echo '</nav></ul>';
    ?>
</body>
</html>



<th colspan = "4"></th>