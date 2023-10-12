<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        foreach ($liga as $nombreEquipos => $rivales) {

            echo "<tr>";
                    echo "<th>$nombreEquipos</th>";
                    
                    $puntos[$nombreEquipos] = 0;
                    $golesFavor[$nombreEquipos] = 0;
                    $golesContra[$nombreEquipos] = 0;

            foreach ($rivales as $nombreRival => $partido) {

                $puntos[$nombreRival] = 0;
                $golesFavor[$nombreRival] = 0;
                $golesContra[$nombreRival] = 0;
                    
                foreach ($partido as $clavePartido => $datosPartido) {

                        if($clavePartido == "Resultado"){
                            $resultado = explode("-",$datosPartido);
                            $golesFavor[$nombreEquipos] += $resultado[0];
                            $golesContra[$nombreRival] += $resultado[1];
                            if($resultado[0] > $resultado[1]){
                                $puntos[$nombreEquipos] += 3;

                            }else if($resultado[0] < $resultado[1]){
                                $puntos[$nombreRival] += 3;
                            }else{
                                $puntos[$nombreEquipos] += 1;
                                $puntos[$nombreRival] += 1;
                            }
                        } 
                            
                }
                
            };
            echo "<td>".$puntos[$nombreEquipos]."</td>";
            echo "<td>".$golesFavor[$nombreEquipos]."</td>";
            echo "<td>".$golesContra[$nombreEquipos]."</td>";
            
        }

    echo "</table>";
    ?>
</body>
</html>