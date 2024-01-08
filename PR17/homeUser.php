<?php 

    include("./funciones.php");

    session_start();

    if(!isset($_SESSION['usuario'])){
        $_SESSION['error'] = "No tienes la sesión iniciada";
        header("Location: ./sesiones.php");
        exit;
    }else if($_SESSION['usuario']['rol'] == 'administrador' || $_SESSION['usuario']['rol'] == 'moderador'){
        $_SESSION['error'] = "No tiene permisos para entrar en la página de usuario común";
        header("Location: ./index.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo $_SESSION['usuario']['usuario']?></title>
    <?php
        require("./fragmentos/header.php");
    ?>
    <style>
        html{
            padding: 20px
        }
    </style>
</head>
<body>
        <?php
        if(isset($_REQUEST['actualizar'])){
            actualizarDatos();
        }
        if(isset($_REQUEST['actualizarContrasena'])){
            validaCambioContrasena();
        }
        ?>
        
    <?php
        if(isset($_REQUEST['modificar'])){
            verDatos();
            echo '<input type="submit" class="btn btn-primary" id="actualizar" value="Actualizar datos" name="actualizar">';
            echo "</form><br>";
        }else{
            echo '<form action="" method="post">';
            echo '<input type="submit" class="btn btn-primary me-3" id="modificar" value="Modificar datos" name="modificar">';
            echo "</form>";
        }

        if(isset($_REQUEST['modificarContrasena'])){
            verCambioContrasena();
            echo '<input type="submit" class="btn btn-primary" id="actualizarContrasena" value="Actualizar contraseña" name="actualizarContrasena">';
            echo "</form>";
        }else{
            echo '<form action="" method="post">';
            echo '<input type="submit" class="btn btn-primary" id="modificarContrasena" value="Modificar contraseña" name="modificarContrasena">';
            echo "</form>";
        }

        misPedidos();

    ?>
    <br><br>
    <?php
    require("./fragmentos/footer.php");
  ?>
</body>
</html>