<?php 

function enviado(){
    if(isset($_REQUEST['Entrar']))
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

?>