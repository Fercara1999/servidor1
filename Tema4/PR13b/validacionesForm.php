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

function i_expresionISBN(){
    $patron = '/^\d{13}$/';
    $campo = $_REQUEST['dato0'];
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

function expresionEditorial(){
    $patron = '/^[A-Z]{1}[a-zA-Z\s]*$/';
    $campo = $_REQUEST['editorial'];
    if(preg_match($patron, $campo))
        return false;
    else
        return true;
}

function i_expresionTitulo(){
    $patron = '/^[A-Z]{1}[a-zA-Z\s]*$/';
    $campo = $_REQUEST['dato1'];
    if(preg_match($patron, $campo))
        return false;
    else
        return true;
}

function i_expresionEditorial(){
    $patron = '/^[A-Z]{1}[a-zA-Z\s]*$/';
    $campo = $_REQUEST['dato3'];
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

function i_expresionAutor(){
    $patron = '/^[A-Z]{1}[a-z]{1,}\s[A-Z]{1}[a-z]{1,}(?:\s[A-Z]{1}[a-z]+)?$/';
    $campo = $_REQUEST['dato2'];
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
    else if(expresionEditorial())
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

function validaFormularioGuarda(&$errores){
    if(textoVacio('dato0'))
        $errores['dato0'] = "El campo ISBN está vacío";
    else if(i_expresionISBN())
        $errores['dato0'] = "El ISBN no está en el formato correcto";
    if(textoVacio('dato1'))
        $errores['dato1'] = "El campo titulo está vacío";
    else if(i_expresionTitulo())
        $errores['dato1'] = "El titulo no comienza por mayúscula";
    if(textoVacio('dato2'))
        $errores['dato2'] = "El campo autor está vacío";
    else if(i_expresionAutor())
        $errores['dato2'] = "El formato del nombre del autor es incorrecto";
    if(textoVacio('dato3'))
        $errores['dato3'] = "El campo editorial está vacío";
    else if(i_expresionEditorial())
        $errores['dato3'] = "El formato de la editorial es incorrecto";
    if(textoVacio('dato4'))
        $errores['dato4'] = "El campo fecha de lanzamiento está vacío";
    else if(i_compruebaFecha())
        $errores['dato4'] = "La fecha indicada tiene que ser anterior a la actual";
    if(textoVacio('dato5'))
        $errores['dato5'] = "El campo precio está vacío";
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

function i_compruebaFecha(){
    $fecha = $_REQUEST['dato4'];
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
}

function muestraError(&$error,$campo){
    if(isset($error[$campo]))
        echo $error[$campo];
}

function distinta0(){
    if($_GET['opcion'] == '0')
        return true;
    else
        return false;
}

function buscado(){
    if(isset($_REQUEST['Buscar']))
        return true;
    else
        return false;
}

function validaBusqueda(&$errores){
    if(distinta0())
        $errores['opcion'] = "No has seleccionado un campo de busqueda";
    if(textoVacio('busqueda'))
        $errores['busqueda'] = "El campo de busqueda está vacío";
    if(count($errores) == 0)
        return true;
    else
        return false;
}

function recuerdaBusqueda($name){
    if(buscado() && !empty($_REQUEST[$name])){
        echo $_REQUEST[$name];
    }
}

function recuerdaSelect($name,$value){
    if(buscado() && isset($_GET[$name]) && $_GET[$name] == $value)
        echo 'selected';
    else
        echo '';
}


?>