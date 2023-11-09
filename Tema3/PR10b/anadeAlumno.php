<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR10b - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./funciones.php");
    ?>

    <?php

    if(isset($_GET['anade']))
        anadeAlumno();
    
    ?>
    
    <form action="" method="get">
        <label for="alumno">Nombre alumno: <input type="text" name="alumno" id="alumno" ></label><br>
        <label for="nota1">Nota 1: <input type="number" name="nota1" id="nota1" min="0" max="10"></label><br>
        <label for="nota2">Nota 2: <input type="number" name="nota2" id="nota2" min="0" max="10"></label><br>
        <label for="nota3">Nota 3: <input type="number" name="nota3" id="nota3" min="0" max="10"></label><br>
        <label for="anade"><input type="submit" value="Añadir alumno" name="anade" id="anade"></label>
    </form>

    <?php
    ?>

<?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>