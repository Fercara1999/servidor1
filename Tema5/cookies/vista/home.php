

<?php
    require("../funciones/funcionesBD.php");
    require("../funciones/funciones.php");
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panaderia</title>
</head>
<body>
    <div class="izq">
        <h1>Productos</h1>
    <table>
        <thead>
            <th>Nombre</th>

            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Ver</th>
        </thead>
        <tbody>
            <?php 
                $array_productos = findAll();
                foreach($array_productos as $prod){
                    echo "<tr>";
                    echo "<td>".$prod['nombre']."</td>";
                    echo "<td>".substr($prod['descripcion'],0,20)."</td>";
                    echo "<td><img src='../".$prod['baja']."'></td>";
                    echo "<td><a href='verProducto.php?id=".$prod['codigo']."'>Ver</a></td>";
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
                // array_reverse($_COOKIE['id']);
                    foreach ($_COOKIE['id'] as $value) {
                        $producto = findById($value);
                        if($producto){
                            echo "<p><a href='verProducto.php?id=".$prod['codigo']."'><img src='../".$producto['alta']."'></a></p>";
                        }
                        // $producto = findById($_COOKIE['id']);
                        // array_push($arrayCookie,$producto);
                        // $visitados = insertarCookie();
                        // if($producto){
                        //     echo "<p><a href='verProducto.php?id=".$prod['codigo']."'><img src='../".$producto['alta']."'></a></p>";
                        // }
                        }
            }else
                echo "No se ha visitado ningún producto ";
        ?>
    </div>
</body>
</html>