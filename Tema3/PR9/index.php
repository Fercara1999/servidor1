<!DOCTYPE html>
<html lang="en">
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

        if(enviado()){
            if(textoVacio('nombre'))
                $errores['nombre'] = "El campo nombre está vacío";
            if(expresionNombre('nombre'))
                $errores['nombre'] = "El contenido introducido en el nombre no es valido";
            if(textoVacio('apellido'))
                $errores['apellido'] = "El campo apellido está vacío";
            if(expresionApellido('apellido'))
                $errores['apellido'] = "El contenido introducido en los apellidos no es valido";
            if(expresionContrasena('contrasena'))
                $errores['contrasena'] = "El contenido introducido en la contraseña no es valido";
            if(expresionContrasena('repcontrasena'))
                $errores['repcontrasena'] = "El contenido introducido en la confirmación de contraseña no es valido";
            if(coincideContrasena('contrasena','repcontrasena'))
                $errores['repcontrasena'] = "Las contraseñas no coinciden";
            if(esMayorEdad('fecha'))
                $errores['fecha'] = "La fecha es inferior a 18 años";
            if(expresionDNI('DNI'))
                $errores['DNI'] = "El formato de DNI es incorrecto";
            if(expresionCorreo('email'))
                $errores['email'] = "El formato del correo es incorrecto";
            if(textoVacio('imagen'))
                $errores['imagen'] = "El campo imagen está vacio";
            if(expresionImagen('imagen'))
                $errores['imagen'] = "El formato de la imagen no es correcto";
        }

    ?>

    <form action="" method="get" name="formularioPR9" enctype="multipart/form-data">
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label>
        <?php muestraErrores($errores,'nombre')?><br>
        <label for="apellido">Apellido: <input type="text" name="apellido" id="apellido"></label>
        <?php muestraErrores($errores,'apellido')?><br>
        <label for="contrasena">Contraseña: <input type="password" name="contrasena" id="contrasena"></label>
        <?php muestraErrores($errores,'contrasena')?><br>
        <label for="repcontrasena">Confirma contraseña: <input type="password" name="repcontrasena" id="repcontrasena"></label>
        <?php muestraErrores($errores,'repcontrasena')?><br>
        <label for="fecha">Fecha <input type="date" name="fecha" id="fecha"></label>
        <?php muestraErrores($errores,'fecha')?><br>
        <label for="DNI">DNI: <input type="text" name="DNI" id="DNI"></label>
        <?php muestraErrores($errores,'DNI')?><br>
        <label for="email">Correo electronico <input type="text" name="email" id="email"></label>
        <?php muestraErrores($errores,'email')?><br>
        <label for="imagen">Imagen <input type="file" name="imagen" id="imagen"></label>
        <?php muestraErrores($errores,'imagen')?><br>
        <input type="submit" name="Enviar" id="Enviar">
    </form>
    
    <?php
        include("../../fragmentos/footer.php");
    ?>

</body>
</html>