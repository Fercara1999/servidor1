<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<h1> String to fecha </h1>";
        $cumpleFernando =  strtotime("11/27/1999");
        echo $cumpleFernando;

        echo "<p>".date($cumpleFernando)."</p>";
        $hoy = strtotime("now");
        echo "<p>".date("d/m/y",$cumpleFernando)."<p>";
        echo "<br>";
        echo $hoy;
        echo "<br>";
        $tiempoRestado = $hoy - $cumpleFernando;
        $segundoAnho = 60*60*24*365;
        echo $segundoAnho;
        $anhos = $tiempoRestado/$segundoAnho;
        echo "<br>";
        echo $anhos;
        echo "<br>";
        echo "<p>".date("d/m/y",$tiempoRestado)."</p>";
        echo "<br>";
        echo "<br>";

        echo "<br>";
        echo "<br>";

        $cumpleFernando = new DateTime('1999-11-27');
        $hoy = new DateTime();
        $intervalo = $cumpleFernando->diff($hoy);
        echo "<pre>";
        print_r($intervalo);
        echo "</pre>";
        echo "<pre>";
        print_r(getdate());
        echo "</pre>";

        // MKTIME




    ?>
</body>
</html>