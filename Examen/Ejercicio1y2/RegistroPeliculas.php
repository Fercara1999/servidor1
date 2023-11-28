<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Películas - Fernando Calles Ramos
    </title>
    <style>
        .error{
            color:red;
        }
    </style>
    <?php
        include("./funciones.php");

        // Creación del array que almacenará los errores
        $errores = [];

        // Comprobamos si el formulario está enviado y si está libre de errores
        if(enviado() && validaFormulario($errores))
            // En caso de que sea así, comprobamos si existe o no el archivo RegistroPeliculas.xml y almacenamos los registros en un archivo xml
            if(!file_exists('RegistroPeliculas.xml'))
                almacenaTexto();
            else
                anadePeliculaXML();
        else{
 
    ?>
    <h1>Registro de peliculas</h1>
</head>

    <!-- Formulario -->
    <form action="" method="get">
        <label for="id">ID (0000MM-000): <input type="text" name="id" id="id" value="<?php recuerda('id');?>"></label>
        <!-- Llamada para mostrar en caso de que existan, los errores de este campo, igual para el resto de campos -->
        <p class='error'><?php errores($errores,'id') ?></p><br>
        <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo" value="<?php recuerda('titulo');?>"></label>
        <p class='error'><?php errores($errores,'titulo') ?></p><br>
        <label for="director">Director: <input type="text" name="director" id="director" value="<?php recuerda('director');?>"></label>
        <p class='error'><?php errores($errores,'director') ?></p><br>
        <label for="anoLanzamiento">Año de lanzamiento (AAAA): <input type="text" name="anoLanzamiento" id="anoLanzamiento" value="<?php recuerda('anoLanzamiento');?>"></label>
        <p class='error'><?php errores($errores,'anoLanzamiento') ?></p><br>
            <!-- Generación dinamica del campo generos -->
            Género: <?php creaGeneros() ?>
            <p class='error'><?php errores($errores,'genero') ?></p>
        <br>
        <label for="duracion">Duracion (hh:mm:ss): <input type="text" name="duracion" id="duracion" value="<?php recuerda('duracion');?>"></label>
        <p class='error'><?php errores($errores,'duracion') ?></p><br>
        <label for="actores">Actores principales (separados por comas): <input type="text" name="actores" id="actores" value="<?php recuerda('actores');?>"></label>
        <p class='error'><?php errores($errores,'actores') ?></p><br>
        <label for="sinopsis">Sinopsis (minimo 50): <input type="text" name="sinopsis" id="sinopsis" value="<?php recuerda('sinopsis');?>"> </label>
        <p class='error'><?php errores($errores,'sinopsis') ?></p><br>
        <!-- Boton de enviar los datos para registrar su contenido -->
        <input type="submit" name="Registrar" id="Registrar" value="Registrar">
    </form>

    <?php
        }
    ?>
<body>
    
</body>
</html>