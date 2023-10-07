<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>
    
    <?php

    $variable = $_GET['numero'];
    echo "<p><b>Crea una página a la que se le pase por url una variable con el nombre que quieras y
    muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float. (No
    hace falta usar if).</b></p>";
    echo "El valor de la variable es : " .$variable;
    echo "<br>";
    echo "El tipo de la variable es: " .gettype($variable);
    echo "<br>";
    echo "La variable es o no numerica (1 si es que si y 0 si es que no): " .is_numeric($variable);
    echo "<br>";
    // Con is_int y is_float, no devuelve nada, ya que reconoce la cadena como un string

    // echo "La variable es un numero entero: " .is_int($variable);
    // echo "<br>";
    // echo "La variable es un numero float: " .is_float($variable);

    // Entonces vamos a convertirla a un int sumandole 1. El echo incluye un operador ternario en el que primer compara con is_numeric
    // si se trata de un numero o si no, si es que no,  muestra un mensaje de que no es un numero, si es que si hace un is_int
    // sumandole "1" al contenido de la variables para convertirlo a entero en caso de que lo sea, ahora si que nos devolverá
    // si se trata de un número de tipo "int" o un número de tipo "float"
    echo (is_numeric($variable) ? (is_int($variable+1) ? "Es un numero entero" : "No es un numero entero") : "No es un numero");
        
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>