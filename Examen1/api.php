<?php

require("./config/config.php");
require("./api/partidaController2.php");

if(isset($_SERVER['PATH_INFO'])){
        // Comprobar el recurso
        $uri = $_SERVER['PATH_INFO'];
        $recurso = explode('/',$uri);
        // echo $recurso[1]; 
        if($recurso[1] === 'palabra'){
            PartidaController::palabra();
        }else{
            PartidaController::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
        }
    }else{
        PartidaController::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
    }

?>