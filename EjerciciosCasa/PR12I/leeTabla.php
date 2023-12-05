<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/estilos.css">
    <title>Lee Tabla - Fernando Calles</title>

    
</head>
<body>
    
<?php
    include("./fragmentos/header.html");
    require("./funcionesBD.php");
    include("./validacionesForm.php");

    $erroresBusqueda = [];

    if(buscado() && validaBusqueda($erroresBusqueda)){
    }else{


?>

<form action="" method="get">
    <label for="opciones">Elige un campo con el que buscar:</label>
    <select name="opcion" id="opcion">
        <option value="0">Selecciona una opcion</option>
        <option <?php recuerdaSelect('opcion','titulo') ?> value="titulo">Titulo</option>
        <option <?php recuerdaSelect('opcion','autor') ?> value="autor">Autor</option>
        <option <?php recuerdaSelect('opcion','editorial') ?> value="editorial">Editorial</option>
    </select>
    <label for="busqueda"> Introduce tu búsqueda: <input type="text" name="busqueda" id="busqueda" value='<?php recuerdaBusqueda('busqueda') ?>'></label>
    <input type="submit" name="Buscar" id="Buscar" value="Buscar"><br>
    <?php muestraError($erroresBusqueda,'opcion')?>
    <br>
    <?php muestraError($erroresBusqueda,'busqueda')?>
</form>
<br>
<?php

    }
    
    if (isset($_GET['Modificar'])){
        modificaCampo();
    }elseif (isset($_GET['Eliminar'])){
        borraDato();
        header('Location: ./leeTabla.php');
    }elseif (isset($_GET['Buscar'])){
            buscar();
    }else{     
        leeTabla();
    }

    if(isset($_GET['Guardar'])){
        guardaCambios();
        header('Location: ./leeTabla.php');
    }

    if(isset($_GET['Insertar'])){
        header('Location: ./insertaLibro.php');
    }

    if(isset($_GET['verTabla'])){
        header('Location: ./leeTabla.php');
    }

?>

<br>
<form action="" method="get">
    <input type="submit" name="Insertar" id="Insertar" value="Nuevo Libro">
</form>
<br>
<form action="" method="get">
    <input type="submit" name="verTabla" id="verTabla" value="Mostrar Tabla">
</form>
<?php
        include("./fragmentos/footer.php");
    ?>
</body>
</html>