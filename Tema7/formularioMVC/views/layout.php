<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout - Fernando Calles</title>
</head>
<body>
        <div>
            <form action="" method="post"> 
                <input type="submit" name="Home" id="Home" value="Home" class="btn btn-primary">
            </form>
        </div>      
    <?php
        if(!sesionIniciada()){

            $usuarioValue = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : '';
            $contrasenaValue = isset($_COOKIE['contrasena']) ? $_COOKIE['contrasena'] : '';

            echo '<form action="" method="post">';
            echo '<label for="usuario">Usuario: <input type="text" name="usuario" id="usuario" value="' . $usuarioValue . '"></label><br>';
            echo '<label for="contrasena">Contraseña: <input type="password" name="contrasena" id="contrasena" value="' . $contrasenaValue . '"></label><br>';
            echo '<label for="recuerda">Recuérdame <input type="checkbox" name="recuerda" id="recuerda"></label><br>';
            echo '<input type="submit" name="iniciarSesion" id="iniciarSesion" value="Iniciar sesión">';
            echo '</form>';
        }else{
            echo "Bienvenido ".$_SESSION['usuario']->usuario."";
            echo '<form action="" method="post">';
            echo '<input type="submit" name="cerrarSesion" id="cerrarSesion" value="Cerrar sesión">';
            echo '<input type="submit" name="crearLibro" id="crearLibro" value="Crear libro">';
            if(isAdmin()){
                echo "<input type='submit' name='verLibros' id='verLibros' value='Ver libros'>";
            }
            echo '</form>';
        }

            if(!isset($_SESSION['vista']))
                require VIEW.'home.php';
            else{
                require $_SESSION['vista'];
            }

    ?>

    
</body>
</html>