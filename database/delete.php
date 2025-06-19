<?php 
    include 'config.php';

    //get the article id from URL
    $id = $_GET['id'];
    
    //delete the chosen artile from the database
    $query = "DELETE from article where id=$id";
    mysqli_query($conn, $query);

    //Redirect to the homepage after deleteing
    header("Location: index.php");
    exit();
?>