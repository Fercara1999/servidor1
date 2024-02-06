<?php

// Si hemos pulsado en iniciar sesión entramos
if(isset($_REQUEST['iniciarSesion'])){
    $errores = [];
    // Validamos el formulario;
    if(validaFormulario($errores)){
        // Obtenemos un usuario si el inicio de sesión es correcto
        $usuario = UsuarioDAO::validarUsuario($_REQUEST['usuario'], $_REQUEST['contrasena']);

        // Si el login es correcto
        if($usuario != null){
            if(isset($_REQUEST['recuerdame'])){
                // y hemos pulsado en recordar, creamos la cookie
                setcookie("usuario",$_REQUEST['usuario'],time()+(3600*24*7));
                setcookie("contrasena",$_REQUEST['contrasena'],time()+(3600*24*7));
            }else{
                // Si no hemos pulsado recordar, borramos la cookie
                setcookie("usuario","",time()-1);
                setcookie("contrasena","",time()-1);
            }
            // Configuramos la sesión
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW . 'home.php';
        // Si no lo es
        }else{
            echo "No existe el usuario y contraseña";
        }
    }else{
        echo "Has dejado campos vacíos en el login";
    }
}

?>