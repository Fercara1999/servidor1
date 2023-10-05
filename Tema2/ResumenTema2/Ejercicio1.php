<!DOCTYPE html>
<html lang="en">
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
        // a. Muestra el nombre del fichero que se está ejecutando.
        $nombreArchivo = $_SERVER['PHP_SELF'];
        echo "<p>".$nombreArchivo."</p>";
        // b. Muestra la dirección IP del equipos desde el que estás accediendo.
        $direccionIP = $_SERVER['REMOTE_ADDR'];
        echo "<p>".$direccionIP."</p>";
        // c. Muestra el path donde se encuentra elfichero que se está ejecutando.
        $rutaFichero = $_SERVER['DOCUMENT_ROOT'];
        echo "<p>".$rutaFichero."</p>";
        // d. Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18
        echo "<p>".date("Y/m/d H:i:s")."</p>";
        // e. Muestra la fecha  hora actual en Oporto formateada en (dia de la semana, 
        // dia del mes dia del mes de año hh:mm:ss, Zona horaria).
        date_default_timezone_set("Europe/Lisbon");
        echo "<p>".date("D/m H:i:s e")."</p>";
        // f. Inicializa y muestra una variable en el timestamp y en fecha con formato
        // dd/mm/yyyy de tu cumpleaños
        $fechaCumpleaños = new DateTime('1999-11-27');
        echo $fechaCumpleaños -> format('d/m/Y');
        echo "<br>";
        echo "<br>";
        // g. Calcular la fecha y dia de la semana de dentro de 60 dias
        $fechaHoy = new DateTime();
        $fechaHoy -> modify('+ 60 days');
        echo $fechaHoy -> format('l d-m-Y');

    ?>
    <?php
        include("../../fragmentos/footer.html");
        echo "<a href='http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Para ver el codigo</a>";
    ?>
</body>
</html>