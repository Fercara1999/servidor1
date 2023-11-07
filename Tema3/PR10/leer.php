<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escribir - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./funcionesLeer.php");
    ?>

    <?php

        if(pulsaVolver()){
            header('Location: ./seleccionar.php');
        }

        if(pulsaModificar()){
            header('Location: ./escribir.php');
        }

    ?>


    <form action="" method="post">
    <!-- <input type="hidden" name="" value=""> -->
        <label for="contenido"><textarea name="contenido" id="contenido" cols="30" rows="10" placeholder="<?php leeArchivo() ?>" disabled></textarea></label><br><br>
        <input type="submit" name="Volver" id="Volver" value="Volver">
        <input type="submit" name="Modificar" id="Modificar" value="Modificar">

    </form>

    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>