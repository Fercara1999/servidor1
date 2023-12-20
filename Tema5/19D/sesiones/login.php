<?php 

session_start();

require("./funciones/validaciones.php");
require("./funciones/conexionBD.php");


if(enviado() && !textoVacio('user') && !textoVacio('pass')){
    $usuario = validaUsuario($_REQUEST['user'],$_REQUEST['pass']);
    // Si entramos, nos lleva a la página del usuario
    if($usuario){
        // Indicamos en la superglobal $_SESSION el usuario con el que estamos
        $_SESSION['usuario'] = $usuario;
        header("Location: ./homeUser.php");
    }
    else{
        echo "No existe el usuario o contraseña";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Fernando Calles</title>
    </head>
    <body>
        <?php
            // Si tenemos un mensaje de error, lo muestra
            if(isset($_SESSION['error']))
                echo $_SESSION['error'];
        ?>
    <h1>Login</h1>
    <form action="" method="post">
        <label for="user">Nombre: </label>
        <input type="text" name="user" id="user">

        <label for="pass">Contraseña: </label>
        <input type="password" name="pass" id="pass">

        <input type="submit" name="Entrar" value="Entrar">
    </form>
</body>
</html>