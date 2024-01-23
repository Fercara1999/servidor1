<?php

function validaFormulario(&$errores){
    if(campoVacio('nombre'))
        $errores['nombre'] = "Nombre vacío";
    if(campoVacio('contrasena'))
        $errores['contrasena'] = "Contraseña vacía";

    if(count($errores) == 0)
        return true;
    else
        return false;
}

function validaFormularioRegistro(&$errores){
    if(campoVacio('codUsuario'))
        $errores['codUsuario'] = "Código de usuario vacío";
    if(campoVacio('descUsuario'))
        $errores['descUsuario'] = "Nombre de usuario vacío";
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

function muestraError(&$array,$campo){
    if(isset($array[$campo]))
        echo $array[$campo];
}

function validado(){
    if(isset($_SESSION['usuario']))
        return true;
    else
        return false;
}

function passIgual($contrasena,$confirmaContrasena,&$errores){
    if($contrasena !== $confirmaContrasena){
        $errores['igual'] = "Las contraseñas no coinciden";      
        return false;
    }
    return true;
}

?>