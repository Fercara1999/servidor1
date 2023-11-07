<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // 1
        $ciudades = array("Zamora","Alava","Valladolid","Madrid","Barcelona");
        foreach ($ciudades as $key => $value) {
            echo "La ciudad $key es $value";
        }

        echo "<br>================<br>";

        sort($ciudades);
        foreach ($ciudades as $key => $value) {
            echo "La ciudad $key es $value <br>";
        }

        // 2
        $numeros = array(1,2,3,4,5,6,2,1,3,5,4,7,8,9,5,4,1,2,3,6,8);
        echo "Hay un total de " .count($numeros). " en el array<br>";
        
        // 3
        echo "La suma de los numeros del array es " .array_sum($numeros)."<br>";
        
        // 4
        echo "El mayor número del array es " .max($numeros);

        // 5
        $numerosUnicos = array_unique($numeros);
        foreach ($numerosUnicos as $key => $value) {
            echo "<br>".$value;
        }

        //6
        $numerosUnicosReves = array_reverse($numerosUnicos);
        foreach ($numerosUnicosReves as $key => $value) {
            echo "<br>".$value;
        }
        echo "<br>";

        //7
        $primero = array(1,2,3);
        $segundo = array(4,5,6);
        $unidos = array_merge_recursive($primero,$segundo);
        foreach ($unidos as $key => $value) {
            echo $value . "<br>";
        }

        //8
        $busca = array_search(4,$unidos);
        echo "El numero 4 se encuentra en la clave " .$busca;

        //9
        $numeros = array(5,4,6,7,9,8,2,3,0,1);
        sort($numeros);
        echo "<br>";
        foreach ($numeros as $key => $value) {
            echo $value;
        }
        echo "<br>";
        rsort($numeros);
        foreach ($numeros as $key => $value) {
            echo $value;
        }

        //10
        function impar($var){
            return $var & 1;
        }

        print_r(array_filter($numeros,"impar"));


    ?>
</body>
</html>