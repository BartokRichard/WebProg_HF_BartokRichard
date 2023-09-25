<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF_1</title>
</head>
<body>
<?php
$a = 5;
$b = 3;

$osszeadas = $a + $b;
echo "Az összeadás eredménye: $a + $b = $osszeadas<br>";

$kivonas = $a - $b;
echo "A kivonás eredménye: $a - $b = $kivonas<br>";

$szorzas = $a * $b;
echo "A szorzás eredménye: $a * $b = $szorzas<br>";

if ($b != 0) {
    $osztas = $a / $b;
    echo "Az osztás eredménye: $a / $b = $osztas<br>";
} else {
    echo "Nullával nem lehet osztani.<br>";
}

$hatvanyozas = pow($a, $b);
echo "A hatványozás eredménye: $a ^ $b = $hatvanyozas<br>";
?>

</body>
</html>