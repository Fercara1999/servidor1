<?php

require ('./seguro/datos.php');
require ('./funciones.php');


if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
    if(!isAdmin() && !isUser()){
        header('Location: ./index.php');
        exit;    
    }
}else{
        header('Location: ./index.php');
        exit;    
}
echo "Eres el usaurio: " .$_SERVER['PHP_AUTH_USER']
?>

PAgina Usuario
<a href="./cerrar.php">Cerrar sesion</a>