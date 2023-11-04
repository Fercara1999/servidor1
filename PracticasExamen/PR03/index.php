<?php

// 1
// a

$archivo = $_SERVER['PHP_SELF'];
echo $archivo;

// b

echo "<br>";
$ipAccediendo = $_SERVER['REMOTE_ADDR'];
echo $ipAccediendo;

// c

echo "<br>";
$rutaAcceso = $_SERVER['SCRIPT_FILENAME'];
echo $rutaAcceso;

// d

echo "<br>";
$fechaHoy = new DateTime('now');
echo date_format($fechaHoy,'d-m-y');

// e

echo "<br>";
$fechaOporto = new DateTime('now', new DateTimeZone('Europe/Lisbon'));
echo date_format($fechaHoy,'l d G:i:s,e');

// f

echo "<br>";
$cumpleanos = new DateTime('1999-11-27');
echo date_timestamp_get($cumpleanos);
echo "<br>";
echo date_format($cumpleanos,'d-m-Y');

// g

echo "<br>";
$hoy = new DateTime('now');
$fechaSuma = date_add($hoy,date_interval_create_from_date_string('60 days'));
echo date_format($fechaSuma,'d/m/Y');

// 2

echo "<br>";
echo "<a href='./ejercicio2.php?variable=24'> Enlace al 2 </a>";

// 3

echo "<br>";
echo "<a href='./ejercicio3.php?ano=2023&mes=11&dia=4'>Enlace al 3</a>";

// 4

echo "<br>";
echo "<a href='./ejercicio4.php?ano1=1999&mes1=12&dia1=27&ano2=1999&mes2=5&dia2=15'>Enlace al 4</a>";
?>