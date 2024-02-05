<?php

function sesionIniciada(){
    if(isset($_SESSION['usuario'])){
        return true;
    }else{
        return false;
    }
}

function validaFormulario(&$errores){
    if(campoVacio('usuario'))
        $errores['usuario'] = "Nombre vacío";
    if(campoVacio('contrasena'))
        $errores['contrasena'] = "Contraseña vacía";

    if(count($errores) == 0)
        return true;
    else
        return false;
}

function campoVacio($campo){
    if(empty($_REQUEST[$campo]))
        return true;
    else
        return false;
}


?>