<?php

    if(!isset($_GET['id'])){
        header("Location: ./home.php");
        exit;
    }
require("../funciones/funcionesBD.php");
require("../funciones/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto</title>
</head>
<body>
    <a href="home.php"><- Volver</a>
    <?php
        $producto = findById($_REQUEST['id']);
        if($producto){
            //Crear cookie
            insertarCookie();
            echo "<h1>".$producto['nombre']."</h1>";
            echo "<p>".$producto['descripcion']."</p>";
            echo "<p><img src='../".$producto['alta']."'></p>";
        }else{
            echo "No existe el producto";
        }
    ?>
</body>
</html>