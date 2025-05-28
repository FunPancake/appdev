<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruit Directory - Table View</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Fruit Directory</h1>
</header>


<main>
    <table>
        <tr>
            <th colspan="4">Fruits</th>
        </tr>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Facts</th>
        </tr>
        <?php
        include 'fruits.php'; // Include fruit data

        usort($fruits, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        foreach ($fruits as $fruit) {
            echo '<tr>';
            echo '<td><img src="' . $fruit['image'] . '" alt="' . $fruit['name'] . '" style="max-width:150px;height:auto;"></td>';
            echo '<td>' . $fruit['name'] . '</td>';
            echo '<td>' . $fruit['description'] . '</td>';
            echo '<td>' . $fruit['facts'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</main>

</body>
</html>
