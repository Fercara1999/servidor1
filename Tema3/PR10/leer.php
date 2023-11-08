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
    include("./funciones.php");
    ?>

    <?php

    // echo $_GET['fichero'];


    if (isset($_REQUEST['boton'])) {
        if ($_REQUEST['boton'] == 'Volver')
            pulsaBoton('seleccionar');
        else {
            if (pulsaBoton($_REQUEST['boton'])) {
                exit;
            }
        }
    }

    ?>

    <?php

    ?>


    <form action="" method="get">
        <label for="contenido"><textarea name="contenido" id="contenido" cols="30" rows="10" placeholder="<?php leeArchivo() ?>" readonly></textarea></label><br><br>
        <input type="hidden" name="fichero" value="<?php echo $_GET['fichero'] ?>">
        <input type="submit" name="boton" id="seleccionar" value="Volver">
        <input type="submit" name="boton" id="modificar" value="escribir">

    </form>

    <?php
    include("../../fragmentos/footer.php");
    ?>
</body>

</html>