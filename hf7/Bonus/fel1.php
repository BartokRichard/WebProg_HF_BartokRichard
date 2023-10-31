<?php
session_start();

$arr = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

$results = [];

foreach ($arr as $element) {
    $type = gettype($element);
    $isNumeric = is_numeric($element);
    $result = $isNumeric ? 'Igen' : 'Nem';
    
    $results[] = [
        'element' => $element,
        'type' => $type,
        'isNumeric' => $result
    ];
}

$_SESSION['results'] = $results; 
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF_1</title>
</head>
<body>
    <?php
    if(isset($_SESSION['results'])) {
        foreach ($_SESSION['results'] as $result) {
            echo "Elem: {$result['element']}, Típus: {$result['type']}, Numerikus-e: {$result['isNumeric']}<br>";
        }
    }
    ?>
</body>
</html>
