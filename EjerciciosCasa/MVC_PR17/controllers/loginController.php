<?php

    function sesionIniciada(){
        if(!isset($_SESSION['usuario']['usuario'])){
            $_SESSION['error'] = "No tiene la sesión iniciada";
            return false;
        }else
            return true;
    }

    if(isset($_REQUEST['login'])){
        $_SESSION['vista'] = VIEW.'sesiones.php';
        if(!empty($_SESSION['usuario'])){

        }
    }
?>