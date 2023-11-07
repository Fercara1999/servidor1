<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Operadores
        echo 4<=>5;

    //if
    echo "<br>";
    if (4<3)
        echo "Mayor";
    else
        echo "Menor o igual";
    
        echo "<br>";
    //elseif
    if (4<3)
        echo "Mayor";
    elseif(3<4)
        echo "Menor";
    else
        echo "Igual";    
        echo "<br>";
    // switch

    // switch ($variable) {
    //     case 'value':
    //         # code...
    //         break;
        
    //     default:
    //         # code...
    //         break;
    // }

    // while: Primero mira la condicion y despues ejecuta
    $a = 1;
    while ($a <= 10) {
        echo $a;
        $a++;
    }

    echo "<br>";

    //do while: primero ejecuta y luego mira

    // for

    for ($i=0; $i < 10; $i++) { 
        echo $i;
    }

    // foreach

    foreach ($_SERVER as $key => $value) {
        echo "<br>Clave: " .$key." Valor: ".$value."</br>";
    }

    foreach ($_SERVER as $value) {
        echo "<br>".$value;
    }


    ?>
</body>
</html>