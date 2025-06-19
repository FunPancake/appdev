<?php 
    include 'config.php';

    //Fetch all articles from the database
    $query = "SELECT * FROM articles";
    $result = mysqli_query($conn, $query);

    //Display the articles
    while($row = mysqli_fetch_assoc($result)){
        echo "<h2>".$row['title']."</h2>";
        echo "<p>".$row['content']."</p>";
        echo "<a href='edit.php?id=".$row['id']."'>Edit</a> | ";
        echo "<a href='delete.php?id=".$row['id']."'>Delete</a> | ";
        echo "<hr>";
    }
?>

<a href="add.php"> Add New Article </a>
