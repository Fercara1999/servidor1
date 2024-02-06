<?php

require("curl.php");
require("configurarAPI.php");

    $uri = $_SERVER['PATH_INFO'];
    $recursos = explode('/',$uri);
    if(count($recursos) == 2){
        $id = $recursos[1];
        delete("institutos",$id);
    }else{
        echo "No se ha podido eliminar";
    }

?>