<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase 3-O</title>
</head>
<body>
    <pre>
    <?php
    print_r($_SERVER);
        // $fueraFuncion = 5;
        
        // function funcion(){
        //     $dentroFuncion = $fueraFuncion;
        //     echo $dentroFuncion;
        // }

        // funcion();

        $contador = 1;

        function contadoraEstatica($contador){
            static $contador = 5;
            $contador ++;
            echo $contador;
        }

        function contadora($contador){
            $contador = 5;
            $contador ++;
            echo $contador;
        }

        contadora($contador);
        contadora($contador);
        contadora($contador);
        echo "<br>";
        contadoraEstatica($contador);
        contadoraEstatica($contador);
        contadoraEstatica($contador);
        contadoraEstatica($contador);
        echo "<br>";
        contadora($contador);
        contadora($contador);
        contadora($contador);
        echo "<br>";
        echo "<br>";

        function contadoraReferencia(&$contador){
            echo $contador;
            $contador++;
            echo $contador;
        }

        contadoraReferencia($contador);
        contadoraReferencia($contador);
        contadoraReferencia($contador);
        echo "<br>";
        echo $contador;
        echo $contador;

        function contadoraGlobal(){
            global $contador;
            echo $contador;
            $contador++;
            echo $contador;
        }
        echo "<br>";
        contadoraGlobal();
        contadoraGlobal();
        echo "<br>";
        echo "<br>";

        contadoraGlobal();

        echo "<br>";
        echo "<br>";

        define("USUARIO","Fernando");

        echo USUARIO;

        echo "<br>";
        echo "<br>";

        //FECHAS

        echo time();
        echo date_default_timezone_get();
        echo "<br>";
        echo "<br>";
        echo date("r");
        echo date("d/F/y H:i:s");
        echo "<br>";
        echo "<br>";
    ?>
    </pre>
</body>
</html>
