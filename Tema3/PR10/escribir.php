<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escribir - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./funcionesEscribir.php");
    ?>

    <?php

        if(pulsaVolver()){
            header('Location: ./seleccionar.php');
        }

        if(pulsaGuardar()){
            escribirArchivo();
            header('Location: ./leer.php');
        }


    ?>
    <form action="" method="post">
        <label for="contenido"><textarea name="contenido" id="contenido" cols="30" rows="10" placeholder="<?php leeArchivo(); ?>"></textarea></label><br><br>
        <input type="submit" name="Volver" id="Volver" value="Volver">
        <input type="submit" name="Guardar" id="Guardar" value="Guardar">

    </form>

    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>