<?php
    require('curl.php');
    require('configurarAPI.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de peliculas</title>
</head>
<body>
    <?php
        $peliculas = get('pelicula');
        $peliculas = json_decode($peliculas,true);

        echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Localidad</th><th>Telefono</th></tr>";
        foreach ($peliculas as $peli) {
            echo "<tr>";
            echo "<td>".$peli['id']."</td>";
            echo "<td>".$peli['titulo']."</td>";
            echo "<td>".$peli['director']."</td>";
            echo "<td>".$peli['genero']."</td>";
            echo "<form method='post' action='eliminar.php'><input type='hidden' name='id' id='id' value='".$peli['id']."'>";
            echo "<td><input type='submit' name='borrar' id='borrar' value='Eliminar'></td>";
            echo "</form></tr>";
        }
        echo "</table>";
    ?>
    <a href="./insertar.php">Insertar</a>
    <a href="./modificar.php">Modificar</a>
</body>
</html>