<?php 

    include("./funciones/conexionBD.php");

    // Iniciamos la sesión para que el navegador la conozca
    session_start();
    // Si no hay un usuario de $_SESSION, significa que no deberiamos estar en esa web
    // por lo que no tenemos permisos para estar ahí y nos manda a login
    if(!isset($_SESSION['usuario'])){
        $_SESSION['error'] = "No tiene permisos para entrar en la pagina";
        header("Location: ./login.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeUser</title>
</head>
<body>
    <h1>Home User</h1>
    <?php
        // Mensaje de bienvenida al nombre del usuario
        echo "Bienvenido ".$_SESSION['usuario']['nombre']."<br>";
        compruebaPaginas($_SESSION['usuario']['usuario']);

        if(isset($_SESSION['error']))
            echo $_SESSION['error'];

        $paginas = misPaginas();
        foreach($paginas as $value){
            echo "<br><a href='./".$value."'>".$value."</a>";
        }
    ?>
    <br>
    <!-- Nos lleva a la pagina en la que se cierra la sesión -->
    <a href="./logout.php">Cierre de sesión</a>
</body>
</html>