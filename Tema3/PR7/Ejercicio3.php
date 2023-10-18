<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>

    <?php
        include("../../fragmentos/header.html");
    ?>

    <a href="./Ejercicio3.php?var1=11&var2=22&var3=33&var4=44&var5=36&especial1=3&especial2=6"> Enlace combinacion </a>

    <?php
    
        $miCombinacion = array();
        $miCombinacionEstrellas = array();

        $var1 = $_GET['var1']; 
        array_push($miCombinacion, $var1);
        $var2 = $_GET['var2']; ;
        array_push($miCombinacion, $var2);
        $var3 = $_GET['var3']; ;
        array_push($miCombinacion, $var3);
        $var4 = $_GET['var4']; ;
        array_push($miCombinacion, $var4);
        $var5 = $_GET['var5']; ;
        array_push($miCombinacion, $var5);
    
        $especial1 = $_GET['especial1']; ;
        array_push($miCombinacionEstrellas, $especial1);
        $especial2 = $_GET['especial2']; ;
        array_push($miCombinacionEstrellas, $especial2);

       $combinacionGanadora = array();
       $combinacionEstrellas = array();

       for($i = 1 ; $i <= 50 ; $i++){
            array_push($combinacionGanadora, $i);
       }

       for($i = 1 ; $i <= 12 ; $i++){
            array_push($combinacionEstrellas,$i);
       }
        $numerosGanadores = array();
        $numerosEstrellas = array();
        numerosAleatorios($numerosGanadores,1,50,5,false);
        numerosAleatorios($numerosEstrellas,1,12,2,false);

            echo "<table border='1'>";
            echo "<tr>";
                foreach ($combinacionGanadora as $numero) {
                    
                    if($numero % 7 == 0){    
                        if(in_array($numero,$numerosGanadores)){
                            if(in_array($numero,$miCombinacion)){
                                echo "<td bgcolor='blue'>".$numero."</td></tr><tr>";
                            }else{
                                echo "<td bgcolor='green'>".$numero."</td></tr><tr>";
                            }
                        }else{
                            if(in_array($numero,$miCombinacion)){
                                echo "<td bgcolor='blue'>".$numero."</td></tr><tr>";
                            }else{
                                echo "<td>".$numero."</td></tr><tr>";
                            }
                        }
                    }else{
                        if(in_array($numero,$numerosGanadores)){
                            if(in_array($numero,$miCombinacion)){
                                echo "<td bgcolor='blue'>".$numero."</td>";
                            }else{
                                echo "<td bgcolor='green'>".$numero."</td>";
                            }
                        }else{
                            if(in_array($numero,$miCombinacion)){
                                echo "<td bgcolor='blue'>".$numero."</td>";
                             } else{
                                echo "<td>".$numero."</td>";
                            }
                        }
                    }
                }

            echo "</table>";

            echo "<br>";

            echo "<table border='1'>";
            echo "<tr>";
            foreach ($combinacionEstrellas as $numero) {
                if($numero % 4 == 0){  
                    if(in_array($numero,$numerosEstrellas)){  
                        if(in_array($numero,$miCombinacionEstrellas)){
                            echo "<td bgcolor='blue'>".$numero."</td></tr><tr>";    
                        }else{
                            echo "<td bgcolor='green'>".$numero."</td></tr><tr>";
                        }
                        
                    }else{
                        if(in_array($numero,$miCombinacionEstrellas)){
                            echo "<td bgcolor='blue'>".$numero."</td></tr><tr>";
                        }else{
                            echo "<td>".$numero."</td></tr><tr>";
                        }
                    }
                }else{
                    if(in_array($numero,$numerosEstrellas)){  
                        if(in_array($numero,$miCombinacionEstrellas)){
                            echo "<td bgcolor='blue'>".$numero."</td>";
                        }else{
                            echo "<td bgcolor='green'>".$numero."</td>";
                        }
                    }else{
                        if(in_array($numero,$miCombinacionEstrellas)){
                            echo "<td bgcolor='blue'>".$numero."</td>";
                        }else{
                            echo "<td>".$numero."</td>";
                        }
                    }
                }
            }
            echo "</table>";

            foreach ($numerosGanadores as $key) {
                echo "$key<br>";
            }
            echo "<br>";
            foreach ($numerosEstrellas as $key) {
                echo "$key<br>";
            }

            $aciertos = 0;
        for ($i = 0 ; $i < 5 ; $i++){

            for ($j = 0 ; $j < 5 ; $j++){
                if ($numerosGanadores[$i] == $miCombinacion[$j]){
                    $aciertos++;
                }
            }
        }

        echo "Has tenido ".$aciertos." aciertos<br>";

        $aciertosEstrellas = 0;

        for ($i = 0 ; $i < 2 ; $i++){

            for ($j = 0 ; $j < 2 ; $j++){
                if ($numerosEstrellas[$i] == $miCombinacionEstrellas[$j]){
                    $aciertosEstrellas++;
                }
            }
        }

        echo "Has tenido ".$aciertosEstrellas." aciertos en los números especiales";

 
        function numerosAleatorios(&$arrayNumeros,$min,$max,$nGenerados,$boolRepite){

            for($i = 0 ; $i < $nGenerados ; $i++){
                $n = rand($min,$max);
                if($boolRepite){
                    array_push($arrayNumeros,$n);
                    // echo $n."<br>";
                }else{
                    if(in_array($n,$arrayNumeros)){
                        // echo "Ya esta el " .$n."<br>";
                        $i--;
                    }else{
                        array_push($arrayNumeros,$n);
                        // echo $n."<br>";
                    }
                }
            }

        }
       
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>