<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade Ranking</title>
    <link rel="stylesheet" href="style.css">
    </style>
</head>
<body>

<?php
$grade = 50; // Example grade
$rank = "";

// Determine rank based on grade
if ($grade >= 93 && $grade <= 100) {
    $rank = "A";
} elseif ($grade >= 90 && $grade <= 92) {
    $rank = "A-";
} elseif ($grade >= 87 && $grade <= 89) {
    $rank = "B+";
} elseif ($grade >= 83 && $grade <= 86) {
    $rank = "B";
} elseif ($grade >= 80 && $grade <= 82) {
    $rank = "B-";
} elseif ($grade >= 77 && $grade <= 79) {
    $rank = "C+";
} elseif ($grade >= 73 && $grade <= 76) {
    $rank = "C";
} elseif ($grade >= 70 && $grade <= 72) {
    $rank = "C-";
} elseif ($grade >= 67 && $grade <= 69) {
    $rank = "D+";
} elseif ($grade >= 63 && $grade <= 66) {
    $rank = "D";
} elseif ($grade >= 60 && $grade <= 62) {
    $rank = "D-";
} else {
    $rank = "F";
}
?>

<table>
    <tr>
        <th colspan="2" style="text-align: center">Name: First Name, Last Name</th>
        <td rowspan="3" class="image-cell" style="height: 500px; text-align: center">Place image here</td>
    </tr>
    <tr>
        <td>Rank: <?php echo $rank; ?></td>
        <td>Grade: <?php echo $grade; ?></td>
    </tr>
</table>

</body>
</html>
