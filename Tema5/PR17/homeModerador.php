<?php 

    include("./funciones.php");

    session_start();

    if(!isset($_SESSION['usuario'])){
        $_SESSION['error'] = "No tienes la sesión iniciada";
        header("Location: ./sesiones.php");
        exit;
    }else if($_SESSION['usuario']['rol'] != 'moderador'){
        $_SESSION['error'] = "No tiene permisos para entrar en la página del moderador";
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
        html {
            padding: 20px;
        }

        .ancho-caja {
            width: 200px;
            margin-right: 10px;
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
            echo "</form>";
        } else {
            echo '<form action="" method="post">';
            echo '<input type="submit" class="btn btn-primary" id="modificar" value="Modificar datos" name="modificar">';
            echo "</form>";
        }

        if(isset($_REQUEST['modificarContrasena'])){
            verCambioContrasena();
            echo '<input type="submit" class="btn btn-primary" id="actualizarContrasena" value="Actualizar contraseña" name="actualizarContrasena">';
            echo "</form>";
        } else {
            echo '<form action="" method="post">';
            echo '<input type="submit" class="btn btn-primary" id="modificarContrasena" value="Modificar contraseña" name="modificarContrasena">';
            echo "</form>";
        }

        $erroresAlbaran = [];
        
        if(isset($_REQUEST['registrarNuevoAlbaran']) && validaAlbaran($erroresAlbaran)){
            nuevoAlbaran();
        }else if(isset($_REQUEST['registrarNuevoAlbaran'])){
            muestraErroresArray($erroresAlbaran);
        }

        if(isset($_REQUEST['nuevoAlbaran'])){
            echo "<form method='post' class='ancho-caja'>";
            echo "<div class='form-group'>";
            echo "<label for='fechaAlbaran'>Fecha albarán:</label>";
            echo "<input type='date' class='form-control ancho-caja' name='fechaAlbaran' id='fechaAlbaran'>";
            echo muestraErrores($erroresAlbaran,'fechaAlbaran');
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo "<label for='isbn'>ISBN:</label>";
            echo "<input type='text' class='form-control ancho-caja' name='isbn' id='isbn'>";
            echo muestraErrores($erroresAlbaran,'isbn');
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo "<label for='cantidad'>Cantidad:</label>";
            echo "<input type='number' class='form-control ancho-caja' name='cantidad' id='cantidad' min='1'>";
            echo muestraErrores($erroresAlbaran,'cantidad');
            echo "</div>";
            
            echo "<input type='submit' class='btn btn-primary' name='registrarNuevoAlbaran' id='registrarNuevoAlbaran' value='Registrar albarán'>";
            echo "</form>";

        }

        echo '<br><br>';
        echo '<form method="post">';
        echo '<input type="submit" class="btn btn-primary" value="Nuevo albarán" name="nuevoAlbaran" id="nuevoAlbaran">';
        echo "</form>";
        
        misPedidos();
        verAlbaranes();
        verPedidos();
    ?>

    <br><br>
    <?php
    require("./fragmentos/footer.php");
  ?>
</body>
</html>
