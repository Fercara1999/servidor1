<?php 

    include("./funciones.php");

    session_start();

    if(!isset($_SESSION['usuario'])){
        $_SESSION['error'] = "No tienes la sesión iniciada";
        header("Location: ./sesiones.php");
        exit;
    }else if($_SESSION['usuario']['rol'] != 'administrador' && $_SESSION['usuario']['rol'] != 'moderador'){
        $_SESSION['error'] = "No tiene permisos para entrar en la página del administrador";
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
    <title>Modificando datos</title>
    <?php
        require("./fragmentos/header.php");
    ?>
    <style>
        html {
            padding: 20px;
        }
    </style>
</head>
<body>
    
        <?php
            if(isset($_REQUEST['modificarProducto'])){
                modificarLibro();
            }

            if(isset($_REQUEST['modificarAlbaran'])){
                modificarAlbaran();
            }

            if(isset($_REQUEST['borrarAlbaran'])){
                borraAlbaran();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['modificarPedido'])){
                modificarPedido();
            }

            if(isset($_REQUEST['borrarPedido'])){
                borraPedido();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['borrarProducto'])){
                borraProducto();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['guardarCambiosAlbaran'])){
                guardaCambiosAlbaran();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['guardarCambiosPedido'])){
                guardaCambiosPedido();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['guardarCambiosProducto'])){
                guardaCambiosProducto();
                header("Location: ./homeAdmin.php");
            }

        ?>

    <br><br>
</body>
</html>
