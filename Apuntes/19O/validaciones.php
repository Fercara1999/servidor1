<?php

    function enviado(){
        if(isset($_REQUEST['Enviar']))
           return true;
        else   
            return false;
    }

    function textVacio($name){
        if(empty($_REQUEST[$name]))
            return true;
        else
            return false;
        
    }

    function errores($errores,$name){
        if(isset($errores[$name]))
            echo $errores[$name];
    }

    function recuerda($name){
        if(enviado() && !empty($_REQUEST[$name])){
            echo $_REQUEST[$name];
        }
        if(isset($_REQUEST['Borrar']))
            echo "''";
    }

    function radioVacio($name){
        if(isset($_REQUEST[$name]))
            return false;
        return true; 
    }

    function recuerdaRadio($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value)
            echo 'checked';
        elseif(isset($_REQUEST['Borrar']))
            echo '';
    }

    function recuerdaCheck($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && in_array($value,$_REQUEST[$name]))
            echo 'checked';
        elseif(isset($_REQUEST['Borrar']))
            echo '';
    }

   function distinta0(){
        if(isset($_REQUEST['equipos']) && $_REQUEST['equipos'] == '0')
            return true;
   }

   function recuerdaSelect($name,$value){
    if(enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value)
        echo 'selected';
    elseif(isset($_REQUEST['Borrar']))
        echo '';
   }

   function validaFormulario(&$errores){
    if(textVacio('nombre'))
        $errores['nombre'] = "Nombre vacio";
    if(textVacio('apellido'))
        $errores['apellido'] = "Apellido vacio";
    if(radioVacio('genero'))
        $errores['genero'] = "Debes seleccionar un genero";
    if(radioVacio('aficion'))
        $errores['aficion'] = "Debes seleccionar al menos una opcion";
    if(textVacio('fecha_n'))
        $errores['fecha_n'] = 'Fecha de nacimiento vacia';
    if(distinta0())
        $errores['equipos'] = 'Has seleccionado una opcion no valida';
    if(textVacio('fichero'))
        $errores['fichero'] = "Fichero vacio";
    if(count($errores) == 0)
        return true;
    else
        return false;
   }
    
?>