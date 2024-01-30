<?php

require('./controlador/Base.php');
require('./controlador/InstitutosController.php');

print_r(Base::condiciones());

if(isset($_SERVER['PATH_INFO'])){
    // Comprobar el recurso
    $recurso = Base::divideURI();
    // echo $recurso[1]; 
    if($recurso[1] === 'institutos'){
        InstitutosController::institutos();
    }else{

    }
}else{
    Base::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
}

?>