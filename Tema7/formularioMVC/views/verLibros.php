<?php

$arrayLibros = LibroDAO::findAll();

?>

<table border="1">
    <tr>
        <th>ISBN</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Editorial</th>
        <th>Fecha de nacimiento</th>
        <th>Numero de páginas</th>
    </tr>
    <?php
        foreach ($arrayLibros as $libro) {
            echo "<tr>";
            echo "<td>".$libro['isbn']."</td>";
            echo "<td>".$libro['titulo']."</td>";
            echo "<td>".$libro['autor']."</td>";
            echo "<td>".$libro['editorial']."</td>";
            echo "<td>".$libro['fechaLanzamiento']."</td>";
            echo "<td>".$libro['numeroPaginas']."</td>";
        }
    ?>
</table>