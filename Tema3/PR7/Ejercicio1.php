<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>

    <p><b>1. Crea tu propio fichero de php que tenga las funciones de:</p>
<p>a. br() Pinta un br</p>
<p>b. h1( cadena ) Pinta la cadena entre dos h1</p>
<p>c. p(cadena) Pinta la cadena entre etiqueta p</p>
<p>d. self() Devuelve el fichero actual</p>
<p>e. letraDni() Se introduce el dni y devuelve la letra que le corresponde</p>
<p>f. Realiza una página que utilice estas funciones</b></p>
    
    <?php

        // Función apartado 1 
            function br(){
                echo "<br>";
            }

        // Función apartado 2
            function h1($cadena){
                echo "<h1>".$cadena."</h1>";
            }

        // Función apartado 3

            function p($cadena){
                echo "<p>".$cadena."</p>";
            }

        // Función apartado 4

            function self(){
                echo $_SERVER['PHP_SELF'];
            }

        // Función apartado 5

            function letraDNI($numeros){
                $arrayLetras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
                $posicionMiLetra = $numeros % count($arrayLetras);
                echo "La letra de tu DNI es " .$arrayLetras[$posicionMiLetra];
            }
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>