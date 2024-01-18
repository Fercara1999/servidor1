<?php

if(isset($_REQUEST['iniciarSesion'])){
    // ver si nombre y contraseña no están vacíos
    $errores = array();
    if(validaFormulario($errores)){
        $usuario = UserDAO::validarUsuario($_REQUEST['nombre'],$_REQUEST['contrasena']);

        if($usuario != null){
            $usuario->fechaUltimaConexion = (new DateTime())->format('Y-m-d H:i:s');
            UserDAO::update($usuario);
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW.'home.php';
            unset($_SESSION['controller']);
        }else{
            $errores['validado'] = "No existe el usuario y contraseña";
        }
        // Valida el usuario en la base de datos
        // Iniciar sesión validada
        $_SESSION['vista'] = VIEW.'home.php';
        unset($_SESSION['controller']);
        // Home pero con modificaciones

    }else{
        
    }
}else if(isset($_REQUEST['loginRegistro'])){
    $_SESSION['vista'] = VIEW."./registro.php";
    $_SESSION['controller'] = CON."registroController.php";
}

?>