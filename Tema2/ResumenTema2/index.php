<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea Resumen Tema 2</title>
    <link rel="stylesheet" href="/../../css/estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
    ?>
    <a href="./Ejercicio1.php"><p>1. Crea una pagina que:</p></a>
    <a href="./Ejercicio2.php?numero=19.99"><p>2. Crea una página a la que se le pase por url una variable con el nombre que quieras y
muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float. (No
hace falta usar if) </p></a>
    <a href="./Ejercicio3.php?ano=2023&mes=10&dia=03"><p>3. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre
el día de la semana de dicho día. (Por defecto, dale el valor de 03/10/2023) </p></a>
    <a href="./Ejercicio4.php?ano1=1993&mes1=11&dia1=27&ano2=1995&mes2=11&dia2=27"><p>4. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos
personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años </p></a>
    <a href="./index.php"><p>5. Crea un enlace a una página en cada página anterior que muestre el contenido del fichero
que se está ejecutando. </p></a>

    <?php
        include("../../fragmentos/footer.php");
    ?>
    
</body>
</html>