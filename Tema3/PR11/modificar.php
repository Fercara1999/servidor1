<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./funciones.php");
    ?>

    <?php
        if(isset($_GET['guardar'])){
            modificaXML();
            header("Location: ./LeeFicheroXML.php");
        }
    ?>
    
    <form action="" method="get">
        <label for="dato1">Nombre alumno: <input type="text" name="alumno" id="alumno" value="<?php echo $_GET['dato1'] ?>" readonly></label><br>
        <label for="dato2">Nota 1: <input type="number" name="nota1" id="nota1" value="<?php echo $_GET['dato2'] ?>"min="0" max="10"></label><br>
        <label for="dato3">Nota 2: <input type="number" name="nota2" id="nota2" value="<?php echo $_GET['dato3'] ?>"min="0" max="10"></label><br>
        <label for="dato4">Nota 3: <input type="number" name="nota3" id="nota3" value="<?php echo $_GET['dato4'] ?>"min="0" max="10"></label><br>
        <label for="guardar"><input type="submit" value="Guardar cambios" name="guardar" id="guardar"></label>
    </form>

<?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>