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
    <!-- Ultimo es 1-1, en vez de 1-2 -->
    <pre>
    <table border="1">
        <tr><th>Equipos</th>
            <?php
            $aux = array();
            foreach ($liga as $clave => $valor) {
                 echo "<th>$clave</th>";
                array_push($aux,$clave);
                
            }
            array_unique($aux);
            foreach ($aux as $key => $value) {
                print_r($aux);
            }

            ?>
        </tr>
            <?php
                
                foreach ($liga as $key2 => $value2) {
                    echo "<tr>";
                    foreach ($aux as $key => $value) {
                        if($aux == $value2){
                            echo "<td>1</td>";
                        }
                    }
                            echo "<td>";
                            print_r($key2);
                            echo "</td>";

                        foreach ($value2 as $key3 => $value3) {
                            
                            echo "<td>";

                            foreach ($value3 as $key4 => $value4) {
                                
                                echo "<p>";
                                print_r($value4);
                                echo "</p>";
                                
                            }
                            echo "</td>";
                    }
                    echo "</tr>";
                }
            
            ?>

    </table>
    </pre>
</body>
</html>