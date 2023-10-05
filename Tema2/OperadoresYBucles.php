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

        // $nlineas = ;
        
        for($nlineas = 4 ; $nlineas >= 0 ; $nlineas--){
            for($espacios = $nlineas -1 ; $espacios >= 0 ; $espacios--){
                echo "-";
            }
            for($asteriscos = 1 ; $asteriscos >= 0 ; $asteriscos+2){
                echo "*";
            }
            
            echo "<br>";
        }

        // for($i = $nlineas*2-1 ; $i >= $nlineas ; $i--){
        //     echo "-";
        //     for($j = $nlineas -2 ; $i >= $nlineas ; $j+2){
        //         echo "*";
        //     }
        
        // }



    ?>
</body>
</html>