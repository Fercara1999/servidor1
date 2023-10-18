<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>

<b><p>2. Haz una función que genere números aleatorios que se le pase como parámetros:</p>
<p>a. Array para lo rellene con los números</p>
<p>b. Número mínimo incluido</p>
<p>c. Número máximo incluido</p>
<p>d. Número de números generados</p>
<p>e. True si puedes repetirse/ False si no pueden repetirse</p></b>

    <?php
        function numerosAleatorios($arrayNumeros,$min,$max,$nGenerados,$boolRepite){
            $arrayNumeros = array();

            for($i = 0 ; $i < $nGenerados ; $i++){
                $n = rand($min,$max);
                if($boolRepite){
                    array_push($arrayNumeros,$n);
                    echo $n."<br>";
                }else{
                    if(in_array($n,$arrayNumeros)){
                        // echo "Ya esta el " .$n."<br>";
                        $i--;
                    }else{
                        array_push($arrayNumeros,$n);
                        echo $n."<br>";
                    }
                }
            }

        }
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>