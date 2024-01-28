<?php

$con = new PDO(DSN,USER,PASSWORD);

    if(isset($_REQUEST['iniciarSesion'])){
        $usuario = UserDAO::validaUsuario($_REQUEST['usuario'],$_REQUEST['contrasena']);
        if($usuario != null)
            $_SESSION['usuario'] = $usuario;
            $_SESSION['vista'] = VIEW.'home.php';
    }else if(isset($_REQUEST['registrar'])){
        $errores = [];
        if(validaRegistro($errores)){
            $usuario = new User(
                "",
                $_REQUEST['usuario'],
                $_REQUEST['contrasena'],
                $_REQUEST['correo'],
                $_REQUEST['fechaNacimiento'],
                "cliente",
                0
            );
    
            if(UserDAO::insert($usuario)){
                $mensaje = "Registro completado con exito";
                $_SESSION['vista'] = VIEW.'home.php';

            }
        }else{
            $errores['insert'] = "No se ha podido insertar el usuario";
        }
    }
?>