<?php

function campoVacio($campo){
    if(empty($_REQUEST[$campo]))
        return true;
    else
        return false;
}

function validaFormularioRegistro(&$errores){
    if(campoVacio('usuario'))
        $errores['usuario'] = "Usuario vacío";
    if(campoVacio('contrasena'))
        $errores['contrasena'] = "Contraseña vacío";

    if(count($errores) == 0)
        return true;
    else
        return false;
}

function validado(){
    if(isset($_SESSION['usuario']))
        return true;
    else
        return false;
}

function isAdmin(){
    if($_SESSION['usuario']->perfil == "admin"){
        return true;
    }else{
        return false;
    }
}

?>