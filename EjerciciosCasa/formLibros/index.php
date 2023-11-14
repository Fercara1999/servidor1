<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formLibros - Fernando Calles</title>
    <link rel="stylesheet" href="./../../css/estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./funciones.php");
    ?>

    <?php
        if(isset($_REQUEST["ver"])){
            header("Location: ./muestraLibros.php");
        }

        $errores = [];

        if(enviado() && validaFormulario($errores)){
           echo"Bien";
        }else{

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo" value="<?php recuerda('titulo') ?>"></label>
        <?php muestraError($errores,'titulo'); ?><br>
        <label for="autor">Autor: <input type="text" name="autor" id="autor" value="<?php recuerda('autor') ?>"></label>
        <?php muestraError($errores,'autor'); ?><br>
        <label for="editorial">Editorial: <input type="text" name="editorial" id="editorial" value="<?php recuerda('editorial') ?>"></label>
        <?php muestraError($errores,'editorial'); ?><br>
        <label for="fechaPub">Fecha de publicacion: <input type="text" name="fechaPub" id="fechaPub" value="<?php recuerda('fechaPub') ?>"></label>
        <?php muestraError($errores,'fechaPub'); ?><br>
        <label for="precio">Precio: <input type="text" name="precio" id="precio" value="<?php recuerda('precio') ?>"></label>
        <?php muestraError($errores,'precio'); ?><br>
        <label for="portada">Portada: <input type="file" name="portada" id="portada"></label><br>
        <input type="submit" name="Enviar" id="Enviar" value="Añadir">
        <input type="reset" name="Borrar" id="Borrar">
    </form>

    <form action="" method="get">
        <br><input type="submit" value="ver" name="ver" id="ver">
    </form>
    
    <?php
        }
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>