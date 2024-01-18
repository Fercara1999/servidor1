<?php

if(isset($sms)){
    echo $sms;
}

    while($cita = $arrayCitas->fetchObject()){
        echo "<p>id: <?php echo $cita->codUsuario ?></p>";
        echo "<p>especialista: <?php echo $cita->especialista ?></p>";
        echo "<p>motivo: <?php echo $cita->motivo ?></p>";
        echo "<p>fecha: <?php echo $cita->fecha ?></p>";
        
    }
?>
<table>
    <tr>
        <th>ID</th>
        <th>Especialista</th>
        <th>Motivo</th>
        <th>Fecha</th>
    </tr>
</table>


<form action="" method="post">
    <input type="submit" name="modificarDatos" id="modificarDatos" value="Modificar datos" class="btn btn-primary">
    <input type="submit" name="borrarUsuario" id="borrarUsuario" value="Dar de baja" class="btn btn-primary">
</form>