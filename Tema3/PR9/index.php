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
        <span style= "color:red"><?php muestraErrores($errores,'nombre')?></span><br>
        <label for="apellido">Apellidos: <input type="text" name="apellido" id="apellido" value="<?php recuerda('apellido') ?>"></label>
        <span style= "color:red"><?php muestraErrores($errores,'apellido')?></span><br>
        <label for="contrasena">Contraseña: <input type="password" name="contrasena" id="contrasena"></label>
        <span style= "color:red"><?php muestraErrores($errores,'contrasena')?></span><br>
        <label for="repcontrasena">Confirma contraseña: <input type="password" name="repcontrasena" id="repcontrasena"></label>
        <span style= "color:red"><?php muestraErrores($errores,'repcontrasena')?></span><br>
        <label for="fecha">Fecha <input type="text" name="fecha" id="fecha" value="<?php recuerda('fecha') ?>" placeholder="yyyy/m/d"></label>
        <span style= "color:red"><?php muestraErrores($errores,'fecha')?></span><br>
        <label for="DNI">DNI: <input type="text" name="DNI" id="DNI" value="<?php recuerda('DNI') ?>"></label>
        <span style= "color:red"><?php muestraErrores($errores,'DNI')?></span><br>
        <label for="email">Correo electronico <input type="text" name="email" id="email" value="<?php recuerda('email') ?>"></label>
        <span style= "color:red"><?php muestraErrores($errores,'email')?></span><br>
        <label for="imagen">Imagen <input type="file" name="imagen" id="imagen"></label>
        <span style= "color:red"><?php muestraErrores($errores,'imagen')?></span><br>
        <input type="submit" name="Enviar" id="Enviar">
        <input type="reset" name="Reiniciar" id="Reiniciar" >
    </form>
    <?php
        }
    ?>

    <?php
        include("../../fragmentos/footer.php");
    ?>

</body>
</html>