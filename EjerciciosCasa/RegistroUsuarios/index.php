<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="./estilo.css">
</head>
<body>
    <?php
        include("./validaciones.php");
    ?>

    <?php
        $errores = array();
        if(enviado()){
            if(textoVacio("nombre")){
                $errores["nombre"] = "Nombre vacio";
            }
            if(coincidenContraseñas()){
                $errores["contrasena"] = "No coinciden las contraseñas";
            }
        }
    ?>

    <form action="" method="get" name="formulario1">
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" value=""></label><br>
        <p class="error">
            <?php errores($errores,'nombre')?>
        </p>
        <label for="correo">Correo electronico: <input type="email" name="correo" id="correo" value=""></label><br>
        <label for="contrasena">Contraseña: <input type="password" name="contrasena" id="contrasena"></label><br>
        <label for="confContrasena">Confirmación contraseña: <input type="password" name="confContrasena" id="confContrasena"></label><br>
        <p class="error">
            <?php errores($errores,'contrasena') ?>
        </p>
        <label for="fechaNacimiento">Fecha de nacimiento: <input type="datetime-local" name="fechaNacimiento" id="fechaNacimiento"></label><br>
        <label for="hombre">Hombre <input type="radio" name="genero" id="hombre" value="hombre"></label>
        <label for="mujer">Mujer <input type="radio" name="genero" id="hombre" value="mujer"></label>
        <label for="otro">Otro <input type="radio" name="genero" id="otro" value="otro"></label><br>
        Pais de residencia
        <select name="pais" id="pais">
            <option value="0">Selecciona una opcion</option>
            <option value="Espana">España</option>
            <option value="Francia">Francia</option>
            <option value="Italia">Italia</option>
        </select><br>
        Intereses
        <label for="cine">Cine<input type="checkbox" name="intereses[]" id="cine" value="cine"></label>
        <label for="lectura">Lectura <input type="checkbox" name="intereses[]" id="lectura" value="lectura"></label>
        <label for="deportes">Deportes <input type="checkbox" name="intereses[]" id="deportes" value="deportes"></label><br>
        <input type="submit" name="Enviar" id="Enviar">
        <input type="reset" name="Reiniciar" id="Reiniciar">
    </form>
</body>
</html>