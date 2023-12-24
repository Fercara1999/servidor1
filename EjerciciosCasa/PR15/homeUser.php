<?php 

    include("./funciones.php");

    // Iniciamos la sesión para que el navegador la conozca
    session_start();
    // Si no hay un usuario de $_SESSION, significa que no deberiamos estar en esa web
    // por lo que no tenemos permisos para estar ahí y nos manda a login
    if(!isset($_SESSION['usuario'])){
        $_SESSION['error'] = "No tiene permisos para entrar en paginaUser";
        header("Location: ./sesiones.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>HomeUser</title>
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
    <h1>Home User</h1>
    <?php

        verDatos();
        // verLibros();

    ?>
    <br>
    <!-- Nos lleva a la pagina en la que se cierra la sesión -->
    <a href="./logout.php">Cierre de sesión</a>
</body>
</html>