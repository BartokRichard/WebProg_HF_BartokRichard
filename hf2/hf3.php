<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2_HF</title>
</head>
<body>
    <?php
    $napok = array (
        "HU" => array("H", "K", "SZe", "CS", "P", "SZo", "V"),
        "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
        "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So")
    );

    foreach ($napok as $nyelv => $nap) {
        print "$nyelv: ";
        foreach ($nap as $index => $napnev){
            if ($index == 1 || $index == 3 || $index == 5){
                print "<b>$napnev</b>";
            } else {
                print $napnev;
            }

            if ($index < count($nap) - 1){
                print ", ";
            }
        }
        print "<br>";
    }
    
    ?>
</body>
</html>