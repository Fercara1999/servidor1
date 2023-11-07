<?php

$contenidoVariable = $_GET['variable'];

echo "El valor de la variable es " .$contenidoVariable;
echo "<br>";
echo "El tipo de la variable es " . gettype($contenidoVariable+0);
echo "<br>";
echo is_numeric($contenidoVariable+0);
echo is_float($contenidoVariable);

?>