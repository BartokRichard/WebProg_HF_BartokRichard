<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF_1</title>
</head>
<body>
<?php
$arr = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

foreach ($arr as $element) {
    $type = gettype($element);
    $isNumeric = is_numeric($element);
    $result = $isNumeric ? 'Igen' : 'Nem';

    echo "Elem: {$element}, Típus: {$type}, Numerikus-e: {$result}<br>";
}
?>


</body>
</html>
