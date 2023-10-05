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
    <p><a href="./Ejercicio4.php?ano1=1993&mes1=11&dia1=27&ano2=1995&mes2=11&dia2=27"> Enlace </a></p>
   <pre>
   <?php
    
        $ano1 = $_GET['ano1'];
        $mes1 = $_GET['mes1'];
        $dia1 = $_GET['dia1'];
        $fechaParametro1 = new DateTime($ano1."-".$mes1."-".$dia1);
       

        $ano2 = $_GET['ano2'];
        $mes2= $_GET['mes2'];
        $dia2 = $_GET['dia2'];
        $fechaParametro2 =  new DateTime($ano2."-".$mes2."-".$dia2);

        $intervalo = $fechaParametro1->diff($fechaParametro2);
        echo $intervalo -> format('%y anos de diferencia');

    ?>
    </pre>
    <?php
        include("../../fragmentos/footer.html");
    ?>
</body>
</html>