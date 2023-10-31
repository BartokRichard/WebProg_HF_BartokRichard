<?php
$errors = [];
$name = $email = $password = $confirmPassword = $birthdate = $gender = $country = '';
$interests = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validáció

    // Név validáció
    if (empty($_POST["name"])) {
        $errors[] = "Név mező nem lehet üres.";
    } else {
        $name = test_input($_POST["name"]);
    }

    // E-mail validáció
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Érvénytelen e-mail cím formátum.";
    } else {
        $email = test_input($_POST["email"]);
    }

    // Jelszó validáció
    if (empty($_POST["password"]) || strlen($_POST["password"]) < 8 || !preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_POST["password"])) {
        $errors[] = "Jelszónak legalább 8 karakter hosszúnak kell lennie és tartalmaznia kell legalább egy nagybetűt, egy számot és egy speciális karaktert.";
    } else {
        $password = test_input($_POST["password"]);
    }

    // Jelszó megerősítés validáció
    if ($_POST["password"] !== $_POST["confirm_password"]) {
        $errors[] = "A jelszó és a jelszó megerősítése nem egyezik.";
    } else {
        $confirmPassword = test_input($_POST["confirm_password"]);
    }

    // Születési dátum validáció
    if (empty($_POST["birthdate"]) || !DateTime::createFromFormat('Y-m-d', $_POST["birthdate"])) {
        $errors[] = "Érvénytelen születési dátum.";
    } else {
        $birthdate = test_input($_POST["birthdate"]);
    }

    if (empty($errors)) {
        $gender = isset($_POST["gender"]) ? test_input($_POST["gender"]) : '';
        if (!empty($_POST["interest"])) {
            $interests = $_POST["interest"];
        }
        $country = test_input($_POST["country"]);
    }
}

function test_input($data) {
    if ($data === null) {
        return '';
    }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) { ?>
    <h2>Sikeres regisztráció!</h2>
    <p>Név: <?php echo $name; ?></p>
    <p>E-mail: <?php echo $email; ?></p>
    <p>Születési dátum: <?php echo $birthdate; ?></p>
    <p>Nem: <?php echo $gender; ?></p>
    <p>Érdeklődési területek: <?php echo !empty($interests) ? implode(", ", $interests) : 'Nincs kiválasztva'; ?></p>
    <p>Ország: <?php echo $country; ?></p>
<?php } else { ?>
    <ul style="color: red;">
        <?php foreach ($errors as $error) { ?>
            <li><?php echo $error; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<!DOCTYPE html>
<html>
<head>
    <title>Regisztrációs űrlap</title>
</head>
<body>

<form action="" method="post">

    <label for='name'>Név:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>

    <label for="email">E-mail cím:</label><br>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>

    <label for="password">Jelszó:</label><br>
    <input type="password" id="password" name="password" value="<?php echo $password; ?>"><br><br>

    <label for="confirm_password">Jelszó megerősítése:</label><br>
    <input type="password" id="confirm_password" name="confirm_password" value="<?php echo $confirmPassword; ?>"><br><br>

    <label for="birthdate">Születési dátum:</label><br>
    <input type="date" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>"><br><br>

    <label>Nem:</label><br>
    <input type="radio" id="gender_male" name="gender" value="Férfi" <?php if ($gender === "male") echo "checked"; ?>>
    <label for="gender_male">Férfi</label><br>
    <input type="radio" id="gender_female" name="gender" value="Nő" <?php if ($gender === "female") echo "checked"; ?>>
    <label for="gender_female">Nő</label><br>
    <input type="radio" id="gender_other" name="gender" value="Egyéb" <?php if ($gender === "other") echo "checked"; ?>>
    <label for="gender_other">Egyéb</label><br>
    <input type="radio" id="gender_helicopter" name="gender" value="Apacs Helikopter" <?php if ($gender === "helicopter") echo "checked"; ?>>
    <label for="gender_helicopter">Apacs Helikopter</label><br>
            

    <label>Érdeklődési területek:</label><br>
    <input type="checkbox" id="interest_sport" name="interest[]" value="sport" <?php if (in_array("sport", $interests)) echo "checked"; ?>>
    <label for="interest_sport">Sport</label><br>
    <input type="checkbox" id="interest_art" name="interest[]" value="müvészet" <?php if (in_array("art", $interests)) echo "checked"; ?>>
    <label for="interest_art">Müvészet</label><br>
    <input type="checkbox" id="interest_science" name="interest[]" value="tudomány" <?php if (in_array("science", $interests)) echo "checked"; ?>>
    <label for="interest_science">Tudomány</label><br>
    <label for="country">Ország:</label><br>
    <select id="country" name="country">
        <option value="Magyarország" <?php if ($country === "HUN") echo "selected"; ?>>Magyarország</option>
        <option value="Amerikai Egyesült Államok" <?php if ($country === "USA") echo "selected"; ?>>Amerikai Egyesült Államok</option>
        <option value="Egyesült Királyság" <?php if ($country === "UK") echo "selected"; ?>>Egyesült Királyság</option>
        <option value="Németország" <?php if ($country === "GER") echo "selected"; ?>>Németország</option>
        <option value="Spanyolország" <?php if ($country === "SPA") echo "selected"; ?>>Spanyolország</option>
        <option value="Japán" <?php if ($country === "JAP") echo "selected"; ?>>Japán</option>
    </select><br><br>

    <input type="submit" value="Regisztráció elküldése">
</form>

</body>
</html>
