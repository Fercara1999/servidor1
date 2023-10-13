<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Fernando Calles</title>
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>
    <p><b>Realiza un programa que le introduzca un valor (pasado por la URL) de un producto con 2 decimales
y posteriormente un valor con el que pagar por encima (Valor del producto 6.33€ y ha pagado con
10€). Muestra el número mínimo de monedas con las que puedes devolver el cambio</b></p>
    <?php
        $valor = $_GET['valor'];
        $pagado = $_GET['pagado'];
        $dif =  $pagado - $valor;
        $nMonedas = 0;
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
            }elseif($dif >= 0.20 && $dif <= 0.49){
                $nMonedas++;
                $dif -= 0.20;
            }elseif($dif >= 0.10 && $dif <= 0.19){
                $nMonedas++;
                $dif -= 0.10;
            }elseif($dif >= 0.05 && $dif <= 0.09){
                $nMonedas++;
                $dif -= 0.05;
            }elseif($dif >= 0.02 && $dif <= 0.04){
                $nMonedas++;
                $dif -= 0.02;
            }elseif($dif > 0.00 && $dif <= 0.01){
                $nMonedas++;
                $dif -= 0.01;
            }

        }

        echo "El numero de monedas es " .$nMonedas;

    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>