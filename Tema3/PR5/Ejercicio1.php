<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR5 - Fernando Calles</title>
    <link rel="stylesheet" href="./estilos.css" type="text/css">
</head>
<body>
    <?php
    $datos = array(2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3);
    $datosOrdenado = array();
    asort($datos);
    foreach ($datos as $key => $value) {
        echo "<br> $key = $value";
    }
    echo "<br>=============2";
    $resultado = array_unique($datos);
    foreach ($resultado as $key => $value) {
        echo "<br> $key = $value";
    }
    echo "<br>=============3<br>";
    // $busca = array_search('3',$resultado);
    // echo $busca;
    // $resultado[$busca] = $busca;
    foreach ($datos as $key => $value) {
        if ($value == '3'){
            $datos[$key] = $key;
        }
    }
    foreach ($datos as $key => $value) {
        echo "<br> $key = $value";
    }
    echo "<br>=============4<br>";
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
    foreach ($matriz as $key => $value) {
        echo "<th>$key</th>";
    }

    foreach ($matriz as $key => $value) {
        echo "<tr>";
            echo "<td>$key</td>";
            foreach ($value as $resultado) {
                echo "<td>$resultado</td>";
            }
        echo "</tr>";    
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
    for($i = 1 ;$i <= 10 ; $i++){
        $tabla[$i] = array();
        for($j=1 ; $j <= 10 ; $j++){
            $tabla[$i][$j] = $i*$j;
        }
    }

    print_r($tabla);

    ?>
</body>
</html>