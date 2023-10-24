<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormularioBasico</title>
    <link rel="stylesheet" type="text/css" href="./estilos.css">
</head>
<body>
    <?php
        include("./validaciones.php");
    ?>

    <?php
        $errores = array();
        if(enviado())
            if(textoVacio('nombre'))
                $errores['nombre'] = "Nombre vacio";
            if(textoVacio('correo'))
                $errores['correo'] = "Correo vacio";  
            if(textoVacio('mensaje'))
                $errores['mensaje'] = "Mensaje vacio"; 
            if(compruebaMensaje()){
                $errores['mensaje'] = "Mensaje";
            }     
    ?>

    <form action="" method="get" name="formBasico">
       <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label><br>
       <p class="error"><?php errores($errores,'nombre'); ?></p>

       <label for="correo">Correo: <input type="email" name="correo" id="correo"></label><br>
       <p class="error"><?php errores($errores,'correo'); ?></p>

       <label for="mensaje">Mensaje: <input type="text" name="mensaje" id="mensaje"></label><br>
       <p class="error"><?php errores($errores,'mensaje'); ?></p>

       <input type="submit" name="Enviar" id="Enviar">
       <input type="reset" name="Borrar" id="Borrar">
    </form>
</body>
</html>