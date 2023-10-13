<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Fernando Calles</title>
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>
    <p><b>Escriba un programa que se le pase un año por la URL y que escriba si es bisiesto o no.
Los años bisiestos son múltiplos de 4, pero los múltiplos de 100 no lo son, aunque los múltiplos de
400 sí.</b></p>
    <?php
    $ano = $_GET['ano'];

    if ($ano % 4 == 0 && $ano % 100 != 0 || $ano % 400 == 0){
        echo "El año $ano es bisiesto";
    }else{
        echo "El año $ano NO es bisiesto";
    }
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>