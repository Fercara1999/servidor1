<?php

function enviado(){
    if(isset($_REQUEST['Enviar'])){
        return true;
    }else{
        return false;
    }
}

function expresionCorreo(){
    $correo = $_REQUEST['correo'];
    $patron = '/^[a-zA-Z0-9]{3,}@[a-z]{5,}.[a-z]{2,3}$/';
    if(preg_match($patron,$correo))
        return true;
    else
        return false;
}

function expresionContrasena(){
    $contrasena = $_REQUEST['contrasena'];
    $patron = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,20}$/';
    if(preg_match($patron,$contrasena))
        return true;
    else
        return false;
    
}

function muestraError(&$errores,$campo){
    if(isset($errores[$campo]))
        echo $errores[$campo];
}

function coincidenContrasenas(){
    $contrasena = $_REQUEST['contrasena'];
    $confContrasena = $_REQUEST['confcontrasena'];

    if($contrasena === $confContrasena)
        return true;
    else
        return false;
}

function expresionTelefono(){
    $telefono = $_REQUEST['telefono'];
    $patron = '/\d{9}/';

    if(preg_match($patron,$telefono))
        return true;
    else
        return false;
}

function validaFormulario(&$errores){
            if(!expresionCorreo())
                $errores['correo'] = "La direccion de correo no es valida";
            if(!expresionContrasena())
                $errores['contrasena'] = "La contraseña no cumple con el patrón necesario";
            if(!coincidenContrasenas())
                $errores['confcontrasena'] = "Las contrasenas no coinciden";
            if(!expresionTelefono())
                $errores['telefono'] = "El telefono no es correcto";
            if(count($errores) == 0)
                return true;
            else
                return false;
}

?>