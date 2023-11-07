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
        include("./funcionesSeleccionar.php");
    ?>

    <?php

        

        if(pulsaLeer()){
            $fichero = $_REQUEST['texto'];
            header('Location: ./leer.php?fichero='.$fichero);
        }

        if(pulsaEscribir()){
            $fichero = $_REQUEST['texto'];
            header('Location: ./escribir.php?fichero='.$fichero);
        }

    ?>
    
    <form action="" method="post">
        <label for="texto"><input type="text" name="texto" id="texto"></label><br><br>
        <input type="submit" name="Leer" id="Leer" value="Leer">
        <input type="submit" name="Escribir" id="Escribir" value="Escribir">

    </form>

    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>