<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
</head>
<body>

    <?php
        include("./validaciones.php");
    ?>

    <?php

        $errores = array();

        if(enviado()&& validaFormulario($errores))
            muestraFormulario();
        else{
    ?>

    <form action="" method="post" name="formularioLibros" enctype="multipart/form-data">

        <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo"></label>
        <?php errores($errores,'titulo')?><br>
        <label for="autor">Autor: <input type="text" name="autor" id="autor"></label>
        <?php errores($errores,'autor')?><br>
        <label for="isbn">ISBN: <input type="text" name="isbn" id="isbn"></label>
        <?php errores($errores,'isbn')?><br>
        Género: <select name="genero" id="genero">
            <option value="0">Selecicona una opcion</option>
            <option value="ficcion">Ficción</option>
            <option value="noficcion">No ficción</option>
            <option value="cienciaficcion">Ciencia Ficcion</option>
            <option value="misterio">Misterio</option>
            <option value="romance">Romance</option>
            <option value="otro">Otro</option>
        </select>
        <?php errores($errores,'genero')?>
        <br><label for="ano">Año de publicacion: <input type="text" name="ano" id="ano"></label>
        <?php errores($errores,'ano')?><br>
        <label for="sinopsis">Sinopsis: <input type="text" name="sinopsis" id="sinopsis"></label>
        <?php errores($errores,'sinopsis')?><br>
        <label for="editorial">Editorial: <input type="text" name="editorial" id="editorial"></label>
        <?php errores($errores,'editorial')?><br>
        <label for="imagen">Portada <input type="file" name="imagen" id="imagen"></label>
        <?php errores($errores,'imagen')?><br>
        <input type="submit" name="Enviar" id="Enviar">
        <input type="reset" name="Borrar" id="Borrar">


    </form>

    <?php

        }

    ?>

</body>
</html>