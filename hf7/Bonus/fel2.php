<?php
session_start();

if (!isset($_SESSION['MASODPERCEK'])) {
    $_SESSION['MASODPERCEK'] = 6123;
}

if (is_int($_SESSION['MASODPERCEK'])) {
    $orak = $_SESSION['MASODPERCEK'] / 3600;
    echo "Az átalakított érték: <strong>{$orak} óra</strong>";
} else {
    echo "Hiba: A megadott érték nem egész szám.";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF_1</title>
</head>
<body>
</body>
</html>
