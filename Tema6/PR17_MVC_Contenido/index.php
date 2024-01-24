<?php

require("./config/config.php");
// require("./core/funciones.php");
require(VIEW."./layout.php");

// session_start();

if(isset($_REQUEST['login'])){
    $_SESSION['vista'] = VIEW.'sesiones.php';
    require($_SESSION['vista']);
}else if(isset($_REQUEST['anadir'])){
    $_SESSION['vista'] = VIEW.'carrito.php';
}

?>