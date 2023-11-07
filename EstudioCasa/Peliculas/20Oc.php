<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>20Oc</title>
    <link rel="stylesheet" type="text/css" href="./estilo.css">
</head>
<body>
    <?php
        include("./validaciones.php");
    ?>

    <?php

        $errores = array();
        if(enviado()){
            if(textoVacio('titulo')){
                $errores['titulo'] = 'Titulo vacio';
            }
        }
        
    ?>
    <form action="" method="get" enctype="multipart/form-data">
        <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo" value=""></label><br>
        <p class="error">
            <?php errores($errores,'titulo')?>
        </p>
        <label for="director">Director: <input type="text" name="director" id="director" value=""></label><br>
        <label for="fecha_vista">Fecha visualización: <input type="datetime-local" name="fecha_vista" id="fecha_vista" value="fecha_vista"></label><br>
        <label for="poster">Incluye el poster de la pelicula <input type="file" name="poster" id="poster"></label><br>
        <input type="submit" value="Enviar" name="Enviar">
        <input type="reset" value="Reiniciar" name="Reiniciar">
    </form>
</body>
</html>