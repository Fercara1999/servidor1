<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditaFichero</title>
</head>
<body>

    <?php

        include("./funciones.php");

        $fichero = $_GET['fichero'];

        echo $fichero;

        if(isset($_GET["Modificar"])){

            editaFichero($fichero);

        }

    ?>


    <form action="" method="get">
        <textarea name="contenido" id="contenido" cols="30" rows="10"></textarea><br>
        <input type="submit" name="Modificar" id="Modificar" value="Modificar">
    </form>
</body>
</html>