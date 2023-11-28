<?php

function enviado(){
    if(isset($_REQUEST['Enviar']))
        return true;
    else
        return false;
}

function expresionNombreCompleto(){
    $patron = '/^[A-Z]{1}[a-z]{2,20}\s[A-Z]{1}[a-z]{2,20}\s[A-Z]{1}[a-z]{2,20}$/';
    $campo = $_REQUEST['nombreCompleto'];
    if(preg_match($patron, $campo))
        return true;
    else
        return false;
}

function expresionContrasena(){
    $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/';
    $campo = $_REQUEST['contrasena'];
    if(preg_match($patron, $campo))
        return true;
    else
        return false;
}

function muestraError(&$errores,$campo){

    if(isset($errores[$campo]))
        echo $errores[$campo];
    else
        echo "";
}

function validaFormulario(&$errores){

    if(!expresionNombreCompleto())
        $errores['nombreCompleto'] = "El formato del nombre no es el correcto";
    if(!expresionContrasena())
        $errores['contrasena'] = "El formato de la contraseña no es correcto";
}

// Otros patrones: 
    // $patronCorreo = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    // $patronTelefono = '/^\+\d{1,3}-\d{1,14}$/';
    // $patronFecha = '/^\d{4}-\d{2}-\d{2}$/';


?>