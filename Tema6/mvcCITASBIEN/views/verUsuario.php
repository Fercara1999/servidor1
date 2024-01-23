<?php

if(isset($sms)){
    echo $sms;
}
?>

<p>CodUsuario: <?php echo $_SESSION['usuario']->codUsuario ?></p>
<p>descUsuario: <?php echo $_SESSION['usuario']->descUsuario ?></p>
<p>fechaUltimaConexion: <?php echo $_SESSION['usuario']->fechaUltimaConexion ?></p>
<p>perfil: <?php echo $_SESSION['usuario']->perfil ?></p>


<form action="" method="post">
    <input type="submit" name="modificarDatos" id="modificarDatos" value="Modificar datos" class="btn btn-primary">
    <!-- <input type="submit" name="pedirCita" id="pedirCita" value="Pedir cita" class="btn btn-primary"> -->
</form>