<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("./17O.php");
    ?>
    <?php
    echo edad(1999,11,27);
    echo "<br>";
    echo iva(100);
    echo "<br>";
    $contador = array();
    añadirAlArray($contador,"uno");
    print_r($contador);
    ?>
</body>
</html>