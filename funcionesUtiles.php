<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Función para escribir un br
    function br(){
        echo "<br>";
    }

// Funcion para escribir un texto entre h1
    function h1($cadena){
        echo "<h1>".$cadena."</h1>";
    }

// Función que mete un texto entre un parrafo
    function p($cadena){
        echo "<p>".$cadena."</p>";
    }

// Función que indica cual es el archivo que se está ejecutando
    function self(){
        echo $_SERVER['PHP_SELF'];
    }

// Función que calcula la letra del DNI con unos números dados
    function letraDNI($numeros){
        $arrayLetras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
        $posicionMiLetra = $numeros % count($arrayLetras);
        echo "La letra de tu DNI es " .$arrayLetras[$posicionMiLetra];
    }

// Función que calcula numeros aleatorios segun unos parametros dados
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
</body>
</html>