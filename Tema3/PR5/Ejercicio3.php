<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="./estilos.css"></link>
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>
    <b>Escribe un programa que pida por pantalla el tamaño de una matriz (Ej lado=4). Rellene de
la siguiente manera</b><br><br>

    <?php
    $tamanoMatriz = $_GET['tamano'];
    $matriz = array();

        for($i = 0 ; $i <= $tamanoMatriz ; $i++){
            for($j = 0 ; $j <= $tamanoMatriz ; $j++){
                if ($i == 0 || $j == 0){
                $matriz[$i][$j] = 1;
                }else{
                    $matriz[$i][$j] = $matriz[$i-1][$j] + $matriz[$i][$j-1];
                }
                
            }
        }   

    foreach ($matriz as $fila) {
        echo "<table border='1'><tr>";
        foreach ($fila as $value) {
            echo "<td>".$value."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    $tabla = array();

    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>