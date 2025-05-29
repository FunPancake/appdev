<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Length Conversion Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Measure Conversion Charts</h1>

    <table>
        <?php
        // Metric Conversion Table
        echo '<tr>';
        echo '<th colspan="6" style="text-align: center; font-size: 25px;">Metric Conversion</th>';
        echo '</tr>';

        // 1 Centimeter = 10 Millimeters
        $cm = 1;
        $mm = $cm * 10;
        echo '<tr>';
        echo '<td style="width: 25%">' . $cm . ' Centimeter' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $mm . ' Millimeter' . '</td>';
        echo '<td style="width: 25%">' . $cm . ' cm' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $mm . ' mm' . '</td>';
        echo '</tr>';

        // 1 Decimeter = 10 Centimeters
        $dm = 1;
        $cm = $dm * 10;
        echo '<tr>';
        echo '<td style="width: 25%">' . $dm . ' Decimeter' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $cm . ' Centimeter' . '</td>';
        echo '<td style="width: 25%">' . $dm . ' dm' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $cm . ' cm' . '</td>';
        echo '</tr>';

        // 1 Meter = 100 Centimeters
        $m = 1;
        $cm = $m * 100;
        echo '<tr>';
        echo '<td style="width: 25%">' . $m . ' Meter' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $cm . ' Centimeter' . '</td>';
        echo '<td style="width: 25%">' . $m . ' m' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $cm . ' cm' . '</td>';
        echo '</tr>';

        // 1 Kilometer = 1000 Meters
        $km = 1;
        $m = $km * 1000;
        echo '<tr>';
        echo '<td style="width: 25%">' . $km . ' Kilometer' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $m . ' Meter' . '</td>';
        echo '<td style="width: 25%">' . $km . ' km' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $m . ' m' . '</td>';
        echo '</tr>';
        ?>

    </table>
    <table>
       <?php
        echo '<tr>';
        echo '<th colspan="6" style="text-align: center; font-size: 25px;">Imperial Conversion</th>'; 
        echo '</tr>';

        // 1 Foot = 12 Inches
        $ft = 1;
        $inches = $ft * 12;
        echo '<tr>';
        echo '<td style="width: 25%">' . $ft . ' Foot' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $inches . ' Inches' . '</td>';
        echo '<td style="width: 25%">' . $ft . ' ft' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $inches . ' in' . '</td>';
        echo '</tr>';

        // 1 Yard = 3 Feet
        $yd = 1;
        $feet = $yd * 3;
        echo '<tr>';
        echo '<td style="width: 25%">' . $yd . ' Yard' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $feet . ' Feet' . '</td>';
        echo '<td style="width: 25%">' . $yd . ' yd' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $feet . ' ft' . '</td>';
        echo '</tr>';

        // 1 Chain = 22 Yards
        $ch = 1;
        $yards = $ch * 22;
        echo '<tr>';
        echo '<td style="width: 25%">' . $ch . ' Chain' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $yards . ' Yards' . '</td>';
        echo '<td style="width: 25%">' . $ch . ' ch' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $yards . ' yd' . '</td>';
        echo '</tr>';

        // 1 Furlong = 220 Yards or 10 Chains
        $fur = 1;
        $yards = $fur * 220;
        $chains = $fur * 10;
        echo '<tr>';
        echo '<td style="width: 25%">' . $fur . ' Furlong' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $yards . ' Yards or ' . $chains . ' Chains' . '</td>';
        echo '<td style="width: 25%">' . $fur . ' fur' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $yards . ' yd or ' . $chains . ' ch' . '</td>';
        echo '</tr>';

        // 1 Mile = 1760 Yards or 8 Furlongs
        $mi = 1;
        $yards = $mi * 1760;
        $furlongs = $mi * 8;
        echo '<tr>';
        echo '<td style="width: 25%">' . $mi . ' Mile' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $yards . ' Yards or ' . $furlongs . ' Furlongs' . '</td>';
        echo '<td style="width: 25%">' . $mi . ' mi' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . $yards . ' yd or ' . $furlongs . ' fur' . '</td>';
        echo '</tr>';
        ?>

    </table>
    <table>
        <?php
        echo '<tr>';
        echo '<th colspan="6" style="text-align: center; font-size: 25px;">Metric to Imperial Conversion</th>'; 
        echo '</tr>';

        // 1 millimeter to inches
        $mm = 1;
        $inches = $mm * 0.0393701;
        echo '<tr>';
        echo '<td style="width: 25%">' . $mm . ' Millimeter' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($inches, 5) . ' Inches' . '</td>';
        echo '<td style="width: 25%">' . $mm . ' mm' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($inches, 5) . ' in' . '</td>';
        echo '</tr>';

        // 1 centimeter to inches
        $cm = 1;
        $inches = $cm * 0.393701;
        echo '<tr>';
        echo '<td style="width: 25%">' . $cm . ' Centimeter' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($inches, 4) . ' Inches' . '</td>';
        echo '<td style="width: 25%">' . $cm . ' cm' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($inches, 4) . ' in' . '</td>';
        echo '</tr>';

        // 1 meter to inches
        $m = 1;
        $inches = $m * 39.3701;
        echo '<tr>';
        echo '<td style="width: 25%">' . $m . ' Meter' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($inches, 2) . ' Inches' . '</td>';
        echo '<td style="width: 25%">' . $m . ' m' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($inches, 2) . ' in' . '</td>';
        echo '</tr>';

        // 1 meter to feet
        $feet = $m * 3.28084;
        echo '<tr>';
        echo '<td style="width: 25%">' . $m . ' Meter' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($feet, 3) . ' Feet' . '</td>';
        echo '<td style="width: 25%">' . $m . ' m' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($feet, 3) . ' ft' . '</td>';
        echo '</tr>';

        // 1 meter to yards
        $yards = $m * 1.09361;
        echo '<tr>';
        echo '<td style="width: 25%">' . $m . ' Meter' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($yards, 3) . ' Yards' . '</td>';
        echo '<td style="width: 25%">' . $m . ' m' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($yards, 3) . ' yd' . '</td>';
        echo '</tr>';

        // 1 kilometer to yards
        $km = 1;
        $yards = $km * 1093.61;
        echo '<tr>';
        echo '<td style="width: 25%">' . $km . ' Kilometer' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($yards, 1) . ' Yards' . '</td>';
        echo '<td style="width: 25%">' . $km . ' km' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($yards, 1) . ' yd' . '</td>';
        echo '</tr>';

        // 1 kilometer to miles
        $miles = $km * 0.621371;
        echo '<tr>';
        echo '<td style="width: 25%">' . $km . ' Kilometer' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($miles, 4) . ' Miles' . '</td>';
        echo '<td style="width: 25%">' . $km . ' km' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($miles, 4) . ' mi' . '</td>';
        echo '</tr>';
        ?>

    </table>
    <table>
        <?php
        echo '<tr>';
        echo '<th colspan="6" style="text-align: center; font-size: 25px;">Imperial to Metric Conversion</th>'; 
        echo '</tr>';

        // 1 inch to centimeter
        $inch = 1;
        $cm = $inch * 2.54;
        echo '<tr>';
        echo '<td style="width: 25%">' . $inch . ' Inch' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($cm, 2) . ' Centimeter' . '</td>';
        echo '<td style="width: 25%">' . $inch . ' in' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($cm, 2) . ' cm' . '</td>';
        echo '</tr>';

        // 1 foot to centimeter
        $foot = 1;
        $cm = $foot * 30.48;
        echo '<tr>';
        echo '<td style="width: 25%">' . $foot . ' Foot' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($cm, 2) . ' Centimeter' . '</td>';
        echo '<td style="width: 25%">' . $foot . ' ft' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($cm, 2) . ' cm' . '</td>';
        echo '</tr>';

        // 1 yard to centimeter
        $yard = 1;
        $cm = $yard * 91.44;
        echo '<tr>';
        echo '<td style="width: 25%">' . $yard . ' Yard' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($cm, 2) . ' Centimeter' . '</td>';
        echo '<td style="width: 25%">' . $yard . ' yd' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($cm, 2) . ' cm' . '</td>';
        echo '</tr>';

        // 1 yard to meter
        $meter = $yard * 0.9144;
        echo '<tr>';
        echo '<td style="width: 25%">' . $yard . ' Yard' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($meter, 4) . ' Meter' . '</td>';
        echo '<td style="width: 25%">' . $yard . ' yd' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($meter, 4) . ' m' . '</td>';
        echo '</tr>';

        // 1 mile to meter
        $mile = 1;
        $meter = $mile * 1609.344;
        echo '<tr>';
        echo '<td style="width: 25%">' . $mile . ' Mile' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($meter, 3) . ' Meter' . '</td>';
        echo '<td style="width: 25%">' . $mile . ' mi' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($meter, 3) . ' m' . '</td>';
        echo '</tr>';

        // 1 mile to kilometer
        $km = $mile * 1.60934;
        echo '<tr>';
        echo '<td style="width: 25%">' . $mile . ' Mile' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($km, 5) . ' Kilometer' . '</td>';
        echo '<td style="width: 25%">' . $mile . ' mi' . '</td>';
        echo '<td style="width: 1%"> = </td>';
        echo '<td style="width: 25%">' . round($km, 5) . ' km' . '</td>';
        echo '</tr>';
        ?>
    </table>
</body>
</html>