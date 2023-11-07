<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // 1
    $contacto = array(
        "C1" => array("Nombre" => "Fernando", "Correo" => "fercara1999@gmail.com", "FechaNacimiento" => new DateTime("27-11-1999")),
        "C2" => array("Nombre" => "Maria", "Correo" => "maria@gmail.com", "FechaNacimiento" => new DateTime("15-12-1999")),
        "C3" => array("Nombre" => "Julian", "Correo" => "julianpr@gmail.com", "FechaNacimiento" => new DateTime("14-01-1959")));
    
        foreach ($contacto as $key => $value){
            foreach ($value as $key2 => $value2){
                if ($key2 == "FechaNacimiento"){
                    echo "$key2 =>".date_format($value2,'d/m/Y');
                }else{
                    echo "$key2 => $value2";
                }
            }
            echo "<br>";
        }
    ?>
</body>
</html>