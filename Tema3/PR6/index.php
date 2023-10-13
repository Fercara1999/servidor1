<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR6 - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css"></link>
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
    <?php
        $aux = array();
        echo "<table border = '1'>";
        echo "<tr>";
        echo "<th>Equipos</th>";
        foreach ($liga as $nombreEquipos => $valores) {
            
            echo "<th>$nombreEquipos</th>";
            array_push($aux,$nombreEquipos);
                
        }
        
        echo "</tr>";
        foreach ($liga as $nombreEquipos => $rivales) {
            
            echo "<tr>";
            echo "<th>$nombreEquipos</th>";
            
            $i = 0;
            foreach ($rivales as $nombreRival => $partido) {

                if($aux[$i]==$nombreEquipos){
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
    echo "<table border='1'>";
        echo "<tr><th>Equipos</th><th>Puntos</th><th>Goles a favor</th><th>Goles en contra</th></tr>";

        foreach ($liga as $nombre => $value) {
            $auxFinalPuntos[$nombre] = 0;
            $auxFinalGolesFavor[$nombre] = 0;
            $auxFinalGolesContra[$nombre] = 0;
        }

        foreach ($liga as $nombreEquipos => $rivales) {

            echo "<tr>";
                    echo "<th>$nombreEquipos</th>";

            foreach ($rivales as $nombreRival => $partido) {

                            $resultado = explode("-",$partido["Resultado"]);

                            $auxFinalGolesFavor[$nombreEquipos] += $resultado[0];
                            $auxFinalGolesContra[$nombreEquipos] += $resultado[1];
                            $auxFinalGolesFavor[$nombreRival] += $resultado[1];
                            $auxFinalGolesContra[$nombreRival] += $resultado[0];
                            if($resultado[0] > $resultado[1]){
                                $auxFinalPuntos[$nombreEquipos]+= 3;

                            }elseif($resultado[0] < $resultado[1]){
                                $auxFinalPuntos[$nombreRival]+= 3;
                            }else{
                                $auxFinalPuntos[$nombreEquipos] += 1;
                                $auxFinalPuntos[$nombreRival] += 1;
                            }
                        } 
            echo "<td>$auxFinalPuntos[$nombreEquipos]</td>";
            echo "<td>$auxFinalGolesFavor[$nombreEquipos]</td>";
            echo "<td>$auxFinalGolesContra[$nombreEquipos]</td>";             

        }

    echo "</table><br>";

    echo "<table border='1'>";
        echo "<tr><th>Equipos</th><th>Puntos</th><th>Goles a favor</th><th>Goles en contra</th></tr>";
        echo "<tr>";
            foreach ($liga as $nombres => $value) {
                echo "<b><th>$nombres</th></b>";
                
                    echo "<td>$auxFinalPuntos[$nombres]</td>";
                    echo "<td>$auxFinalGolesFavor[$nombres]</td>";
                    echo "<td>$auxFinalGolesContra[$nombres]</td>";
                
                echo "</tr>";
            }
    echo "</table>";
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>