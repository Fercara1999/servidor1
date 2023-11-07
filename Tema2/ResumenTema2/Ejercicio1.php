<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Fernando Calles</title>
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>
    <?php
        echo "<p><b>- Crea una página que: </b></p>";
        // a. Muestra el nombre del fichero que se está ejecutando.
        $nombreArchivo = $_SERVER['PHP_SELF'];
        echo "<p><b>· Muestra el nombre del fichero que se está ejecutando: </b>".$nombreArchivo."</p>";
        // b. Muestra la dirección IP del equipos desde el que estás accediendo.
        $direccionIP = $_SERVER['REMOTE_ADDR'];
        echo "<p><b>· Muestra la dirección IP del equipo desde el que estás accediendo: </b>".$direccionIP."</p>";
        // c. Muestra el path donde se encuentra elfichero que se está ejecutando.
        $rutaFichero = $_SERVER['SCRIPT_FILENAME'];
        echo "<p><b>· Muestra el path donde se encuentra el fichero que se está ejecutando: </b>".$rutaFichero."</p>";
        // d. Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18
        // Mustra la hora según la tiene establecida el server UTC0, 2 horas antes que nuestra hora
        echo "<p><b>· Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18: </b>".date("Y/m/d H:i:s")."</p>";
        // Para que nos muestre nuestra hora, debemos cambiar la zona horaria
        date_default_timezone_set("Europe/Madrid");
        echo "· Hora si establecemos nuestra zona horaria ".date("Y/m/d H:i:s");
        // e. Muestra la fecha  hora actual en Oporto formateada en (dia de la semana, 
        // dia del mes dia del mes de año hh:mm:ss, Zona horaria).
        date_default_timezone_set("Europe/Lisbon");
        echo "<p><b>· Muestra la fecha y hora octual en Oporto formateada en (dia de la semana, día de mes de año, hh:mm:ss, Zona Horaria) </b>".date("D/m H:i:s e")."</p>";
        // f. Inicializa y muestra una variable en el timestamp y en fecha con formato
        // dd/mm/yyyy de tu cumpleaños
        $fechaCumpleaños = new DateTime('1999-11-27');
        echo "<p><b>· Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy de tu cumpleaños: </b>".$fechaCumpleaños -> format('d/m/Y')."</p>";
        // g. Calcular la fecha y dia de la semana de dentro de 60 dias
        $fechaHoy = new DateTime();
        $fechaHoy -> modify('+ 60 days');
        echo "<p><b>· Calcular la fecha y el día de la semana de dentro de 60 dias: </b>".$fechaHoy -> format('l d-m-Y')."</p>";

    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>