<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormValidaciones</title>
</head>
<body>

<?php
    include("./funciones.php");

    $errores = [];

    if(enviado() && validaFormulario($errores)){
        creaFichero();
        header("Location: ./muestra.php");
    }

?>
    <form action="" method="get">
        <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo" value="<?php recuerdaTexto('titulo') ?>"></label>
        <?php muestraErrores($errores,'titulo') ?><br>
        <label for="autor">Autor: <input type="text" name="autor" id="autor" value="<?php recuerdaTexto('autor') ?>"></label>
        <?php muestraErrores($errores,'autor') ?><br>
        <label for="editorial">Editorial: <input type="text" name="editorial" id="editorial" value="<?php recuerdaTexto('editorial') ?>"></label>
        <?php muestraErrores($errores,'editorial') ?><br>
        <label for="fechaPublicacion">Fecha de publicacion: <input type="text" name="fechaPublicacion" id="fechaPublicacion" value="<?php recuerdaTexto('fechaPublicacion') ?>"></label>
        <?php muestraErrores($errores,'fechaPublicacion') ?><br>
        <label for="precio">Precio: <input type="text" name="precio" id="precio" value="<?php recuerdaTexto('precio') ?>"></label>
        <?php muestraErrores($errores,'precio') ?><br>
        <input type="submit" name="Enviar" id="Enviar">
        <input type="reset" name="Borrar" id="Borrar" value="Borrar">
    </form>
</body>
</html>