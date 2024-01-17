<form action="" method="post">
    <label for="nombre">Contrasena: <input type="password" name="contrasena" id="contrasena" readonly></label><br>
    <label for="nombre">Confirma contraseña: <input type="confirmaContrasena" name="confirmaContrasena" id="confirmaContrasena"></label><br>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'igual')?>
    </p>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'update')?>
    </p>
    <input type="submit" name="guardarContrasena" id="guardarContrasena" value="guardarContrasena" class="btn btn-primary">
</form>