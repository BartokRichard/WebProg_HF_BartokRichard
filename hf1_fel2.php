<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF_1</title>
</head>
<body>
    
    <?php
    define('MASODPERCEK', 6123);

    if (is_int(MASODPERCEK)) {
        
        $orak = MASODPERCEK / 3600;

        echo "Az átalakított érték: <strong>{$orak} óra</strong>";
    } else {
        echo "Hiba: A megadott érték nem egész szám.";
    }
    ?>



</body>
</html>