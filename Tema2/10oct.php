<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        // Array numérico
        $arrayNumerico = array(10);
        print_r($arrayNumerico);
        echo "<br>";

        $semana2 = array("Lunes","Martes","Miercoles","Jueves","Viernes");
        print_r($semana2);

        echo "<br>";
        $semana2 = array("Lunes",2,"Miercoles","Jueves","Viernes");
        print_r($semana2);

        echo "<br>";
        $arrayCorta = ["Lunes",25];
        var_dump($arrayCorta);

        echo "<br>";
        for($i=0; $i < count($semana2); $i++){
            echo "<br>".$semana2[$i];
        }

        // array dinamico
        $semana2[5] = "Sabado";
        for($i=0; $i < count($semana2); $i++){
            echo "<br>".$semana2[$i];
        }

        foreach($semana2 as $key => $value){
            echo "<br>".$semana2[$key];
        }
        echo "<br>";
        $semana2[7] = "Fiesta";

        print_r(array_keys($semana2));

        // arrays asociativos
        $notas = array("Smail"=> 10,"Mario"=>9,"Manuel"=>"Sobresaliente");
        foreach($notas as $key => $value){
            echo "<br> La nota de $key (key) es : $value (value)";
        }

        // Array multiple: pueden ser numéricos o asociativos
        $arrayDAW = array("PROG"=>"Programacion","DWES"=>"Program Servicios");//Asociativo cuya clave son las siglas
        $arrayDAM = array("LM"=>"Lenguaje de marcas","BD"=>"Bases de datos","BD2"=>"Bases de datos","BD3"=>"Bases de datos");
        $arrayASIR = array("SOR"=>"Sistemas operativos","RD"=>"Redes");
        $ciclos = array("DAM"=>$arrayDAM,"DAW"=>$arrayDAW,"ASIR"=>$arrayASIR);//array numerico
        echo "<br><br><pre>";
        print_r($ciclos);

        // Recorrerlo

        foreach ($ciclos as $key => $value) {
            echo "<br>El ciclo $key tiene las asignaturas : ";
            foreach ($value as $siglas => $nombreA) {
                echo "<br>- $siglas : $nombreA";
            }
        }

        // Funciones
        // Recorrer como si fueran listas: current, reset, list

        // reset ir primero
        echo "<br><br>Recorremos<br>";
        echo "<br>";
        echo "<br>";
        reset($ciclos);
        while(current($ciclos)){
            // print_r(current($ciclos));
            echo"<br>El ciclo ".key($ciclos)." tiene las asignaturas : ";
            $ciclo = current($ciclos);
            while(current($ciclo)){
                echo "<br>-" .$key($ciclo).": ". current($ciclo);
                next($ciclo);
            }
            next($ciclos);
        }

        
    ?>
</body>
</html>