<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volume Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Volume Calculator</h1></header>


<main>
    <table>
        <tr>
            <th colspan="4">Volumes of Shapes</th>
        </tr>
        <tr>
            <th>Shapes</th>
            <th>Values</th>
            <th>Formula</th>
            <th>Answer</th>
        </tr>
        <?php
            include 'formula.php'; // Include the functions

            // Cube (side = 4)
            $side = 4;
            echo "<tr>
                    <td>Cube</td>
                    <td>(side = $side)</td>
                    <td>V = side³</td>
                    <td>" . round(volumeCube($side), 2) . "</td>
                  </tr>";

            // Rectangular Prism (3x4x5)
            $length = 3; $width = 4; $heightRect = 5;
            echo "<tr>
                    <td>Rectangular Prism</td>
                    <td>(3x4x5)</td>
                    <td>V = length × width × height</td>
                    <td>" . round(volumeRectPrism($length, $width, $heightRect), 2) . "</td>
                  </tr>";

            // Cylinder (radius=3, height=7)
            $radiusCylinder = 3; $heightCylinder = 7;
            echo "<tr>
                    <td>Cylinder</td>
                    <td>(r=3, h=7)</td>
                    <td>V = π × r² × h</td>
                    <td>" . round(volumeCylinder($radiusCylinder, $heightCylinder), 2) . "</td>
                  </tr>";

            // Pyramid (base area=20, height=6)
            $baseArea = 20; $heightPyramid = 6;
            echo "<tr>
                    <td>Pyramid</td>
                    <td>(base area=20, h=6)</td>
                    <td>V = (1/3) × base area × height</td>
                    <td>" . round(volumePyramid($baseArea, $heightPyramid), 2) . "</td>
                  </tr>";

            // Cone (radius=3, height=7)
            $radiusCone = 3; $heightCone = 7;
            echo "<tr>
                    <td>Cone</td>
                    <td>(r=3, h=7)</td>
                    <td>V = (1/3) × π × r² × h</td>
                    <td>" . round(volumeCone($radiusCone, $heightCone), 2) . "</td>
                  </tr>";

            // Sphere (radius=5)
            $radiusSphere = 5;
            echo "<tr>
                    <td>Sphere</td>
                    <td>(r=5)</td>
                    <td>V = (4/3) × π × r³</td>
                    <td>" . round(volumeSphere($radiusSphere), 2) . "</td>
                  </tr>";
        ?>
    </table>
</main>

</body>
</html>
