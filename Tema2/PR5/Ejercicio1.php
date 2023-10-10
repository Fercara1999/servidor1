<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR5 - Fernando Calles</title>
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
    $tamanoMatriz = 5;
    

    ?>
</body>
</html>