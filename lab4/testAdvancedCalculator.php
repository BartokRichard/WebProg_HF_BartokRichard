<?php
require_once 'c:\xampp\htdocs\php\lab3\fel2.php';

require_once 'c:\xampp\htdocs\php\lab3\fel3.php';

require_once 'NonExistentOperation.php';

$advCalculator = new AdvCalculator();
$advCalculator->__set(3, 4);

// echo $advCalculator->add();
// echo $advCalculator->power(5);

try {
    echo "Power:" .$advCalculator->power(3) . "<br>";
    echo "Square Root:" .$advCalculator->sqrt() . "<br>";

    echo $advCalculator->nonExistingMethod() . "<br>";
} catch(Exception $e) {
    echo "Hiba " . $e->getMessage() . "<br>";
}
?>