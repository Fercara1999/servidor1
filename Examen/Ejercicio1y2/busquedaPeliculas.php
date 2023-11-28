<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusquedaPeliculas - Fernando Calles Ramos</title>
</head>
<body>
    <?php

    include("./funciones.php");

    if(isset($_REQUEST['Buscar']))
        leeXML();

    
    ?>

    <form action="" method="get">
        <label for="busqueda">Busqueda: <input type="text" name="busqueda" id="busqueda"></label>
        <input type="submit" name="Buscar" id="Buscar">
    </form>
</body>
</html>