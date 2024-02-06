<?php

// Validamos el formulario de inicio de sesión
function validaFormulario(&$errores){
    if(campoVacio('usuario'))
        $errores['nombre'] = "Nombre vacío";
    if(campoVacio('contrasena'))
        $errores['contrasena'] = "Contraseña vacía";

    if(count($errores) == 0)
        return true;
    else
        return false;
}

// Valida si el campo letra está vacío o si no cumple la expresion regular
function validaLetra(&$errores){
    if(campoVacio('letra'))
        $errores['letra'] = "Letra vacía";
    if(expresionLetra()){
        $errores['letra'] = "No has introducido un caracter valido";
    }
}

// Expresión regular para la letra
function expresionLetra(){
    $patron = '/^[A-Za-z]{1}+$/';
    $campo = $_REQUEST['letra'];
    
    if(preg_match($patron, $campo)) {
        return false;
    } else {
        return true;
    }
}

// Comprobamos si un campo está o no vacío
function campoVacio($campo){
    if(empty($_REQUEST[$campo]))
        return true;
    else
        return false;
}

// Mostramos errores
function muestraError(&$array,$campo){
    if(isset($array[$campo]))
        echo $array[$campo];
}

// Comprobamos si el usuario está validado
function validado(){
    if(isset($_SESSION['usuario']))
        return true;
    else
        return false;
}

// Función para comprobar si un usuario es o no admin
function isAdmin(){
    if($_SESSION['usuario']->tipo == 'admin')
        return true;
    else
        return false;
}

?>