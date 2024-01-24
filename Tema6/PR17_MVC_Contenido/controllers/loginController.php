<?php

$con = new PDO(DSN,USER,PASSWORD);

    if(isset($_REQUEST['iniciarSesion'])){
        $usuario = UserDAO::validaUsuario($_REQUEST['usuario'],$_REQUEST['contrasena']);
        if($usuario != null)
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW.'home.php';
    }
?>