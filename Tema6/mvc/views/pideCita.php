<form action="" method="post">
    <label for="especialista">Especialista: <input type="text" name="especialista" id="especialista"></label><br>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'especialista')?>
    </p>
    <label for="motivo">Motivo: <input type="text" name="motivo" id="motivo"></label><br>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'motivo')?>
    </p>
    <label for="fecha">fechaUltimaConexion: <input type="date" name="fecha" id="fecha"></label><br>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'fecha')?>
    </p>
    <input type="submit" name="solicitarCita" id="solicitarCita" value="Solicitar cita" class="btn btn-primary">
</form>