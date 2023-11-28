<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
</head>
<body>
    <?php

        include("./funciones.php");

    ?>

    <form action="anadeLibro.php" method="get">
        <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo"></label><br>
        <label for="autor">Autor: <input type="text" name="autor" id="autor"></label><br>
        <label for="editorial">Editorial: <input type="text" name="editorial" id="editorial"></label><br>
        <label for="precio">Precio: <input type="text" name="precio" id="precio"></label><br>
        <input type="submit" name="Enviar" id="Enviar">
        <input type="reset" name="Borrar" id="Borrar">
    </form>
</body>
</html>