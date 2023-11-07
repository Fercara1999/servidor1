<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Mostrar fecha de hoy
        $fechaHoy = new DateTime("now");
        echo date_format($fechaHoy,'d-m-Y')."<br>";
        // Mostrar el día de la semana de hoy
        echo date_format($fechaHoy,'l')."<br>";
        // Calcular la edad a partir de una fecha de nacimiento
        $fechaCumple = new DateTime("05-08-1967");
        echo date_format($fechaCumple,'d-m-Y')."<br>";
        $intervalo = $fechaCumple->diff($fechaHoy);
        echo $intervalo->format('%Y años')."<br>";
        // Sumar dias a una fecha
        date_add($fechaHoy,date_interval_create_from_date_string("49 days"));
        echo date_format($fechaHoy,'d-m-Y')."<br>";
        // Restar dias a una fecha
        date_sub($fechaCumple,date_interval_create_from_date_string("1 month"));
        echo date_format($fechaCumple,'d-m-Y');
        // Calcular la fecha en un formato personalizado
        echo date_format($fechaCumple, 'd/m/Y l F t')


    ?>
</body>
</html>