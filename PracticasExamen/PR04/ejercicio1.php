<?php

$escribe = "";

$filas = 5;

for($j = 0 ; $j < $filas ; $j++){
    $escribe .= str_repeat('-',$filas - $j - 1);
    $escribe .= str_repeat('*',2*$j+1);
    $escribe .= "<br>";
}

echo $escribe;

?>