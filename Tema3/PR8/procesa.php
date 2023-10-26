<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesado</title>
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
</head>
<body>
    
<?php

include("../../fragmentos/header.html");
include("./validaciones.php");

    if(!(textoVacio('alfabetico')))
        echo "El valor del campo alfabetico es: " . $_REQUEST['alfabetico'];

    if(!(textoVacio('opalfabetico')))
        echo "<br>El valor del campo alfabetico opcional es: " . $_REQUEST['opalfabetico'];

    if(!(textoVacio('alfanumerico')))
        echo "<br>El valor del campo alfanumérico es: " . $_REQUEST['alfanumerico'];

    if(!(textoVacio('opalfanumerico')))
        echo "<br>El valor del campo opcional alfanumérico es: " . $_REQUEST['opalfanumerico'];
    
    if(!(textoVacio('numerico')))
        echo "<br>El valor del campo numerico es: " . $_REQUEST['numerico'];

    if(!(textoVacio('opnumerico')))
        echo "<br>El valor del campo opcional numerico es: " . $_REQUEST['opnumerico'];

    if(!(textoVacio('fecha')))
        echo "<br>El valor del fecha numerico es: " . $_REQUEST['fecha'];

    if(!(textoVacio('opfecha')))
        echo "<br>El valor del campo opcional fecha es: " . $_REQUEST['opfecha'];

    if(!(radioVacio('opcion')))
        echo "<br>El valor seleccionado en el capo radio es: " . $_REQUEST['opcion'];
    

    
    
// muestraImagen('archivo');

    include("../../fragmentos/footer.php");
?>
</body>
</html>