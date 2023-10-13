<!DOCTYPE html>
<html lang="es">
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
   <pre>
   <?php
        echo "<p><b>Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos
personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años.</b></p>";
        $ano1 = $_GET['ano1'];
        $mes1 = $_GET['mes1'];
        $dia1 = $_GET['dia1'];
        $fechaParametro1 = new DateTime($ano1."-".$mes1."-".$dia1);
       

        $ano2 = $_GET['ano2'];
        $mes2= $_GET['mes2'];
        $dia2 = $_GET['dia2'];
        $fechaParametro2 =  new DateTime($ano2."-".$mes2."-".$dia2);

        // "%y" nos mostrará los años que hay de diferencia
        $intervalo = $fechaParametro1->diff($fechaParametro2);
        echo "La diferencia entre una y otra fecha es de: ".$intervalo -> format('%y anos de diferencia');

    ?>
    </pre>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>