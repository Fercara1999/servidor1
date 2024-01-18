<form action="" method="post">
    <label for="contrasena">Contrasena: <input type="password" name="contrasena" id="contrasena"></label><br>
    <label for="confirmaContrasena">Confirma contraseña: <input type="password" name="confirmaContrasena" id="confirmaContrasena"></label><br>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'igual')?>
    </p>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'update')?>
    </p>
    <input type="submit" name="guardarContrasena" id="guardarContrasena" value="Guardar contraseña" class="btn btn-primary">
</form>