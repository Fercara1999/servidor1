<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css"></link>
</head>
<body>
    <p>
    </p>
    <?php
        include("../../fragmentos/header.html");
    ?>
    <?php

        $idiomaescribir = $_GET['idiomaelegido']; 

        $idiomafr = "Salut Monde";
        $idiomaen = "Hello World";
        $idiomaes = "Hola Mundo";
        $idiomait = "Ciao Mondo";
        $idiomapo = "Olá Mundo";

        $idiomaelegido = "idioma".$idiomaescribir;

        echo "<h2>".$$idiomaelegido."</h2>";

    ?>
    <?php
        include("../../fragmentos/footer.html");
    ?>
</body>
</html>