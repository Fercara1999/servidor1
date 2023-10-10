<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     echo "<p>".$_SERVER['PHP_SELF']."</p>";
     echo "<p>".$_SERVER['REMOTE_ADDR']."</p>";
     echo "<p>".$_SERVER['SCRIPT_FILENAME']."</p>";
     $fechaHoy = new DateTime("now");
     echo "<p>".date_format($fechaHoy,'Y-m-d H:m:s')."</p>";
     $fechaHoy = new DateTimeZone('Europe/Madrid');
     echo date("l/m H:i:s e")."<br>";
     echo date("D/m H:i:s e")."<br>";
     $fechaCumple = new DateTime("1999-11-27");
     echo date_format($fechaCumple,"d/m/Y")."<br>";
     $fechaHoy = date_create("now");
     date_add($fechaHoy,date_interval_create_from_date_string('60 days'));
     echo date_format($fechaHoy,"d/m/Y");
    //  echo "<br><br><br>Ejercicio 3<br>";

    //  echo "<a href=./resumentema2casa.php?ano=1999&mes=11&dia=27> Enlace </a><br>";
    //  $ano = $_GET['ano'];
    //  $mes = $_GET['mes'];
    //  $dia = $_GET['dia'];

    //  $fechavariable = new DateTime($dia."-".$mes."-".$ano);
    //  echo date_format($fechavariable,"d/m/Y");
     echo "<br><br><br>Ejercicio 4<br>";
     echo "<a href=./resumentema2casa.php?ano1=1999&mes1=11&dia1=27&ano2=1999&mes2=12&dia2=15>Enlace Ejercicio 4</a><br>";
     $ano1= $_GET['ano1'];
     $mes1= $_GET['mes1'];
     $dia1= $_GET['dia1'];

     $ano2= $_GET['ano2'];
     $mes2= $_GET['mes2'];
     $dia2= $_GET['dia2'];

     $fecha1 = date_create($ano1.'/'.$mes1.'/'.$dia1);
     $fecha2 = date_create($ano2.'/'.$mes2.'/'.$dia2);

     $intervalo = date_diff($fecha1,$fecha2);

     echo $intervalo->format('%R%a dias');

    ?>
</body>
</html>