<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR10 - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        // include("./funcionesSeleccionar.php");
        include("./funciones.php");
    ?>

    <?php


        if(pulsaBoton('leer'))
            echo "leyendo";

        if(pulsaBoton('escribir'))
            echo "Escribiendo";

    ?>
    
    <form action="" method="get">
        <label for="texto"><input type="text" name="texto" id="texto"></label><br><br>
        <input type="submit" name="leer" id="leer" value="Leer">
        <input type="submit" name="escribir" id="escribir" value="Escribir">

    </form>

    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>