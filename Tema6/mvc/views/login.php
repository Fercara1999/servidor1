<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label>
        <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'nombre')?>
        </p>
        <label for="contrasena">Contraseña: <input type="password" name="contrasena" id="contrasena"></label>
        <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'contrasena')?>
        </p>
        <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'validado')?>
        </p>
        <input type="submit" name="iniciarSesion" id="iniciarSesion" value="Iniciar Sesión" class="btn btn-primary">
        <input type="submit" name="loginRegistro" id="loginRegistro" value="Registrarme" class="btn btn-primary">
    </form>
</body>
</html>