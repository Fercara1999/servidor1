<?php 
require("curl.php");
require("configurarAPI.php");

    if(isset($_REQUEST['insertar'])){
        $array = array("nombre" =>$_REQUEST['nombre'],
        "localidad"=> $_REQUEST['localidad'],
        "telefono"=>$_REQUEST['telefono']);
        post("institutos",$array);
    }

?>

<form action="" method="post">
    <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label><br>
    <label for="localidad">Localidad: <input type="text" name="localidad" id="localidad"></label><br>
    <label for="telefono">Telefono: <input type="number" name="telefono" id="telefono"></label><br>
    <input type="submit" name="insertar" id="insertar">
</form>