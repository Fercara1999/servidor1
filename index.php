<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servidor - Fernando Calles</title>
    <link rel="stylesheet" href="./css/estilos.css" type="text/css">
</head>
<body>
    <?php
        include("./fragmentos/header.html");
    ?>
    <h2>- <a href="Tema1/index.php">Tema 1</a></h2><br>
    <h2>- <a href="Tema2/index.php">Tema 2</a></h2><br>
    <h2>- <a href="Tema3/index.php">Tema 3</a></h2><br>
    <h2>- <a href="Tema4/index.php">Tema 4</a></h2><br>
    <h2>- <a href="Tema5/index.php">Tema 5</a></h2><br>
    <?php
        include("./fragmentos/footer.php");

        // echo "<a href='http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?fichero=".$_SERVER['SCRIPT_FILENAME']."'>Para ver el codigo</a>";
    ?>
</body>
</html>