<?php

require("./controlador/Base.php");
require("./controlador/PeliculaController.php");

if(isset($_SERVER['PATH_INFO'])){
    $recurso = Base::divideURI();

    if($recurso[1] == 'pelicula'){
        PeliculaController::peliculas();
    }
}else{
    Base::response("HTTP1/0 400 Dirección incorrecta, no se ha expecificado el recurso");
}

?>