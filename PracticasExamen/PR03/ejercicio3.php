<?php

$ano = $_GET['ano'];
$mes = $_GET['mes'];
$dia = $_GET['dia'];

$fecha = new DateTime($mes."/".$dia."/".$ano);

echo date_format($fecha,'d/m/Y');
echo date_format($fecha,'l');

?>