<?php
session_start(); 


if (isset($_SESSION['honap'])) {
    $_SESSION['honap'] = 5;
}

$honap = $_SESSION['honap'];
echo "A bemenő hónap: " . $honap . "<br>";

// if-el
if ($honap >= 3 && $honap <= 5) {
    $evszak_if = "Tavasz";
} elseif ($honap >= 6 && $honap <= 8) {
    $evszak_if = "Nyár";
} elseif ($honap >= 9 && $honap <= 11) {
    $evszak_if = "Ősz";
} else {
    $evszak_if = "Tél";
}

echo "A bemenő hónap alapján az évszak (if-el): " . $evszak_if . "<br>";

// Switch-el
switch ($honap) {
    case 3:
    case 4:
    case 5:
        $evszak_switch = "Tavasz";
        break;
    case 6:
    case 7:
    case 8:
        $evszak_switch = "Nyár";
        break;
    case 9:
    case 10:
    case 11:
        $evszak_switch = "Ősz";
        break;
    default:
        $evszak_switch = "Tél";
        break;
}

echo "A bemenő hónap alapján az évszak (switch-el): " . $evszak_switch;

?>
