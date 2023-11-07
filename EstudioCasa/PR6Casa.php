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
        echo "<table border='1'>";
        echo "<tr>";
            echo "<th>Equipos</th>";
            foreach ($liga as $equipoLocal => $arrayVisitantes) {
                echo "<th>$equipoLocal</th>";
                array_push($aux,$equipoLocal);
            }
        echo "</tr>";
            
            foreach ($liga as $equipoLocal => $arrayVisitantes) {
                $i = 0;
                echo "<tr>";
                    echo "<th>$equipoLocal</th>";
                    
                foreach ($arrayVisitantes as $equipoVisitante => $datosPartido) {
                    if($aux[$i] == $equipoLocal){
                        echo "<td></td>";
                    }
                    echo "<td>";
                    foreach ($datosPartido as $clavesPartido => $contenido) {       
                           echo "<p>$contenido</p>";
                    }
                    echo "</td>";
                    $i++;
                }   
                    echo "</tr>"; 
                   
            }
            echo "</table>";
            
        echo "<br>";
        echo "<table border='1'>";
        echo "<tr><th>Equipos</th><th>Puntos</th><th>Goles a favor</th><th>Goles en contra</th></tr>";
        foreach ($liga as $nombreLocal => $arrayVisitantes) {
            $puntos[$nombreLocal] = 0;
            // $puntos[$nombreVisitantes] = 0;
            $golesFavor[$nombreLocal] = 0;
            $golesContra[$nombreLocal] = 0;
        }
  
        foreach ($liga as $nombreLocal => $nombreVisitantes) {
            echo "<tr>";
            echo "<th>$nombreLocal</th>";
            foreach ($nombreVisitantes as $nombreVisitantes => $contenidoPartido) {
                echo "<td>";
                foreach ($contenidoPartido as $clavesPartido => $datos) {
                    if($clavesPartido == "Resultado"){
                        $resultado = explode("-",$datos);
                        $golesFavor[$nombreLocal] += $resultado[0];
                        $golesContra[$nombreLocal] += $resultado[1];
                        $golesFavor[$nombreVisitantes] += $resultado[1];
                        $golesContra[$nombreVisitantes] += $resultado[0];
                        if($resultado[0] > $resultado[1]){
                            $puntos[$nombreLocal] += 3;
                        }elseif($resultado[0] < $resultado[1]){
                            $puntos[$nombreVisitantes] += 3;
                        }else{
                            $puntos[$nombreLocal] += 1;
                            $puntos[$nombreVisitantes] += 1;
                        }
                    }
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";

        echo "<table border ='1'><tr><th>Equipos</th><th>Puntos</th><th>Goles a Favor</th><th>Goles en contra</th></tr>";
        echo "<tr>";
            foreach ($liga as $nombreLocal => $arrayVisitantes) {
                echo "<th>$nombreLocal</th>";
                echo "<td>$puntos[$nombreLocal]</td>";
                echo "<td>$golesFavor[$nombreLocal]</td>";
                echo "<td>$golesContra[$nombreLocal]</td>";
                echo "</tr>";
            }
        echo "</tr>";
        echo "</table>";
      
    ?>
</body>
</html>