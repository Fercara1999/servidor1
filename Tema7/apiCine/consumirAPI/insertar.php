<?php 
require("curl.php");
require("configurarAPI.php");

    if(isset($_REQUEST['insertar'])){
        $array = array("titulo" =>$_REQUEST['titulo'],
        "director"=> $_REQUEST['directo'],
        "genero"=>$_REQUEST['genero']);
        post("pelicula",$array);
    }

?>

<form action="" method="post">
    <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo"></label>
    <label for="directo">Director: <input type="text" name="directo" id="directo"></label><br>
    <label for="genero">Genero: <input type="text" name="genero" id="genero"></label><br>
    <input type="submit" name="insertar" id="insertar">
</form>