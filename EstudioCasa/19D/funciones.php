<?php

include("./seguro/datos.php");


function esUsuario(){
    if($_SERVER['PHP_AUTH_USER'] == USER && hash('sha256',$_SERVER['PHP_AUTH_PW']) == PASSWORD){
        return true;
    }else
        return false;
}

?>