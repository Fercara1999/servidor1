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
        include("./funciones.php");
    ?>

    <?php

    if(isset($_REQUEST['boton']))
        if(pulsaBoton($_REQUEST['boton'])){
            exit;
        }
            

    ?>
    
    <form action="" method="get">
        <label for="texto"><input type="text" name="fichero" id="texto"></label><br><br>
        <input type="submit" name="boton" id="leer" value="leer">
        <input type="submit" name="boton" id="escribir" value="escribir">

    </form>

    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>