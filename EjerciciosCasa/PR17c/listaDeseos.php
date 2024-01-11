<?php 
    include("./funciones.php");
    session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="./logo/logoGrande.png" type="image/x-icon">
    <style>
        .imagenSlider{
            height: 400px;
        }
        body{
          padding: 0;
        }
    </style>
</head>
<body>
  <?php
    require("./fragmentos/header.php");
  
    if(isset($_REQUEST['isbn'])){
        insertarCookieDeseos();
        header("Location: ./listaDeseos.php");
    }
    
        verLibrosDeseos();
  ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    <?php
    require("./fragmentos/footer.php");
  ?>
</html>