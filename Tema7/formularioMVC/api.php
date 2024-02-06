<?php

require('./controllers/Base.php');
require('./controllers/librosController.php');

// print_r(Base::condiciones());

if(isset($_SERVER['PATH_INFO'])){
    // Comprobar el recurso
    $recurso = Base::divideURI();
    // echo $recurso[1]; 
    if($recurso[1] === 'libros'){
        LibroController::libros();
    }else{

    }
}else{
    Base::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
}

?>