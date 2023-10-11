<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $valor = 3.67;
        echo $valor;
        $pagado = 10;
        echo $pagado."<br>";
        // $dif = $pagado - $valor;
        $dif =  7.50;
        $nMonedas = 0;
        echo $dif;
        while($dif >= 0.00){

            if($dif >= 2){
                $nMonedas++;
                $dif -= 2;
            }elseif($dif >= 1 && $dif <= 1.99){
                $nMonedas++;
                $dif -= 1;
            }elseif($dif >= 0.50 && $dif <= 0.99){
                $nMonedas++;
                $dif -= 0.50;
            }else{
                echo "El numero de monedas es " .$nMonedas;
                break;
            }

        }

        echo "<br>=============5<br>";

        $ano = 2024;

        if ($ano % 4 == 0 && $ano % 100 != 0 || $ano % 400 == 0){
            echo "Es bisiesto";
        }else{
            echo "NO es bisiesto";
        }

        
    ?>
</body>
</html>