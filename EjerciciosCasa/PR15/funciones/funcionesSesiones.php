<?php

function sesionIniciada(){
    if(!isset($_SESSION['usuario'])){
        $_SESSION['error'] = "No tiene la sesión iniciada";
        return false;
    }else
        return true;
}

?>