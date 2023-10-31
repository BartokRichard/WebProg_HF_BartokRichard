<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $szam1 = $_POST["szam1"];
    $szam2 = $_POST["szam2"];
    $muvelet = $_POST["muvelet"];

    switch ($muvelet) {
        case "+":
            $eredmeny = $szam1 + $szam2;
            break;
        case "-":
            $eredmeny = $szam1 - $szam2;
            break;
        case "*":
            $eredmeny = $szam1 * $szam2;
            break;
        case "/":
            if ($szam2 != 0) {
                $eredmeny = $szam1 / $szam2;
            } else {
                $eredmeny = "A második szám nem lehet 0!";
            }
            break;
        case "^":
            $eredmeny = pow($szam1, $szam2);
            break;
        default:
            $eredmeny = "Érvénytelen művelet!";
            break;
    }

    $_SESSION['result'] = $eredmeny;
    $_SESSION['calculation'] = "$szam1 $muvelet $szam2 = $eredmeny";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HF_1</title>
</head>
<body>
    <h1>Műveletek</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="szam1">Első szám:</label>
        <input type="number" step="any" name="szam1" required>
        <br><br>
        <label for="szam2">Második szám:</label>
        <input type="number" step="any" name="szam2" required>
        <br><br>
        <label for="muvelet">Válassza ki a műveletet:</label>
        <select name="muvelet">
            <option value="+">Összeadás</option>
            <option value="-">Kivonás</option>
            <option value="*">Szorzás</option>
            <option value="/">Osztás</option>
            <option value="^">Hatványozás</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Számol">
    </form>

    <?php
    if (isset($_SESSION['result']) && isset($_SESSION['calculation'])) {
        echo "<h2>Eredmény:</h2>";
        echo "<p>" . $_SESSION['calculation'] . "</p>";
    }
    ?>
</body>
</html>
