<?php
// Get inputs from POST
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$roomType = $_POST['roomType'] ?? '1';
$inputDate = $_POST['resdate'] ?? date("Y-m-d"); // fallback to today if not set

// Combine full name
$name = $firstname . " " . $lastname;

// Get first 2 letters of the name
$initial = strtoupper(substr($name, 0, 2));

// Format reservation date into custom format (e.g., JUN050625)
$dateObj = DateTime::createFromFormat('Y-m-d', $inputDate);
$resdate = strtoupper($dateObj->format("M")) . $dateObj->format("dmy");

// Determine room code and description
$roomCode = "";
$roomDesc = "";

switch ($roomType) {
    case "1":
        $roomCode = "SIN";
        $roomDesc = "Single";
        break;
    case "2":
        $roomCode = "DBL";
        $roomDesc = "Double";
        break;
    case "3":
        $roomCode = "TWN";
        $roomDesc = "Twin";
        break;
    case "4":
        $roomCode = "SUI";
        $roomDesc = "Suite";
        break;
    default:
        $roomCode = "UNK";
        $roomDesc = "Unknown";
        break;
}

// Format reservation count
$resCount = sprintf("%05d", 1); // Static now — can be dynamic later

// Final transaction ID
$transactionID = $initial . $resdate . "-" . $roomCode . $resCount;

// Output
echo "Full name: $name<br>";
echo "Initials: $initial<br>";
echo "Reservation Date: " . $dateObj->format("m-d-y") . "<br>";
echo "Room Code: $roomCode ($roomDesc)<br>";
echo "<strong>Transaction ID:</strong> $transactionID";
?>
