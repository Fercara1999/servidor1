<?php

    function enviado(){
        if(isset($_REQUEST['Enviar'])){
            return true;
        }else{
            return false;
        }
    }

    function textoVacio($nombre){
        if(empty($_REQUEST[$nombre])){
            echo $nombre;
            return true;
        }else{
            echo $nombre;
            return false;
        }
    }

    function errores($errores,$name){
        if(isset($errores[$name])){
            echo $errores[$name];
        }
    }
    

    function coincidenContraseñas($contrasena,$confirma){
        if(strcmp($contrasena,$confirma)){
        // if($contrasena === $confirma){
            echo $contrasena;
            echo $confirma;
            return true;
        }else{
            echo $contrasena;
            echo $confirma;
            return false;
        }
    }

?>