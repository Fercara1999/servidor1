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
    // $cadena = $numero;
    echo "El valor de la variable es : " .$_GET['numero'];
    echo "<br>";
    echo "El tipo de la variable es: " .gettype($_GET['numero']);
    echo "<br>";
    echo "La variable es o no numerica: " .is_numeric($_GET['numero']);
    echo "<br>";
    echo "La variable es un numero entero: " .is_int($_GET['numero']);
    echo "<br>";
    echo "La variable es un numero float: " .is_float($_GET['numero']);
        
    ?>
    <?php
        include("../../fragmentos/footer.html");
        echo "<a href='http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Para ver el codigo</a>";
    ?>
</body>
</html>