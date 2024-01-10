

<?php
    require("../funciones/funcionesBD.php");
    require("../funciones/funciones.php");
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
</head>
<body>
    <div class="izq">
        <h1>Productos</h1>
    <table>
        <thead>
            <th>Nombre</th>

            <th>Categoría</th>
            <th>Precio</th>
            <th>Ver</th>
        </thead>
        <tbody>
            <?php 
                $array_productos = findAll();
                foreach($array_productos as $prod){
                    echo "<tr>";
                    echo "<td>".$prod['nombre']."</td>";
                    echo "<td>".$prod['categoria']."</td>";
                    echo "<td>".$prod['precio']."</td>";
                    echo "<td><a href='verProducto.php?id=".$prod['id']."'>Ver</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
    <div class='der'>
        <h1>Ultimos visitados</h1>
        <?php
            if(!empty($_COOKIE)){
                $cookies = array_reverse($_COOKIE['id']);
                    foreach ($cookies as $value) {
                        $producto = findById($value);
                        if($producto){
                            echo "<p><a href='verProducto.php?id=".$producto['id']."'>".$producto['nombre']."</a></p>";
                        }
                    }
            }else
                echo "No se ha visitado ningún producto ";
        ?>
    </div>
</body>
</html>