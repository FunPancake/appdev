<?php 
    include 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Get the Articles

        $title = $_POST['title'];
        $content = $_POST['content'];

        //inster the article into the database
        $query = "INSERT INTO articles (title, content) VALUES ('$title', '$content')";

        mysqli_query($conn, $query);

        // Redirect to the homepag after adding
        header("Location:index.php");
        exit();
    }
?>

<form method="post" action="">
    <label>Title: </label><br/>
    <input type="text" name="title"><br/><br/>
    <label>Content</label><br/>
    <input type="submit" value="Add Article">
</form>
