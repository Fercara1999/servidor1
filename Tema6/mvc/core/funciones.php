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

function validaFormularioNuevaCita(&$errores){
    if(campoVacio('especialista'))
        $errores['especialista'] = "Campo especialista vacío";
    if(campoVacio('motivo'))
        $errores['motivo'] = "Campo motivo vacío";
    if(campoVacio('fecha'))
        $errores['fecha'] = "Campo fecha vacía";

    if(!empty($errores['especialista']) || !empty($errores['motivo']) || !empty($errores['fecha']))
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

function isAdmin(){
    if($_SESSION['usuario']->perfil == 'administrador')
        return true;
    else
        return false;
}

?>