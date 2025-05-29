<?php
for ($i = 0; $i <= 99; $i++) {
    // Format number as two digits (e.g., 01, 02, ...)
    printf("%02d", $i);
    
    // Print comma if it's not the last number
    if ($i < 99) {
        echo ", ";
    }
}
?>