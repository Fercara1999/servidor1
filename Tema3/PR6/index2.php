<!DOCTYPE html>
<html lang="en">
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

                    $puntosEquipos = 0;
                    $golesEquipos = 0;
                    $golesRival = 0;
                    $puntosRival = 0;
                    $golesMetidosVuelta = 0;
                    $golesMetieronVuelta = 0;
            foreach ($rivales as $nombreRival => $partido) {

                    
                foreach ($partido as $clavePartido => $datosPartido) {

                        if($clavePartido == "Resultado"){
                            $resultado = explode("-",$datosPartido);
                            if($resultado[0] > $resultado[1]){
                                $puntosEquipos+=3;
                                $golesEquipos += $resultado[0];
                                $golesRival += $resultado[1];

                            }else if($resultado[0] < $resultado[1]){
                                $golesEquipos += $resultado[0];
                                $golesRival += $resultado[1];
                                $puntosRival += 3;
                            }else{
                                $puntosEquipos+=1;
                                $puntosRival+=1;
                                $golesEquipos += $resultado[0];
                                $golesRival += $resultado[1];
                            }
                        }                        
                            
                }
                
            }
            echo "$puntosRival";
            echo "<td>".$puntosEquipos."</td>";
            echo "<td>$golesEquipos</td>";
            echo "<td>$golesRival</td>";
            
        }

    echo "</table>";
    ?>
</body>
</html>