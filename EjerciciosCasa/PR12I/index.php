<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/estilos.css">
    <title>Document</title>

    
</head>
<body>
    
<?php
    include("./fragmentos/header.html");
    require("./funcionesBD.php");
    include("./validacionesForm.php");

    cargaScript();

    if(isset($_REQUEST['Crear'])){
        insertaScript();
    }

    leeTabla();

    $errores = [];

    if(enviado() && validaFormulario($errores)){
        if(isset($_REQUEST['Enviar']))
            insertaDatos();
            header("Location: ./index.php");
    }else{

?>
<br>
<form action="" method="get">
    <label for="isbn">ISBN: <input type="number" name="isbn" id="isbn" value='<?php recuerda('isbn') ?>'></label>
    <?php muestraError($errores,'isbn'); ?><br>
    <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo" value='<?php recuerda('titulo') ?>'></label>
    <?php muestraError($errores,'titulo'); ?><br>
    <label for="autor">Autor: <input type="text" name="autor" id="autor" value='<?php recuerda('autor') ?>'></label>
    <?php muestraError($errores,'autor'); ?><br>
    <label for="editorial">Editorial: <input type="text" name="editorial" id="editorial" value='<?php recuerda('editorial') ?>'></label>
    <?php muestraError($errores,'editorial'); ?><br>
    <label for="fechaLanzamiento">Fecha de lanzamiento: <input type="date" name="fechaLanzamiento" id="fechaLanzamiento" value='<?php recuerda('fechaLanzamiento') ?>'></label>
    <?php muestraError($errores,'fechaLanzamiento'); ?><br>
    <label for="precio">Precio: <input type="number" name="precio" id="precio" step='0.01' value='<?php recuerda('precio') ?>'></label>
    <?php muestraError($errores,'precio'); ?><br>
    <input type="submit" name="Enviar" id="Enviar">
</form>
<br>
<?php } ?>
    <form action="" method="get">
    SI ES LA PRIMERA VEZ QUE USAS EL PROGRAMA, PRIMERO DEBES CREAR LA BASE DE DATOS -> <input type="submit" value="Crear BD" id="Crear" name="Crear"><br>
    <input type="submit" name="Mostrar" id="Mostrar" value="Mostrar Datos">
    </form>

    <?php
        include("./fragmentos/footer.php");
    ?>
</body>
</html>