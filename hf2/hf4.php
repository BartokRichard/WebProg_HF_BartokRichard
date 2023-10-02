<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2_HF</title>
</head>
<body>
    <?php
    $szinek = array(
        'A' => 'Kek',
        'B' => 'Zold',
        'c' => 'Piros'
    );
    
    function atalakit_kisbetus($tomb) {
        return array_map('strtolower', $tomb);
    }
    
    function atalakit_nagybetus($tomb) {
        return array_map('strtoupper', $tomb);
    
    }
    
    print "Kisbetűs:<br>";
    $szinek_kisbetus = atalakit_kisbetus($szinek);
    print implode('<br>', $szinek_kisbetus);
    print '<br>';
    
    print "<br>Nagybetűs:<br>";
    $szinek_nagybetus = atalakit_nagybetus($szinek);
    print implode('<br>', $szinek_nagybetus);
    ?>
    
</body>
</html>