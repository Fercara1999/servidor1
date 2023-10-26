<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Fernando Calles</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./Ejercicio1.php");
    ?>
    <?php
        // Prueba del apartado 1
          
            echo "Hola";
            br();
            echo "Hola";
            br();

        // Prueba del apartado 2

            $cadenaPrueba = "Adios";
            echo $cadenaPrueba;
            br();
            h1($cadenaPrueba);
            br();

        // Prueba del apartado 3

            p($cadenaPrueba);
            p($cadenaPrueba);
            br();

        // Prueba del apartado 4

            self();
            br();

        // Prueba del apartado 5

            letraDNI(71043001);

    
    ?>
    <?php
        include("../../fragmentos/footer.php");
    ?>
</body>
</html>