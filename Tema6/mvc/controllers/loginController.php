<?php

if(isset($_REQUEST['iniciarSesion'])){
    // ver si nombre y contraseña no están vacíos
    $errores = array();
    if(validaFormulario($errores)){
        $usuario = UserDAO::validarUsuario($_REQUEST['nombre'],$_REQUEST['contrasena']);

        if($usuario != null){
            $usuario->fechaUltimaConexion = date_format(new DateTime(''),'Y-m-d');
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
}

?>