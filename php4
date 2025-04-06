<?php
$area = 0;
$volume = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shape = $_POST['shape'];
    if ($shape == 'triangle') {
        $width = $_POST['width'];
        $height = $_POST['height'];
        $area = ($width * $height) / 2;
    } elseif ($shape == 'rectangle') {
        $width = $_POST['width'];
        $height = $_POST['height'];
        $area = $width * $height;
    } elseif ($shape == 'circle') {
        $radius = $_POST['radius'];
        $area = pi() * pow($radius, 2);
    } elseif ($shape == 'cuboid') {
        $width = $_POST['width'];
        $length = $_POST['length'];
        $height = $_POST['height'];
        $volume = $width * $length * $height;
    } elseif ($shape == 'cylinder') {
        $radius = $_POST['radius'];
        $height = $_POST['height'];
        $volume = pi() * pow($radius, 2) * $height;
    } elseif ($shape == 'sphere') {
        $radius = $_POST['radius'];
        $volume = (4/3) * pi() * pow($radius, 3);
    }
}
?>
