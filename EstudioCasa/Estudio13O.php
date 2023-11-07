<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $novelas = array(
        "novela1" => array(
            "titulo" => "Cien años de soledad",
            "autor" => "Gabriel García Márquez",
            "genero" => "Realismo mágico",
            "publicacion" => 1967
        ),
        "novela2" => array(
            "titulo" => "1984",
            "autor" => "George Orwell",
            "genero" => "Distopía",
            "publicacion" => 1949
        ),
        "novela3" => array(
            "titulo" => "Don Quijote de la Mancha",
            "autor" => "Miguel de Cervantes",
            "genero" => "Novela de caballerías",
            "publicacion" => 1605
        )
    );

    foreach ($novelas as $clave => $titulos) {
        echo "Datos sobre la novela $clave :";
        foreach ($titulos as $datos => $valores) {
            echo " - $datos: $valores <br>";
        }
        echo "<br>";
    }
    ?>
</body>
</html>