<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF_1</title>
</head>
<body>
    <?php
    $honap = 3;

    // if-el
    if ($honap >= 3 && $honap <= 5) {
        $evszak = "Tavasz";
    } elseif ($honap >= 6 && $honap <= 8) {
        $evszak = "Nyár";
    } elseif ($honap >= 9 && $honap <= 11) {
        $evszak = "Ősz";
    } else {
        $evszak = "Tél";
    }

    echo "A bemenő hónap alapján az évszak: " . $evszak . "<br>";

    // Switch-el
    switch ($honap) {
        case 3:
        case 4:
        case 5:
            $evszak = "Tavasz";
            break;
        case 6:
        case 7:
        case 8:
            $evszak = "Nyár";
            break;
        case 9:
        case 10:
        case 11:
            $evszak = "Ősz";
            break;
        default:
            $evszak = "Tél";
            break;
    }

    echo "A bemenő hónap alapján az évszak (switch-el): " . $evszak;
    ?>

    
</body>
</html>