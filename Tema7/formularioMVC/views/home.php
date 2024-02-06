<?php

echo "<h2>FORMULARIO VALIDADO FERNANDO CALLES</h2>";

$libros = get('libros');
$libros = json_decode($libros,true);

print_r($libros);

?>