<?php

    function enviado(){
        if(isset($_REQUEST['Enviar']))
            return true;
        else
            return false;
    }

    function textoVacio($name){

        if(empty($_REQUEST[$name]))
            return true;
        else
            return false;
    }

    function errores($errores,$name){
        if(isset($errores[$name]))
            echo $errores[$name];
    }

    function radioVacio($name){
        if(isset($_REQUEST[$name]))
            return false;
        return true; 
    }

    function distinta0(){
        if(isset($_REQUEST['selecciona']) && $_REQUEST['selecciona'] == '0')
            return true;
    }

?>