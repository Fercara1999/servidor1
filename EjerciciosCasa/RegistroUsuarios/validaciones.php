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
            return true;
        }else{
            return false;
        }
    }

    function errores($errores,$name){
        if(isset($errores[$name])){
            echo $errores[$name];
        }
    }
    

    function coincidenContraseñas(){
        $contrasena = $_GET['contrasena'];
        $confirma = $_GET['confContrasena'];

            if($contrasena === $confirma){
                return false;
            }else{
                return true;
            }
        
    }

?>