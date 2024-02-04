<?php

$arrayApuestas = ApuestaDAO::getElementByUsuario();

echo '<table border="1"><tr><th>Número 1</th><th>Número 2</th><th>Número 3</th><th>Número 4</th><th>Número 5</th><th>Fecha apuesta</th><th>Editar Apuesta</th></tr>';
foreach ($arrayApuestas as $apuesta) {
    echo "<tr>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='id_apuesta' id='id_apuesta' value='$apuesta->id_apuesta'>";
    echo "<td>$apuesta->numero1</td>";
    echo "<td>$apuesta->numero2</td>";
    echo "<td>$apuesta->numero3</td>";
    echo "<td>$apuesta->numero4</td>";
    echo "<td>$apuesta->numero5</td>";
    echo "<td>$apuesta->fechaApuesta</td>";
    echo "<td><input type='submit' name='modificarApuesta' id='modificarApuesta' value='Editar'></td>";
    echo "</form>";
    echo "</tr>";
}
echo "</table>";

if(isAdmin()){

    $todasApuestas = ApuestaDAO::getApuestaFindAll();

    echo '<table border="1"><tr><th>Número 1</th><th>Número 2</th><th>Número 3</th><th>Número 4</th><th>Número 5</th><th>Fecha apuesta</th><th>Editar Apuesta</th></tr>';
    foreach ($todasApuestas as $apuesta) {
        echo "<tr>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='id_apuesta' id='id_apuesta' value='$apuesta->id_apuesta'>";
        echo "<td>$apuesta->numero1</td>";
        echo "<td>$apuesta->numero2</td>";
        echo "<td>$apuesta->numero3</td>";
        echo "<td>$apuesta->numero4</td>";
        echo "<td>$apuesta->numero5</td>";
        echo "<td>$apuesta->fechaApuesta</td>";
        echo "</form>";
        echo "</tr>";
    }
    echo "</table>";

    echo '<form action="" method="post">';
        echo '<label for="min">Mínimo: <input type="number" name="min" id="min"></label><br>';
        echo '<label for="max">Máximo: <input type="number" name="max" id="max"></label><br>';
        echo '<input type="submit" name="creaResultados" id="creaResultados" value="Crea resultados">';
    echo "</form>";




}

?>