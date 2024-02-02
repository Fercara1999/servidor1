<?php 
require("curl.php");
require("configurarAPI.php");

    if(isset($_REQUEST['modificar'])){
        $array = [];
        if(!empty($_REQUEST['titulo'])){
            $array['titulo'] = $_REQUEST['titulo'];
        }
        if(!empty($_REQUEST['directo'])){
            $array['director'] = $_REQUEST['director'];
        }
        if(!empty($_REQUEST['genero'])){
            $array['genero'] = $_REQUEST['genero'];
        }

        $uri = $_SERVER['PATH_INFO'];
        $recursos = explode('/',$uri);
        $id = $recursos[1];
        put("pelicula",$id,$array);
    }

?>

<form action="" method="post">
    <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo"></label>
    <label for="directo">Director: <input type="text" name="directo" id="directo"></label><br>
    <label for="genero">Genero: <input type="text" name="genero" id="genero"></label><br>
    <input type="submit" name="insertar" id="insertar">
</form>