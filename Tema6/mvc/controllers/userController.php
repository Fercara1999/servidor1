<?php

// Anteriormente el controlador haya buscado un controlador
if(!validado()){
    $_SESSION['vista'] = VIEW.'login.php';
    $_SESSION['controller'] = CON.'loginController.php';
}else{
    if(isset($_REQUEST['modificarDatos'])){
        $_SESSION['vista'] = VIEW.'editarUser.php';
    }
    if(isset($_REQUEST['cambiarContrasena'])){
        $_SESSION['vista'] = VIEW.'editarContrasena.php';
    }else if(isset($_REQUEST['guardarCambios'])){
        $usuario = $_SESSION['usuario'];
        if(!campoVacio('nombre')){
            $usuario->descUsuario = $_REQUEST['nombre'];
            if(UserDAO::update($usuario)){
                $sms = "Se ha cambiado el nombre correctamente";
                $_SESSION['usuario'] = $usuario;
                $_SESSION['vista'] = VIEW.'verUsuario.php';
            }else{
                $errores['update'] = "No se ha podido modificar el usuario";
            }
        }else{
            $errores['nombre'] = "No puede estar vacio";
        }
    }else if(isset($_REQUEST['guardarContrasena'])){
        $usuario = $_SESSION['usuario'];
        if(!campoVacio('contrasena') && !campoVacio('confirmaContrasena') && 
            passIgual($_REQUEST['contrasena'],$_REQUEST['confirmaContrasena'])){
                $usuario->password = $_REQUEST['contrasena'];
                if(UserDAO::cambiarContrasena($usuario)){
                    $sms = "Se ha cambiado la contraseña correctamente";
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['vista'] = VIEW.'verUsuario.php';
                }else{
                    $errores['update'] = "No se ha podido modificar la contraseña";
                }       
                }
            }
}

?>