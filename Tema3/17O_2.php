<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17O</title>
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
    añadirAlArray($contador,"dos");
    añadirAlArray($contador,"tres");
    print_r($contador);
    echo "<br>";
    $contador2 = array();
    añadirAlArray2($contador2,"uno");
    añadirAlArray2($contador2,"dos");
    añadirAlArray2($contador2,"tres");
    print_r($contador2);
    ?>
</body>
</html>