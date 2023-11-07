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
        if(enviado() && $_REQUEST[$name])
            echo $_REQUEST[$name];
        else
            echo "''";
    }

    function compruebaRadio($name){
        if(isset($_REQUEST[$name]))
            return false;
        else
            return true;
    }

    function recuerdaRadio($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value)
            echo 'checked';
        else
            echo '';
    }

    function recuerdaSelect($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && in_array($value,$_REQUEST[$name]))
            echo 'checked';
        else
            echo '';
    }

    function compruebaCheck($name){
        if($_REQUEST[$name] == 0)
            return true;
    }

    function validaFormulario(&$errores){
        if(textVacio('nombre'))
            $errores['nombre'] = "Nombre vacío";
        if(textVacio('apellidos'))
            $errores['apellidos'] = "Apellidos vacío";
        if(compruebaRadio('genero'))
            $errores['genero'] = "No has marcado un genero";
        if(compruebaRadio('aficiones'))
            $errores['aficiones'] = "No has seleccionado ninguna aficion";
        if(compruebaCheck('equipos'))
            $errores['equipos'] = "No has seleccionado un equipo";
        if(textVacio('fichero'))
            $errores['fichero'] = "Fichero vacio";
        if (count($errores) == 0)
            return true;
        else
            return false;

    }   
?>