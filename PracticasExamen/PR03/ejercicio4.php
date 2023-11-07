<?php

    $ano1 = $_GET['ano1'];
    $mes1 = $_GET['mes1'];
    $dia1 = $_GET['dia1'];

    $fecha1 = new DateTime($ano1."/".$mes1."/".$dia1);

    $ano2 = $_GET['ano2'];
    $mes2 = $_GET['mes2'];
    $dia2 = $_GET['dia2'];

    $fecha2 = new DateTime($ano2."/".$mes2."/".$dia2);

    $intervalo = date_diff($fecha1,$fecha2);

    echo $intervalo->format('%R%m dias');

?>