<?php

if(isset($_REQUEST['iniciarSesion'])){
    $usuario = UsuarioDAO::validarUsuario($_REQUEST['usuario'], $_REQUEST['contrasena']);

    if($usuario != null){
        if(isset($_REQUEST['recuerda'])){
            setcookie("usuario",$_REQUEST['usuario'],time()+(3600*24*7));
        }
        $_SESSION['usuario'] = $usuario;
        $_SESSION['vista'] = VIEW. 'home.php';
    }
}
?>