<?php
echo "<pre>";
$exp = '/fernando/';
echo preg_match($exp,'prueba contiene fernando con preg_match');

// Con el comodín "."
echo '<br>';
$exp = '/fernand./';
echo preg_match($exp,'prueba contiene fernande con preg_match');

// Con dos terminaciones
echo '<br>';
$exp = '/fernand[ao]/';
echo preg_match($exp,'prueba contiene fernando con preg_match');

echo "<br>";
$exp = '/\s[A-Za-z]\s/';   
$frase = 'Hoy es Halloween y salimos';
echo preg_match($exp,$frase);
echo '<br>';

$array = array();
echo preg_match_all($exp,$frase,$array);
echo '<br>';
print_r($array);

// Numérico \d
$pat = '/\d/';
$nuevaFrase = "Hoy es 31 de octubre";
echo preg_match_all($pat,$nuevaFrase,$array);
echo "<br>";
print_r($array);

// Numérico busca un numero de 4 caracteres
// '+' busca de más de 1 caracteres
$pat = '/\d+/';
$pat = '/\d{4}/';
$nuevaFrase = "Hoy es 31 de octubre de 2023";
echo preg_match_all($pat,$nuevaFrase,$array);
echo "<br>";
print_r($array);

// Expresión regular que sea valido un IBAN
$exp = "/^[A-Z]{2}\d{2}\s\d{4}\s\d{4}\s\d{4}\s\d{4}\s\d{4}$/";
$frase = "ES66 0016 0020 9612 3456 7800";
echo "<br>";
echo preg_match($exp,$frase);
echo "<br>";

// Uso de no contiene
$exp = '/mari[^ao]/';
echo preg_match($exp,"mario es mi profe");
echo preg_match($exp,"maril es mi profe");
echo "<br>";
echo "Noviembre<br>";

// nov, noviembre, november
$exp = "/^nov(iembre|ember)?$/";
echo preg_match($exp,'nov');
echo "<br>";
echo preg_match($exp,'noviembre');
echo "<br>";
echo preg_match($exp,'november');
echo "<br>";
echo preg_match($exp,'anovember');
echo "<br>";
echo preg_match($exp,'novi');
echo "<br>";
echo preg_match($exp,'novemberp');

$exp = "/es$/";
$array = ["Lunes","Martes","Sabado","Domingo"];
print_r(preg_grep($exp,$array));
echo "<br>";

// Reemplazar
// Filter devuelve solo en los que ha habido cambios
$array = [1,'a','B',4];
$patron = ['/^\d$/', '/^\D$/'];
$cambio = ["numero","letra"];
print_r(preg_replace($patron,$cambio,$array));

echo "<br>";
$patron = ["/^\d$/"];
$cambio = "numero";
print_r(preg_filter($patron,$cambio,$array));

echo "<br>";

$frase = "Si hay una fecha 1/02/2012 está bien pero 10/2/2021 mal, 15/12/21 mal";
// si el mes tiene solo un digito añado un 0 delante y el dia tambien
// si el año tiene dos digitos: <23 con 20 delante
// y si es mayor, > 19 delante

function corrige($coincide){
    print_r($coincide);
    if($coincide[1]<10 && strlen($coincide[1]) != 2){
        $coincide[1] = '0'.$coincide[1];
    }
    if($coincide[3]<10 && strlen($coincide[3]) != 2){
        $coincide[3] = '0'.$coincide[3];
    }
    if($coincide[5]<=23){
        $coincide[5] = '20'.$coincide[5];
    }elseif($coincide[5]>23 && $coincide[5] < 100)
        $coincide[5] = '19'.$coincide[5];

    return $coincide[1].$coincide[2].$coincide[3].$coincide[4].$coincide[5];
}

echo "<br>PRUEBA CALLBACK<br>";
$exp = '/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/';
// preg_match_all($exp,$frase,$array);
// print_r($array);
print_r(preg_replace_callback($exp,'corrige',$frase));
echo "</pre>";
?>