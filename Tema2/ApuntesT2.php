<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prácticas Clase Tema 2</title>
</head>
<body>
    <p>
        Echo
    </p>
    <?php
        // Tres maneras diferentes de escribir el mismo contenido
        echo "Hola Mundo";
        echo "<br>Hola Mundo","Junto";
        print ("<br>Hola Mundo con print");

        // Print r para escribir arrays
        // Printf para imprimir una cadena
        // Mejor echo

        // 17,99
        printf ("<br>%s","17,99");
        printf ("<br>%d","17,99");
        printf ("<br>%f","17.99");
        
        print "<br><br>Información de lo que le demos a var_dump<br>";
        var_dump("fernando");
        print "<br>";
        var_dump(3); 
        print "<br>";
        var_dump(3,"fernando",true);
        print "<br>";

        // Declaración de variables
        // var_dump imprime, el resultado de gettype lo puedes recoger
        $mivariable = 6;
        echo "Mi variables es $mivariable";
        print "<br>";
        echo "Mi variable es de tipo " .gettype($mivariable);
        print "<br>";
        $mivariable = 6.5;
        echo "Mi variable es de tipo " .gettype($mivariable);
        
        print "<br>";
        print "<br>";
        print "<br>El raro del booleano<br>";
        $booleano = true;
        echo "Mi variable $booleano es de tipo " .gettype($booleano);
        $booleano = false;
        print "<br>";
        echo "Mi variable $booleano es de tipo " .gettype($booleano);
        print "<br>";
        var_dump($booleano);
        print "<br>";
        print "<br>";
        $micadena = "Hola";
        echo "Mi variable $micadena es de tipo " .gettype($micadena);
        $nulo = null;
        print "<br>";
        echo "Mi variable es $nulo es de tipo " .gettype($nulo);
        print "<br>";
        print "<br>";

        // Heredoc escribe cloques de codigo largos
        $cadena = "se escribe a con comillas \"a\"";
        print "<br>";
        echo $cadena;

        $heredoc = <<< TEXT
        Escribo lo que quiero <p>
        Con comillas "a" </p>
        TEXT;

        echo $heredoc;

        $var = 0x2A;
        echo $var;
        $var = 8.3e-1;
        echo "<br>";
        echo $var;

        echo "<h2>Conversión de tipos </h2>";
        $a = 4;
        $b = 4.5;
        $c = "fernando";
        $d = true;
        $e = null;

        $r = $a + $b;
        echo "Mi variable es $a + $b es $r de tipo " . gettype($r);
        echo "<br>";
        $r = $a.$c;
        echo "Mi variable es $a + $c es $r de tipo " . gettype($r);
        echo "<br>";
        $r = $a + $d;
        echo "Mi variable es $a + $d es $r de tipo " . gettype($r);
        echo "<br>";
        $r = $a + $e;
        echo "Mi variable es $a + $e es $r de tipo " . gettype($r);
        echo "<br>";
        $r = $a.$e;
        echo "Mi variable es $a + $e es $r de tipo " . gettype($r);
        echo "<br>";
        $r = $a+(int)$b;
        echo "Mi variable es $a + $e es $r de tipo " . gettype($r);

        echo "<h1> Variable de variables </h1>";
        echo "<br>";

        $alumno1 = "miguel";
        $alumno2 = "fernando";
        $alumno3 = "giorgi";
        $alumno4 = "raul";

        $elegido =  "alumno".random_int(1,4);

        echo $$elegido;

        echo "<br>";
        echo "<br>";

    ?>

    <a href="mipagina.php?nombre=maria&nombre2=pepe">Pasar nombre</a>
</body>
</html>