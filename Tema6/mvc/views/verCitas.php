<?php

if(isset($sms)){
    echo $sms;
}

// $arrayCitas = CitaDAO::buscarPorPaciente($_SESSION['usuario']);

if(isset($_REQUEST['verCitasAnteriores'])){
    $_SESSION['controller'] = CON."citaController.php";
}

?>
<table border='1' class='table table-hover p-5'>
    <tr>
        <th>Especialista</th>
        <th>Motivo</th>
        <th>Fecha</th>
        <?php
        if(isAdmin() && isset($_REQUEST['verTodasCitas'])){
            echo "<th>Paciente</th>";
        }
        ?>
        <th>Ver cita</th>
        <th>Editar</th>
        <th>Cancelar</th>
    </tr>
    <?php
        foreach ($arrayCitas as $cita) {
            echo "<tr>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='idCita' id='idCita' value='$cita->id' class='btn btn-primary'>";
            echo "<td>". $cita->especialista."</td>";
            echo "<td>". $cita->motivo."</td>";
            echo "<td>".$cita->fecha."</td>";
            if(isAdmin() && isset($_REQUEST['verTodasCitas'])){
                echo "<td>".$cita->paciente."</td>";
            }
            echo "<td><input type='submit' name='verCita' id='verCita' value='Ver cita' class='btn btn-primary'></td>";
            echo "<td><input type='submit' name='editarCita' id='editarCita' value='Editar cita' class='btn btn-primary'></td>";
            echo "<td><input type='submit' name='cancelarCita' id='cancelarCita' value='Cancelar cita' class='btn btn-primary'></td>";
        }
    ?>
</table>

<form action="" method="post">
    <input type="submit" name="verAnterior" id="verAnterior" value="Ver citas anteriores" class="btn btn-primary">
</form>

<form action="" method="post">
    <input type="submit" name="modificarDatos" id="modificarDatos" value="Modificar datos" class="btn btn-primary">
    <input type="submit" name="borrarUsuario" id="borrarUsuario" value="Dar de baja" class="btn btn-primary">
</form>