<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2_HF</title>
</head>
<body>
    <?php
        $n = 10;
        
        $tableGenerator = function ($n) {
            global $backgroundColor, $diagonalColor;
            print "<table border='   1'>";
            
            for ($i = 1; $i <= $n; $i++) {
                print "<tr>";
                for ($j = 1; $j <= $n; $j++) {
                    if ($i == $j) {
                        print "<td style='background-color: #0CC3E0;'>";
                    } else {
                        print "<td style='background-color:white''>";
                    }
                    print $i * $j;
                    print "</td>";
                }
                print "</tr>";
            }
            
            print "</table>";
        };
        
        $tableGenerator($n);        
    ?>
</body>
</html>