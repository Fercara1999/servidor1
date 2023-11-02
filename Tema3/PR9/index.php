<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR9</title>
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
    <link rel="stylesheet" href="./estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./validaciones.php");
    ?>

    <?php

        $errores = array();

        if(enviado() && compruebaFormulario($errores)){
            muestraFormulario();
        }else{

    ?>

    <form action="" method="post" name="formularioPR9" enctype="multipart/form-data">
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" value="<?php recuerda('nombre') ?>"></label>
        <?php muestraErrores($errores,'nombre')?><br>
        <label for="apellido">Apellido: <input type="text" name="apellido" id="apellido" value="<?php recuerda('apellido') ?>"></label>
        <?php muestraErrores($errores,'apellido')?><br>
        <label for="contrasena">Contraseña: <input type="password" name="contrasena" id="contrasena"></label>
        <?php muestraErrores($errores,'contrasena')?><br>
        <label for="repcontrasena">Confirma contraseña: <input type="password" name="repcontrasena" id="repcontrasena"></label>
        <?php muestraErrores($errores,'repcontrasena')?><br>
        <label for="fecha">Fecha <input type="date" name="fecha" id="fecha" value="<?php recuerda('fecha') ?>"></label>
        <?php muestraErrores($errores,'fecha')?><br>
        <label for="DNI">DNI: <input type="text" name="DNI" id="DNI" value="<?php recuerda('DNI') ?>"></label>
        <?php muestraErrores($errores,'DNI')?><br>
        <label for="email">Correo electronico <input type="text" name="email" id="email" value="<?php recuerda('email') ?>"></label>
        <?php muestraErrores($errores,'email')?><br>
        <label for="imagen">Imagen <input type="file" name="imagen" id="imagen"></label>
        <?php muestraErrores($errores,'imagen')?><br>
        <input type="submit" name="Enviar" id="Enviar">
    </form>
    <?php
        }
    ?>

    <?php
        include("../../fragmentos/footer.php");
    ?>

</body>
</html>