<?php

function enviado(){
    if(isset($_REQUEST['Enviar']))
        return true;
    else
        return false;
}

function textoVacio($campo){
    if(empty($_REQUEST[$campo]))
        return true;
    else
        return false;
}

function expresionISBN(){
    $patron = '/^\d{13}$/';
    $campo = $_REQUEST['isbn'];
    if(preg_match($patron, $campo))
        return false;
    else
        return true;
}

function expresionTitulo(){
    $patron = '/^[A-Z]{1}[a-zA-Z\s]*$/';
    $campo = $_REQUEST['titulo'];
    if(preg_match($patron, $campo))
        return false;
    else
        return true;
}

function expresionAutor(){
    $patron = '/^[A-Z]{1}[a-z]{1,}\s[A-Z]{1}[a-z]{1,}(?:\s[A-Z]{1}[a-z]+)?$/';
    $campo = $_REQUEST['autor'];
    if(preg_match($patron, $campo))
        return false;
    else
        return true;
}

function validaFormulario(&$errores){
    if(textoVacio('isbn'))
        $errores['isbn'] = "El campo ISBN está vacío";
    else if(expresionISBN())
        $errores['isbn'] = "El ISBN no está en el formato correcto";
    if(textoVacio('titulo'))
        $errores['titulo'] = "El campo titulo está vacío";
    else if(expresionTitulo())
        $errores['titulo'] = "El titulo no comienza por mayúscula";
    if(textoVacio('autor'))
        $errores['autor'] = "El campo autor está vacío";
    else if(expresionAutor())
        $errores['autor'] = "El formato del nombre del autor es incorrecto";
    if(textoVacio('editorial'))
        $errores['editorial'] = "El campo editorial está vacío";
    else if(expresionTitulo())
        $errores['editorial'] = "El formato de la editorial es incorrecto";
    if(textoVacio('fechaLanzamiento'))
        $errores['fechaLanzamiento'] = "El campo fecha de lanzamiento está vacío";
    else if(compruebaFecha())
        $errores['fechaLanzamiento'] = "La fecha indicada tiene que ser anterior a la actual";
    if(textoVacio('precio'))
        $errores['precio'] = "El campo precio está vacío";
    if(count($errores) == 0 )
        return true;
    else
        return false;
}

function compruebaFecha(){
    $fecha = $_REQUEST['fechaLanzamiento'];
    $hoy = new DateTime('');    
    $hoyFormateado = $hoy->format('Y-m-d');
    if($fecha >= $hoyFormateado)
        return true;
    else
        return false;
}

function recuerda($name){
    if(enviado() && !empty($_REQUEST[$name])){
        echo $_REQUEST[$name];
    }
    if(isset($_POST['Borrar']))
        echo "''";
}

function muestraError(&$error,$campo){
    if(isset($error[$campo]))
        echo $error[$campo];
}

?>