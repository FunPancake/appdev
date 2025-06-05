<?php
$firstname = "Ian Lindley";
$lastname = "Del Rosario";

// Combine into one full name
$name = $firstname . " " . $lastname;

// Get the first 2 letters of the full name
$initial = strtoupper(substr($name, 0, 2));

echo "Full name: $name<br>";
echo "First 2 letters: $initial . <br>";

echo date("m-d-y") . "<br>";

//resesvation date
$resdate = strtoupper(substr(date("M"), 0, 3)) . date("d") . date("m"). date("y");

// Input for room type
$roomType = "1"; // Can be changed

// Set room code instead of echoing directly
$roomCode = "";
switch ($roomType){
    case "1":
        $roomCode = "SIN"; break;
    case "2":
        $roomCode = "DBL"; break;
    case "3":
        $roomCode = "TWN"; break;
    case "4":
        $roomCode = "SUI"; break;
    default:
        $roomCode = "UNK"; break;
}

//Reservation count
$resCount = sprintf("%05d", 1);

echo "<br>";

// Transcation ID
echo $initial . $resdate . "-" . $roomCode . $resCount . "<br>";


// INPUTS
// - $firstname
// - $lastname
// - $roomType (1 for single, 2 for double, 3 for twin, 4 for suite)
// - $resdate
// - $roomCode
?>