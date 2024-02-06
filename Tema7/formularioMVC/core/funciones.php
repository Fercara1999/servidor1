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

function validaFormularioLibro(&$errores) {

    if (!campoVacio($_REQUEST['isbn'])) {
        $errores['isbn'] = "ISBN vacío";
    }
    
    if (!campoVacio($_REQUEST['titulo'])) {
        $errores['titulo'] = "Título vacío";
    }

    if (!campoVacio($_REQUEST['autor'])) {
        $errores['autor'] = "Autor vacío";
    }

    if (!campoVacio($_REQUEST['editorial'])) {
        $errores['editorial'] = "Editorial vacía";
    }

    if (!campoVacio($_REQUEST['fechaLanzamiento'])) {
        $errores['fechaLanzamiento'] = "Fecha de Lanzamiento vacía";
    }

    if (!campoVacio($_REQUEST['numeroPaginas'])) {
        $errores['numeroPaginas'] = "Número de Páginas vacío";
    }

    if(count($errores) == 0){
        return true;
    }else{
        return false;
    }
}

function muestraError(&$array,$campo){
    if(isset($array[$campo]))
        echo $array[$campo];
}

function isAdmin(){
    if($_SESSION['usuario']->perfil == 'admin'){
        return true;
    }else{
        return false;
    }
}

?>
