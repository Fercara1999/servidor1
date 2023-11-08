<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR10b - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./funciones.php");
    ?>

    <?php

    // if(isset($_REQUEST['boton']))
    //     if(pulsaBoton($_REQUEST['boton'])){
    //         exit;
    //     }
            

    ?>
    
    <!-- <form action="" method="get">
        <label for="texto"><input type="text" name="fichero" id="texto"></label><br><br>
        <input type="submit" name="boton" id="leer" value="leer">
        <input type="submit" name="boton" id="escribir" value="escribir">

    </form> -->

    <?php

        if(isset($_GET['editar']))
            header('Location: ./modificar.php');

    ?>

    <?php

        $alumno = array();
        muestraNotas($alumno);

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

        <form action="" method="get">
            <?php
                    // $j =0;
                for($i = 0 ; $i < count($alumno)-1 ; $i++){
                    if($i % 4 == 0 || $i == 0){
                        echo "<tr>";
                    }
                    for ($j = 0 ; $j <= 3 ; $j++){
                        echo "<td>". $alumno[$i][$j] ."</td>";
                    }
                    
                        echo "<td><input type='submit' name='editar' id='editar' value='Editar'></td>";
                        echo "<td><input type='submit' name='eliminar' id='eliminar' value='Eliminar'></td>";
                    
                    echo "</tr>";

                    
                }
                

            ?>
        </form>

    </table>

    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>