<?php

    function enviado(){
        if (isset($_REQUEST['Enviar']))
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

    function compruebaMensaje(){

        $mensaje = $_GET['mensaje'];

        if(strlen($mensaje) > 10){
            echo "Buen mensaje";
        }else{
            echo "Mal mensaje";
        }
    }

    function recuerda($name){
        if(enviado() && !empty($_REQUEST[$name]))
            echo $_REQUEST[$name];

        if(isset($_REQUEST['Borrar']))
            echo "''";
    }
?>