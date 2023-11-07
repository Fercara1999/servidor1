<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "Prueba piramide<br>";

        $nLineas = 20;

        for($i = 1 ; $i <= $nLineas ; $i++){
            for($espacios = $nLineas*2-1 ; $espacios >= $i*2-1 ; $espacios--){
                echo "&nbsp";
            }
            for($asteriscos = 1 ; $asteriscos <= $i*2-1 ; $asteriscos++){
                echo "*";
            }
            echo"<br>";
        }

    echo"<br>";echo"<br>";echo"<br>";
    echo "Prueba Rombo<br>";

        for($i = 1 ; $i <= $nLineas ; $i++){
            for($espacios = $nLineas*2-1 ; $espacios >= $i*2-1 ; $espacios--){
                echo "&nbsp";
            }
            for($asteriscos = 1 ; $asteriscos <= $i*2-1 ; $asteriscos++){
                echo "*";
            }
            echo"<br>";
        }

        for($i = $nLineas; $i >= 1 ; $i--){
            for($espacios = 0 ; $espacios <= $nLineas-$i ; $espacios++){
                echo "&nbsp&nbsp";
            }
            for($asteriscos = $i*2-1 ; $asteriscos >= 1 ; $asteriscos--){
                echo "*";
            }
            echo"<br>";
        }


    echo"<br>";echo"<br>";echo"<br>";
    echo "Prueba Rombo Hueco<br>";

    $nLineas = 20; // Cambia este valor al número deseado de líneas
    $ancho = $nLineas * 2 - 1;
    
    // Imprime la parte superior del rombo
    for ($i = 1; $i <= $nLineas; $i++) {
        $espacios = $ancho - (2 * $i - 1);
        $asteriscos = 2 * $i - 1;
    
        echo str_repeat("&nbsp;", $espacios / 2);
        echo str_repeat("*", $asteriscos);
        echo str_repeat("&nbsp;", $espacios / 2);
        echo "<br>";
    }
    
    // Imprime la parte inferior del rombo
    for ($i = $nLineas - 1; $i >= 1; $i--) {
        $espacios = $ancho - (2 * $i - 1);
        $asteriscos = 2 * $i - 1;
    
        echo str_repeat("&nbsp;", $espacios / 2);
        echo str_repeat("*", $asteriscos);
        echo str_repeat("&nbsp;", $espacios / 2);
        echo "<br>";
    }

    ?>
</body>
</html>