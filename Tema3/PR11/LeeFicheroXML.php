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

        if(isset($_GET['Añadir']))
            header("Location: ./anadeAlumno.php");

        if(isset($_GET['Eliminar'])){
            eliminaAlumnoXML();
            // header("Location: ./LeeFicheroXML.php");
        }

            
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
        $i = 1;
        $dom = new DOMDocument();
        $dom -> load('notas.xml');
        foreach ($dom->childNodes as $alumnos) {
            foreach($alumnos->childNodes as $alumno){
                if($alumno->nodeType == 1){
                    echo "<tr>";
                    $nodo = $alumno->firstChild;
                    echo "<form action='' method='get'>";
                    do{
                        if($nodo->nodeType == 1){
                            echo "<td><label for='dato$i'><input type='text' name='dato$i' value='".$nodo->nodeValue."' readonly></td>";
                            $i++;
                        }
                    }while($nodo = $nodo -> nextSibling);
                    $i = 1;
                    echo "<td><input type='submit' value='Editar'></td>";
                    echo "<td><label for='Eliminar'><input type='submit' value='Eliminar' name='Eliminar'></label></td></form>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
        echo "<form action='./anadeAlumno.php' method='get'><input type='submit' value='Añadir' name='Añadir'></form>";

    ?>

    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>

</html>