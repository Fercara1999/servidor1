<?php

session_start();

require("./config/config.php");

if(isset($_REQUEST['login'])){
    $_SESSION['vista'] = VIEW.'sesiones.php';
    $_SESSION['controller'] = CON.'loginController.php';
}else if(isset($_REQUEST['anadir'])){
    $_SESSION['vista'] = VIEW.'carrito.php';
    $_SESSION['controller'] = CON.'carritoController.php';
}else if(isset($_REQUEST['home'])){
    $_SESSION['vista'] = VIEW.'home.php';
    header('Location: index.php');
    exit;
}else if(isset($_REQUEST['botonHome'])){
    $_SESSION['vista'] = VIEW.'home.php';
}else if(isset($_REQUEST['botonCarrito'])){
    $_SESSION['vista'] = VIEW.'carrito.php';
    $_SESSION['controller'] = CON.'carritoController.php';
}else if(isset($_REQUEST['botonHomeUser'])){
    if(isAdmin()){
        $_SESSION['vista'] = VIEW.'homeAdmin.php';
    }else if(isModerador()){
        $_SESSION['vista'] = VIEW.'homeModerador.php';
    }else{
        $_SESSION['vista'] = VIEW.'homeUser.php';
    }
    $_SESSION['controller'] = CON.'userController.php';
}else if(isset($_REQUEST['modificarProducto'])){
    $_SESSION['controller'] = CON.'libroController.php';
}else if(isset($_REQUEST['buscar'])){
    $_SESSION['controller'] = CON.'libroController.php';
}

if(isset($_SESSION['controller']))
    require($_SESSION['controller']);

// if(!empty($_SESSION['controller']))
//     require($_SESSION['controller']);

require(VIEW."./layout.php");

?>