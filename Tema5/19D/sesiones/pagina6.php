<?php 

    include("./funciones/conexionBD.php");

    session_start();
    sesionIniciada();
    permisoPagina(basename($_SERVER['PHP_SELF']));

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 6</title>
</head>
<body>
    <h1>Página 6</h1>

    <?php
        if(isset($_SESSION['error']))
            echo $_SESSION['error'];
    ?>

    <a href="./logout.php">Cierre de sesión</a>
</body>
</html>