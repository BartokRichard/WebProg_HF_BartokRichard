<?php
session_start(); 

if (!isset($_SESSION['table_generated'])) {
    $_SESSION['table_generated'] = true;

    $table = '<table border="1" cellpadding="20">
                <tr>
                    <td style="background-color: black;"></td>
                    <td></td>
                    <td style="background-color: black;"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="background-color: black;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="background-color: black;"></td>
                    <td></td>
                    <td style="background-color: black;"></td>
                </tr>
            </table>';

    $_SESSION['generated_table'] = $table;
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF_1</title>
</head>
<body>

    <?php
    if (isset($_SESSION['generated_table'])) {
        echo $_SESSION['generated_table'];
    }
    ?>

</body>
</html>
