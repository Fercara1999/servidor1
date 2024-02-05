<?php

if(isset($_REQUEST['iniciarSesion'])){

    $erroresInicioSesion = [];
    if(validaFormulario($erroresInicioSesion)){
        $usuario = UsuarioDAO::validaUsuario($_REQUEST['usuario'],$_REQUEST['contrasena']);
        if(isset($_REQUEST['recuerda'])){
            setcookie('usuario', $_REQUEST['usuario'], time() + (30 * 24 * 60 * 60));
            setcookie('contrasena', $_REQUEST['contrasena'], time() + (30 * 24 * 60 * 60));
        }
        if($usuario != null){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW . 'home.php';

        }else{
            $_SESSION['msg'] = "No se ha podido iniciar sesión";
        }
    }
}else if(isset($_REQUEST['cerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
}

?>