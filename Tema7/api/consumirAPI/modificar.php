<?php 
require("curl.php");
require("configurarAPI.php");

    if(isset($_REQUEST['modificar'])){
        $array = [];
        if(!empty($_REQUEST['nombre'])){
            $array['nombre'] = $_REQUEST['nombre'];
        }
        if(!empty($_REQUEST['localidad'])){
            $array['localidad'] = $_REQUEST['localidad'];
        }
        if(!empty($_REQUEST['telefono'])){
            $array['telefono'] = $_REQUEST['telefono'];
        }

        $uri = $_SERVER['PATH_INFO'];
        $recursos = explode('/',$uri);
        $id = $recursos[1];
        put("institutos",$id,$array);
    }

?>

<form action="" method="post">
    <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label><br>
    <label for="localidad">Localidad: <input type="text" name="localidad" id="localidad"></label><br>
    <label for="telefono">Telefono: <input type="number" name="telefono" id="telefono"></label><br>
    <input type="submit" name="modificar" id="modificar">
</form>