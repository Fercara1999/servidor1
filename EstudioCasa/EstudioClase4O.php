<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase 4-O</title>
</head>
<body>
    <pre>
    <?php
    //1
    $fechaActual = date("d/m/Y");
    echo $fechaActual;
    echo "<br>";
    //2. Convertir una cadena de fecha en un objeto DateTime y mostrar la fecha en un formato deseado.
    $fechahoy = strtotime("now");
    echo $fechahoy;
    echo "<br>";
    echo date('d/m/Y', $fechahoy);
    echo "<br>";
    echo "<br>";
    // 3. Calcular la diferencia entre dos fechas:
    // Calcula la diferencia en días, meses o años entre dos fechas.
    $fechaCumpleaños = date("27/11/1999");
    echo $fechaCumpleaños;
    echo "<br>";
    echo $fechaActual;
    echo "<br>";
    echo "<br>";
    $fechaCumpleaños = new DateTime("1999/11/27");
    echo $fechaCumpleaños;
    $intervalo = date_diff($fechaCumpleaños,$fechaActual);
    echo $intervalo->format('%R dias');
    ?>
    </pre>
</body>
</html>
