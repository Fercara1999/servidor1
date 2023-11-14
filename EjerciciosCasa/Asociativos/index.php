<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $persona = [
    
    "persona1" => [
        "nombre" => "Fernando",
        "apellido1" => "Calles",
        "apellido2" => "Ramos"
],
    "persona2" => [
        "nombre" => "Maria",
        "apellido1" => "Touriño",
        "apellido2" => "Morchón"
    ]
    ];

    echo $persona["persona1"]["nombre"];

    ?>
</body>
</html>