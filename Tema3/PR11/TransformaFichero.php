<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>

<body>
    <?php
        include("../../fragmentos/header.html");
        include("./funciones.php");
    ?>

    <?php

    if(guardaXML())
        header("Location: ./LeeFicheroXML.php");
        

    if (isset($_GET['editar']))
        header("Location: ./modificar.php?alumno=" . $_REQUEST['dato0'] . "&nota1=" . $_REQUEST['dato1'] . "&nota2=" . $_REQUEST['dato2'] . "&nota3=" . $_REQUEST['dato3']);

    if (isset($_GET['eliminar'])) 
        header("Location: ./eliminar.php?alumno=" . $_REQUEST['dato0'] . "&nota1=" . $_REQUEST['dato1'] . "&nota2=" . $_REQUEST['dato2'] . "&nota3=" . $_REQUEST['dato3']);
    
    if (isset($_GET['anade']))
        header("Location: ./anadeAlumno.php");

    ?>

    <?php

    $alumno = array();
    $z = muestraNotas($alumno);

    ?>

    <table border="1">
        <tr>
            <th>Alumno</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

        <?php
        for ($i = 0; $i <= $z - 1; $i++) {
            if ($i % 4 == 0 || $i == 0) {
                echo "<tr>";
            }
            echo "<form action='' method='get' name='enviarDatos'>";
            for ($j = 0; $j <= 3; $j++) {
                echo "<td><label for='dato" . $j . "'><input type='text' name='dato" . $j . "' value='" . $alumno[$i][$j] . "'></label></td>";
            }

            echo "<td><center><input type='submit' name='editar' id='editar' value='Editar'></center></td>";
            echo "<td><center><input type='submit' name='eliminar' id='eliminar' value='Eliminar'></center></td>";

            echo "</form></tr>";
        }

        ?>

    </table>
    <br>
    <form action="" method="get">
        <input type='submit' name='anade' id='anade' value='Añadir Alumno'>
    </form>

    <?php
    include("../../fragmentos/footer.php");
    ?>
</body>

</html>