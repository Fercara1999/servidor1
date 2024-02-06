<?php

// Se ejecuta cuando reciba el intento de acertar una palabra del usuario 
if(isset($_REQUEST['pruebaLetra'])){

    $errores = [];
    // Comprobamos que la letra introducida es válida
    if(validaLetra($errores)){

        // Boolean para comprobar si se acierta o no
        $acierto = true;
        for ($i=0; $i < strlen($_REQUEST['palabraOculta']); $i++) { 
            if($_REQUEST['palabraOculta'][$i] == $_REQUEST['letra']){
                $_REQUEST['asteriscos'][$i] = $_REQUEST['letra'];
                $nuevaOculta = $_REQUEST['asteriscos'];
                if(isset($_REQUEST['asteriscosNueva'])){
                    $_REQUEST['asteriscosNueva'][$i] = $_REQUEST['letra'];
                }
                $acierto = false;
            }
        }
    }else{
        muestraError($errores,'letra');
    }

    
    if($acierto == true){
        echo "Te quedan " . $_REQUEST['intentos']-- ." intentos";
    }
}

?>