<?php
// Function to calculate the volume of a Cube
function volumeCube($side) {
    return pow($side, 3);
}

// Function to calculate the volume of a Right Rectangular Prism
function volumeRectPrism($length, $width, $height) {
    return $length * $width * $height;
}

// Function to calculate the volume of a Cylinder
function volumeCylinder($radius, $height) {
    return pi() * pow($radius, 2) * $height;
}

// Function to calculate the volume of a Pyramid
function volumePyramid($baseArea, $height) {
    return (1/3) * $baseArea * $height;
}

// Function to calculate the volume of a Cone
function volumeCone($radius, $height) {
    return (1/3) * pi() * pow($radius, 2) * $height;
}

// Function to calculate the volume of a Sphere
function volumeSphere($radius) {
    return (4/3) * pi() * pow($radius, 3);
}
?>