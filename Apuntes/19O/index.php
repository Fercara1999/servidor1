<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>19O</title>
    <link rel="stylesheet" type="text/css" href="./estilo.css">
</head>
<body>
    <?php
    include("../../fragmentos/header.html");
    include("../../funcionesUtiles.php");
    include("./validaciones.php");
    ?>
        <?php
            $errores = array();
            if(enviado()){
                if(textVacio('nombre'))
                    $errores['nombre'] = "Nombre Vacio";
                if(textVacio('apellido'))
                    $errores['apellido'] = "Apellido Vacio";
            }
        ?>

        <form action="./procesa.php" method="get" name="formulario1" enctype="multipart/form-data">
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" placeholder="nombre" value=<?php recuerda('nombre'); ?>></label>
        <p class="error">
            <?php errores($errores,'nombre'); ?>
        </p>
        <label for="apellido">Apellido: <input type="text" name="apellido" id="apellido" placeholder="apellido" value=<?php recuerda('apellido'); ?>> </label>
        <p class="error">
            <?php errores($errores,'apellido'); ?>
        </p>
        <br>
        <label for="hombre">Hombre<input type="radio" name="genero" id="hombre" value="hombre"></label>
        <label for="mujer">Mujer<input type="radio" name="genero" id="mujer" value="mujer"></label>
        <br>
        <p>Aficiones:</p>
        <label for="ch1">Montar a caballo<input type="checkbox" name="aficion[]" id="ch1" value="jinete"></label>
        <label for="ch2">Jugar al futbol<input type="checkbox" name="aficion[]" id="ch2" value="futbolista"></label>
        <label for="ch3">Nadar<input type="checkbox" name="aficion[]" id="ch3" value="nadador"></label>
        <br>
        <label for="fecha_n">Fecha nacimiento <input type="datetime-local" name="fecha_n" id="fecha_n"></label>
        <br>
        Equipos Baloncesto
        <select name="equipos" id="">
            <option value="0">Seleccione una opcion</option>
            <option value="lakers">Lakers</option>
            <option value="celtics">Celtics</option>
            <option value="bulls">Bulls</option>
        </select>
        <br>
        <input type="file" name="fichero" id="fichero"><br>
        <input type="hidden" name="usuarioVIP" value="156">
        <input type="submit" value="Enviar" name="Enviar">
        <input type="reset" value="Borrar" name="Borrar">
    </form>

    <?php
    include("../../fragmentos/footer.php");
    ?>
</body>
</html>