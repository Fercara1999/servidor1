<?php
require("./dao/animal.php");
require("./dao/perro.php");

$perro1 = new Perro("Rex","pequeño","Bulldog");

echo $perro1->__toString();

?>