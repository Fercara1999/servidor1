<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./Ejercicio2.php");
    ?>
    <?php
        $arrayNumeros = array();
        numerosAleatorios($arrayNumeros,1,11,10,false);
    
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>