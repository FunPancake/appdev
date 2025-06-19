<?php
    //Database Connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "cmsdemo";

    //Create the connection string
    $conn = mysqli_connect($host, $username, $password, $database);

    //Check Connection
    if(!$conn){
        die("connection Failed: " .mysqli_connect_error());
    }
?>