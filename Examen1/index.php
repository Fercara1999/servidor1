<?php

// Requrerimos los archivos necesarios
require("./config/config.php");
// Iniciamos la sesión
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        // Comprobamos que el usuario esté validado, 
        if(validado()){
            // Si pulsa en cerrar sesión, esta se cierra y le redirige al index
            if(isset($_REQUEST['cerrarSesion'])){
                session_destroy();
                header('Location: ./index.php');
            }
        }

        // Si hace clic en iniciarSesion el controlador pasa a ser LoginController
        if(isset($_REQUEST['iniciarSesion'])){
            $_SESSION['controller'] = CON . 'loginController.php';
        // Si pulsa en iniciarPartida el controlador pasa a ser partidaController y se cambia la vista a la de la partida
        }else if(isset($_REQUEST['iniciarPartida'])){
            $_SESSION['controller'] = CON . 'partidaController.php';
            $_SESSION['vista'] = VIEW . 'partida.php';
        // Si hace clic en verEstadisticas,  se cambia la vista a la de las estadisticas
        }else if(isset($_REQUEST['verEstadisticas'])){
            // $_SESSION['controller'] = CON . 'estadisticaController.php';
            $_SESSION['vista'] = VIEW . 'estadisticas.php';
        }else if(isset($_REQUEST['misEstadisticas'])){
            $_SESSION['vista'] = VIEW . 'misEstadisticas.php';
        }

        // Si hay un controlador, lo requerimos
        if(isset($_SESSION['controller']))
            require($_SESSION['controller']);
        // Requerimos la vista del layout
        require("./views/layout.php");
    ?>

<?php
    if(!validado()){
?>
    <!-- Formulario de inicio de sesion, si tiene la cookie con sus datos guardada, estos se añaden en los input type text -->
    <form action="" method="post">
        <label for="usuario">Usuario: <input type="text" name="usuario" id="usuario" value="<?php if(!empty($_COOKIE['usuario'])) 
                                    echo $_COOKIE['usuario']?>"></label><br>
        <label for="contrasena">Contraseña: <input type="password" name="contrasena" id="contrasena" value="<?php if(!empty($_COOKIE['contrasena'])) 
                                    echo $_COOKIE['contrasena']?>"></label><br>
        <label for="recuerdame"><input type="checkbox" name="recuerdame" id="recuerdame">Recuérdame</label><br>
        <input type="submit" name="iniciarSesion" id="iniciarSesion">
    </form>

<?php
    }else{

    }
?>

</body>
</html>