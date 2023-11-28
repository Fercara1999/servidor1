<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../css/estilos.css" type="text/css">
</head>
<body>

<?php
    include("../../fragmentos/header.html");
    include("./funciones.php");

    $errores = [];

    //FICHEROS
    // r: lectura, puntero al principio
    // r+: lectura y escritura, puntero al principio
    // w: escritura, puntero al principio y lo sobreescribe. Intenta crear
    // w+: lectura y escritura, puntero al principio y lo sobreescribe. Intenta crear
    // a: escritura, puntero al final. Intenta crear
    // a+: lectura y escritura, puntero al final. Intenta crear
    // x: creación y apertura solo escritura, puntero al principio, si existe da error y sino intenta crear
    // x+: creacion y apertura para lectura y escritura, se comporta como x
    // c: lectura, si no existe se crea, si existe no se sobreescribe ni da error, puntero al principio
    // c+: lectura y escritura, se comporta como c

    if(enviado()){
        validaFormulario($errores);
    }
?>

    <form action="" method="get">
        <label for="nombreCompleto">Nombre completo: <input type="text" name="nombreCompleto" id="nombreCompleto"></label>
        <?php muestraError($errores,'nombreCompleto') ?><br>
        <label for="contrasena">Contraseña: <input type="text" name="contrasena" id="contrasena"></label>
        <?php muestraError($errores,'contrasena') ?><br>
        <input type="submit" name="Enviar" id="Enviar">
    </form>

<?php
include("../../fragmentos/footer.php");
?>

</body>
</html>

