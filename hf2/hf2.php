<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2_HF</title>
</head>
<body>
    <?php
        $orszagok = array (
            "Magyarorszag" => "Budapest",
            "Románia" => "Bukarest",
            "Belgium" => "Brussel",
            "Austria" => "Vienna",
            "Poland" => "Warsaw"
        );

        foreach ($orszagok as $orszag => $varos) {
            echo "<p>$orszag fővárosa <strong><span style='color: red;'>$varos</span></strong></p>";
        }
    
    ?>
</body>
</html>