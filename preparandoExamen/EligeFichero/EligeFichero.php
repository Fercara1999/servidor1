<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EligeFichero</title>
</head>
<body>

    <?php

        if(isset($_GET['Editar'])){
            $fichero = $_GET['fichero'];
            header("Location: ./EditaFichero.php?fichero=$fichero");
        }

    ?>

    <form action="" method="get">
        <label for="fichero">Nombre del fichero: <input type="text" name="fichero" id="fichero"></label><br>
        <input type="submit" name="Editar" id="Editar" value="Editar">
        <input type="reset" name="Leer" id="Leer" value="Leer">
    </form>
</body>
</html>