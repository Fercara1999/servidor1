<form action="" method="post">
    <label for="codUsuario">codUsuario: <input type="text" name="codUsuario" id="codUsuario" value="<?php echo $_SESSION['usuario']->codUsuario ?>" readonly></label><br>
    <label for="descUsuario">descUsuario: <input type="text" name="descUsuario" id="descUsuario"  value="<?php echo $_SESSION['usuario']->descUsuario ?>"></label><br>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'nombre')?>
    </p>
    <label for="fechaUltimaConexion">fechaUltimaConexion: <input type="text" name="fechaUltimaConexion" id="fechaUltimaConexion" value="<?php echo $_SESSION['usuario']->fechaUltimaConexion ?>" readonly></label><br>
    <label for="perfil">perfil: <input type="text" name="perfil" id="perfil" value="<?php echo $_SESSION['usuario']->perfil ?>" readonly></label><br>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'update')?>
    </p>
    <input type="submit" name="guardarCambios" id="guardarCambios" value="Guardar cambios" class="btn btn-primary">
    <input type="submit" name="cambiarContrasena" id="cambiarContrasena" value="Cambiar contrasena" class="btn btn-primary">
</form>