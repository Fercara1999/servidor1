<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // nombre = edad
        // opt argumentos = año, mes, dia
        // opt return anos
        function edad($ano,$mes,$dia){
            $fecha1 = new DateTime($ano."-".$mes."-".$dia);
            $fecha2 = new DateTime();
            $anos = ($fecha1->diff($fecha2))->y;
            return $anos;
        }

        function iva($precio,$iva=0.21){
        return $precio * $iva;
        }

        function añadirAlArray($array,$value){
            $ultimo = count($array);
            $array[$ultimo] = $value;
        }
    ?>
</body>
</html>