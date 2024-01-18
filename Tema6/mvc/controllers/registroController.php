<?php

if(isset($_REQUEST['finalizarRegistro'])){
    $errores = array();
    if(validaFormularioRegistro($errores)){
        $usuario = new User(
            $_REQUEST['codUsuario'],
            sha1($_REQUEST['contrasena']),
            $_REQUEST['descUsuario'],
            (new DateTime())->format('Y-m-d H:i:s'),
            'usuario',
            1
        );
        UserDAO::insert($usuario);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['vista'] = VIEW.'home.php';
        unset($_SESSION['controller']);
    }else
        $errores['validado'] = "No se ha podido completar el registro";

    // $_SESSION['vista'] = VIEW.'home.php';
    // unset($_SESSION['controller']);
}

?>