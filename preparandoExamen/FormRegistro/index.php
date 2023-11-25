<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormRegistro</title>
</head>
<body>
    <?php
        include("./funciones.php");

        $errores = [];

        if(enviado() && validaFormulario($errores)){
            header("./formValido.php");
        }else{

    ?>

    <form action="./formValido.php" method="get" enctype="multipart/form-data">
        <label for="correo">Correo electrónico: <input type="text" name="correo" id="correo"></label>
        <?php muestraError($errores,'correo') ?><br>
        <label for="contrasena">Contraseña: <input type="text" name="contrasena" id="contrasena"></label>
        <?php muestraError($errores,'contrasena') ?><br>
        <label for="confcontrasena">Confirma contraseña <input type="text" name="confcontrasena" id="confcontrasena"></label>
        <?php muestraError($errores,'confcontrasena')?><br>
        <label for="telefono">Telefono: <input type="text" name="telefono" id="telefono"></label>
        <?php  muestraError($errores,'telefono')?><br>
        <input type="submit" value="Enviar" name="Enviar" id="Enviar">
        <input type="reset" value="Borrar datos">
    </form>
    <?php
        }
    ?>
</body>
</html>