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
        echo "<p><b>Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre
        el día de la semana de dicho día. (Por defecto, dale el valor de 03/10/2023).</b></p>";
        $ano = $_GET['ano'];
        $mes = $_GET['mes'];
        $dia = $_GET['dia'];
        $fechaParametro =  strtotime($ano."/".$mes."/".$dia);
        // 'l' muestra el nombre del dia de la semana
        $nombre = date("l",$fechaParametro);
        echo "El dia de la semana es: ".$nombre;

    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>