<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        
        <label for="codUsuario">codUsuario: <input type="text" name="codUsuario" id="codUsuario"></label>
        <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'codUsuario')?>
        </p>
        <label for="descUsuario">descUsuario: <input type="text" name="descUsuario" id="descUsuario"></label>
        <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'descUsuario')?>
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
        <input type="submit" name="finalizarRegistro" id="finalizarRegistro" value="Finalizar Registro" class="btn btn-primary">
    </form>
</body>
</html>