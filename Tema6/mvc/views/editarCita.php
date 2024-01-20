<?php

$cita = citaDAO::findbyId($_REQUEST['idCita']);

?>


<form action="" method="post">
    <input type="hidden" id='idCita' name='idCita' value='<?php echo $cita->id?>'>
    <label for="especialista">Especialista: <input type="text" name="especialista" id="especialista" value="<?php echo $cita->especialista ?>"></label><br>
    <label for="motivo">Motivo: <input type="text" name="motivo" id="motivo"  value="<?php echo $cita->motivo ?>"></label><br>
    <label for="fecha">Fecha: <input type="date" name="fecha" id="date"  value="<?php echo $cita->fecha ?>"></label><br>
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'motivo')?>
    </p>
    <input type="submit" name="guardarCambiosCita" id="guardarCambiosCita" value="Guardar cambios" class="btn btn-primary">
    <p class='text-danger'>
            <?php if(isset($errores))
                muestraError($errores,'update')?>
    </p>
</form>