<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Fernando Calles</title>
    <link rel="stylesheet" href="./estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>
    <p><b>Realiza un programa utilizando bucles que muestre la siguiente figura teniendo en cuenta el
numero de filas que pase el usuario por la URL </b></p>
    <?php
    $nLineas = $_GET['tamanorombo'];

    for($i = 1 ; $i <= $nLineas ; $i++){
        for($espacios = $nLineas*2-1 ; $espacios >= $i*2-1 ; $espacios--){
            echo "&nbsp";
        }
        for($asteriscos = 1 ; $asteriscos <= $i*2-1 ; $asteriscos++){
            if($asteriscos != 1 && $asteriscos != $i*2-1){
                echo "&nbsp&nbsp";
            }else{
                echo "*";
            }
        }
        echo"<br>";
    }

    for($i = $nLineas; $i >= 1 ; $i--){
        for($espacios = 0 ; $espacios <= $nLineas-$i ; $espacios++){
            echo "&nbsp&nbsp";
        }
        for($asteriscos = $i*2-1 ; $asteriscos >= 1 ; $asteriscos--){
            if($asteriscos != 1 && $asteriscos != $i*2-1){
                echo "&nbsp&nbsp";
            }else{
                echo "*";
            }
        }
        echo"<br>";
    }
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>