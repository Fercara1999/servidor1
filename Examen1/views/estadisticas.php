<?php

// Cargamos el array de estadísticas
$arrayEstadisticas = EstadisticaDAO::findAll();

?>

<table border='1' class='table table-hover p-5'>
    <tr>
        <th>ID Estadistica</th>
        <th>ID Usuario</th>
        <th>ID Palabra</th>
        <th>Resultasdo</th>
        <th>Intentos</th>
        <th>Fecha</th>
    </tr>
    <?php
    foreach ($arrayEstadisticas as $estadistica) {
        // Mostramos los datos de las estadisticas
        echo "<tr>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='idestadistica' id='idestadistica' value='$estadistica->id_estadistica' class='btn btn-primary'>";
        echo "<td>". $estadistica->id_estadistica."</td>";
        echo "<td>". $estadistica->id_usuario."</td>";
        echo "<td>".$estadistica->id_palabra."</td>";
        echo "<td>".$estadistica->resultado."</td>";
        echo "<td>".$estadistica->intentos."</td>";
        echo "<td>".$estadistica->fecha."</td>";
    }
    ?>
</table>