<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR6 - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    </link>
</head>

<body>
    <?php
    include("../../fragmentos/header.html");
    ?>
    <?php
    $liga =
        array(
            "Zamora" =>  array(
                "Salamanca" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
                )
            ),
            "Salamanca" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
                )
            ),
            "Avila" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
                ),
                "Salamanca" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
                )
            ),
            "Valladolid" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Salamanca" => array(
                    "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "1-1", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
                )
            ),
        );
    ?>
    <b>
        <p>1. Genera un array multidimensional y asociativo donde
        <p>a. los nombres de los equipos locales deben ser índices del array que contiene los
            subarrays con el equipo visitante y a su vez un subarray con:
        <p>
        <p>b. resultado, roja, amarilla y penalti que son índices de los anteriores.</p>
        </p>
        <p>2. El script lo único que debe hacer es mostrar una tabla similar a la de abajo, recogiendo los
            datos del array multidimensional que habéis creado</p>
        <p>3. Genera otra table que sea clasificación.
        <p>a. De tal forma que, por partido ganado se sumará tres puntos y por partido empatado 1.</p>
        <p>b. Goles a favor</p>
        <p>c. Goles en contra
    </b></p>
    </p>
    <?php
    $aux = array();
    echo "<table border = '1'>";
    echo "<tr>";
    echo "<th>Equipos</th>";
    foreach ($liga as $nombreEquipos => $valores) {

        echo "<th>$nombreEquipos</th>";
        array_push($aux, $nombreEquipos);
    }

    echo "</tr>";
    foreach ($liga as $nombreEquipos => $rivales) {

        echo "<tr>";
        echo "<th>$nombreEquipos</th>";

        $i = 0;
        foreach ($rivales as $nombreRival => $partido) {

            if ($aux[$i] == $nombreEquipos) {
                echo "<td></td>";
            }

            echo "<td>";

            foreach ($partido as $key => $contenidoPartido) {

                echo "$contenidoPartido<br>";
            }

            echo "</td>";
            $i++;
        }
        echo "</tr>";
    }

    echo "</table>";
    ?>

    <br><br>

    <?php
    $clasificacion = array();

    foreach ($liga as $nombreLocal => $valoresRivales) {

        foreach ($valoresRivales as $nombresRivales => $partido) {

            $resultado2 = explode("-", $partido["Resultado"]);
            if ($resultado2[0] > $resultado2[1]) {
                if (!isset($clasificacion[$nombreLocal]["Puntos"]))
                    $clasificacion[$nombreLocal]["Puntos"] = 3;
                else
                    $clasificacion[$nombreLocal]["Puntos"] += 3;
            } elseif ($resultado2[0] < $resultado2[1]) {
                if (!isset($clasificacion[$nombresRivales]["Puntos"]))
                    $clasificacion[$nombresRivales]["Puntos"] = 3;
                else
                    $clasificacion[$nombresRivales]["Puntos"] += 3;
            } else {
                if (!isset($clasificacion[$nombreLocal]["Puntos"]))
                    $clasificacion[$nombreLocal]["Puntos"] = 1;
                else
                    $clasificacion[$nombreLocal]["Puntos"] += 1;
                if (!isset($clasificacion[$nombresRivales]["Puntos"]))
                    $clasificacion[$nombresRivales]["Puntos"] = 1;
                else
                    $clasificacion[$nombresRivales]["Puntos"] += 1;
            }
            if (!isset($clasificacion[$nombreLocal]["Goles a favor"]))
                $clasificacion[$nombreLocal]["Goles a favor"] = $resultado2[0];
            else
                $clasificacion[$nombreLocal]["Goles a favor"] += $resultado2[0];
            if (!isset($clasificacion[$nombreLocal]["Goles en contra"]))
                $clasificacion[$nombreLocal]["Goles en contra"] = $resultado2[1];
            else
                $clasificacion[$nombreLocal]["Goles en contra"] += $resultado2[1];
            if (!isset($clasificacion[$nombresRivales]["Goles a favor"]))
            $clasificacion[$nombresRivales]["Goles a favor"] = $resultado2[1];
            else
            $clasificacion[$nombresRivales]["Goles a favor"] += $resultado2[1];
            if (!isset($clasificacion[$nombresRivales]["Goles en contra"]))
            $clasificacion[$nombresRivales]["Goles en contra"] = $resultado2[0];
            else
            $clasificacion[$nombresRivales]["Goles en contra"] += $resultado2[0];
        }
    }
    echo "<table border='1'>";
    echo "<tr><th>Equipos</th><th>Puntos</th><th>Goles a favor</th><th>Goles en contra</th></tr>";
    foreach ($liga as $nombreLocal => $value) {

        echo "<tr>";
        echo "<th>$nombreLocal</th>";
        echo "<td>" . $clasificacion[$nombreLocal]["Puntos"] . "</td>";
        echo "<td>" . $clasificacion[$nombreLocal]["Goles a favor"] . "</td>";
        echo "<td>" . $clasificacion[$nombreLocal]["Goles en contra"] . "</td>";
        echo "</tr>";
    }
    echo "</table><br>";

    ?>
    <?php
    include("../../fragmentos/footer.php");
    ?>
</body>

</html>