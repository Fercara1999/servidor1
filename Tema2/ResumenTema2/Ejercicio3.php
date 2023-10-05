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
    
        $ano = $_GET['ano'];
        $mes = $_GET['mes'];
        $dia = $_GET['dia'];
        $fechaParametro =  strtotime($ano."/".$mes."/".$dia);

        $nombre = date("l",$fechaParametro);
        echo $nombre;

    ?>
    <?php
        include("../../fragmentos/footer.html");
        echo "<a href='http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Para ver el codigo</a>";
    ?>
</body>
</html>