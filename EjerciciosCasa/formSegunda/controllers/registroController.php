<?php

if(isset($_REQUEST['registrarme'])){
    $erroresRegistro = array();
    if(validaFormularioRegistro($erroresRegistro)){
        $usuario = new Usuario(
            null,
            $_REQUEST['usuario'],
            $_REQUEST['contrasena'],
            0,
            'user',
            1
        );
        UsuarioDAO::insert($usuario);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['vista'] = VIEW.'home.php';
        echo "Usuario registrado correctamente";
        unset($_SESSION['controller']);
    }else{
        echo "Problemas al registrar al usuario";
    }
}
?>