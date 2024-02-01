<?php
    require('curl.php');
    require('configurarAPI.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Institutos</title>
</head>
<body>
    <?php
        $institutos = get('institutos');
        $institutos = json_decode($institutos,true);

        if(isset($_REQUEST['borrar'])){
            $uri = $_SERVER['PATH_INFO'];
            $recursos = explode('/',$uri);
            $id = $recursos[1];
            delete("institutos",$id);
        }

        echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Localidad</th><th>Telefono</th></tr>";
        foreach ($institutos as $insti) {
            echo "<tr>";
            echo "<td>".$insti['id']."</td>";
            echo "<td>".$insti['nombre']."</td>";
            echo "<td>".$insti['localidad']."</td>";
            echo "<td>".$insti['telefono']."</td>";
            echo "<form method='post'><input type='hidden' name='id' id='id'"
            echo "<td><input type='submit' name='borrar' id='borrar' value='Eliminar'></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>