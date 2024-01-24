<?php

session_start();

require("./config/config.php");

if(isset($_REQUEST['login'])){
    $_SESSION['vista'] = VIEW.'sesiones.php';
    $_SESSION['controller'] = CON.'loginController.php';
}else if(isset($_REQUEST['anadir'])){
    $_SESSION['vista'] = VIEW.'carrito.php';
}else if(isset($_REQUEST['home'])){
    $_SESSION['vista'] = VIEW.'home.php';
    header('Location: index.php');
    exit;
}else if(isset($_REQUEST['botonHome'])){
    $_SESSION['vista'] = VIEW.'home.php';
}

if(isset($_SESSION['controller']))
    require($_SESSION['controller']);

if(!empty($_SESSION['controller']))
    require($_SESSION['controller']);

require(VIEW."./layout.php");

?>