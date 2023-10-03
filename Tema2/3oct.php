<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<pre>
    <?php
        
            print_r($_SERVER);
    
    ?>   
    <?php
    echo "<h1>Ambito de las variables</h1>";
        $contador = 5;

        // No puede acceder
        // fuction PruebaVariable(){
        //     echo $contador;
        // }

        // Pasado como parametro
        function PruebaVariable($contador){
            echo $contador;
            $contador++;
            echo $contador;
        }

        echo "¿Que le pasa a contador?";
        PruebaVariable($contador);
        echo $contador;

        function PruebaVariableReferencia(&$contador){
            echo $contador;
            $contador++;
            echo $contador;
        }

        echo "¿Que le pasa a contador?";
        PruebaVariable($contador);
        PruebaVariableReferencia($contador);
        echo $contador;

        echo "<br>";echo "<br>";

        function PruebaVariableGlobal(){
            global $contador;
            echo $contador;
            $contador++;
            echo $contador;
        }

        PruebaVariableGlobal();

        function contador(){
            static $c = 0;
            $c++;
            echo "<br>" .$c;
        }

        contador();
        contador();
        contador();
        contador();

        function contador2(){
            $c = 0;
            $c++;
            echo "<br>" .$c;
        }

        contador2();
        contador2();
        contador2();
        contador2();

        echo "<br>";
        echo "<br>";

        //Definir constantes
        define("USER","Fernando");
        echo USER;
        echo "3-4/oct";

        


    ?>
</pre>
</body>
</html>
