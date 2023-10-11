<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR4</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css"></link>
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>
    <?php

    $datos = array(2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3);
    foreach ($datos as $key => $value) {
        if ($value == '3'){
            $datos[$key] = $key;
        }
    }
    foreach ($datos as $key => $value) {
        echo "<br> $key = $value";
    }

    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>