<?php
    require("./funciones/funcionesBD.php");
    require("./funciones/funciones.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Compras - Fernando Calles</title>
</head>
<body>
    <table>
        <tr>
            <th>ID_producto</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <?php
            $arrayProductos = findAll();

            foreach ($arrayProductos as $producto) {
                echo "<tr>";
                echo "<td>".$producto['nombre']."</td>";
                echo "<td>".$producto['precio']."</td>";
                echo "<td><a href='verProducto.php?id=".$producto['id_producto']."'>Ver producto</a></td>";
                echo "</tr>";
            }
        ?>
    </table>

    <h1>Lista visitados</h1>
    <?php
    if(!empty($_COOKIE)){
        // array_reverse($_COOKIE['id']);
            foreach ($_COOKIE['id'] as $value) {
                $producto = findById($value);
                if($producto){
                    echo "<p><a href='verProducto.php?id=".$producto['id_producto']."'>".$producto['nombre']."</a></p>";
                }
                }
    }else
        echo "No se ha visitado ningún producto ";
    ?>
</body>
</html>