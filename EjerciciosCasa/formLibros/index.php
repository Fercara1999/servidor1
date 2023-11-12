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
        if(enviado()){

        }

        if(isset($_REQUEST["ver"])){
            header("Location: ./muestraLibros.php");
        }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo"></label><br>
        <label for="autor">Autor: <input type="text" name="autor" id="autor"></label><br>
        <label for="editorial">Editorial: <input type="text" name="editorial" id="editorial"></label><br>
        <label for="fechaPub">Fecha de publicacion: <input type="Date" name="fechaPub" id="fechaPub"></label><br>
        <label for="precio">Precio: <input type="text" name="precio" id="precio"></label><br>
        <label for="portada">Portada: <input type="file" name="portada" id="portada"></label><br>
        <input type="submit" name="Enviar" id="Enviar" value="Enviar">
        <input type="reset" name="Borrar" id="Borrar">
    </form>

    <form action="" method="get">
        <br><input type="submit" value="ver" name="ver" id="ver">
    </form>
    
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>