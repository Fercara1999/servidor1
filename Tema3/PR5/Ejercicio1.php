<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Fernando Calles</title>
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
</head>
<body>
    <?php  
        include("../../fragmentos/header.html");
    ?>
<b>Escribe un programa que dado un array ordénalo y devuelve otro array sin que haya
elementos repetidos</b><br><br>
    <?php
    $datos = array(2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3);
    $datosOrdenado = array();
    asort($datos);
    echo "El array ordenado quedaría: ";
    foreach ($datos as $key => $value) {
        echo "<br> $key = $value";
    }
    echo "<br><br>El array sin valores repetidos quedaría: ";
    $resultado = array_unique($datos);
    foreach ($resultado as $key => $value) {
        echo "<br> $key = $value";
    }
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
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>