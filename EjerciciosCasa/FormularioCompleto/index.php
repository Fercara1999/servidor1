<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormularioCompleto</title>
</head>
<body>
    <?php
        include("./validaciones.php");
    ?>

    <?php

        $errores = array();
        
        if(enviado() && validaFormulario($errores)){
            echo "<pre";
            print_r($_REQUEST); 
        }else {
        
    ?>
    <form action="" method="get" name="FormularioCompleto" enctype="multipart/form-data">
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" value= <?php recuerda('nombre'); ?>></label><br>
        <p class="error"> <?php errores($errores,'nombre') ?> </p>
        <label for="apellidos">Apellidos: <input type="text" name="apellidos" id="apellidos" value= <?php recuerda('apellidos'); ?>></label><br>
        <p class="error"> <?php errores($errores,'apellidos')?></p>
        <label for="hombre">Hombre <input <?php recuerdaRadio('genero','hombre'); ?> type="radio" name="genero" id="hombre" value="hombre"></label>
        <label for="mujer">Mujer <input <?php recuerdaRadio('genero','mujer'); ?> type="radio" name="genero" id="mujer" value="mujer"></label><br>
        <p class="error"> <?php errores($errores,'genero')?></p>
        Aficiones (elige al menos una):<br>
        <label for="jinete">Montar a caballo <input <?php recuerdaSelect('aficiones','jinete') ?> type="checkbox" name="aficiones[]" id="jinete" value="jinete"></label>
        <label for="nadador">Nadar <input <?php recuerdaSelect('aficiones','nadador') ?> type="checkbox" name="aficiones[]" id="nadador" value="nadador"></label>
        <label for="futbolista">Futbol <input <?php recuerdaSelect('aficiones','futbolista') ?> type="checkbox" name="aficiones[]" id="futbolista" value="futbolista"></label><br>
        <p class="error"> <?php errores($errores,'aficiones')?></p>
        <label for="f_nacimiento">Fecha de nacimiento <input type="datetime-local" name="f_nacimiento" id="f_nacimiento"></label><br>
        Equipos baloncesto
        <select name="equipos" id="equipos">
            <option value="0">Selecciona una opcion</option>
            <option value="Lakers">Lakers</option>
            <option value="Celtics">Celtics</option>
            <option value="Bulls">Bulls</option>
        </select>
        <p class ="error"> <?php errores($errores,'equipos');?> </p>
        <label for="fichero">Sube un archivo: <input type="file" name="fichero" id="fichero"></label><br>
        <p class="error"> <?php errores($errores,'fichero'); ?> </p>
        <input type="submit" name="Enviar" id="Enviar" vale="Enviar">
        <input type="reset" name="Borrar" id="Borrar" value="Borrar">

    </form>

    <?php
        }
    ?>
</body>
</html>