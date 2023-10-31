<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR9</title>
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
    <link rel="stylesheet" href="./estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./validaciones.php");
    ?>

    <form action="" method="post" name="formularioPR9"></form>
    <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label><br>
    <label for="apellido">Apellido: <input type="text" name="apellido" id="apellido"></label><br>
    <label for="contrasena">Contraseña: <input type="password" name="contrasena" id="contrasena"></label><br>
    <label for="repcontrasena">Confirma contraseña: <input type="password" name="repcontrasena" id="repcontrasena"></label><br>
    <label for="fecha">Fecha <input type="dateTime" name="fecha" id="fecha"></label><br>
    <label for="DNI">DNI: <input type="text" name="DNI" id="DNI"></label><br>
    <label for="email">Correo electronico <input type="email" name="email" id="email"></label><br>
    <label for="imagen">Imagen <input type="file" name="imagen" id="imagen"></label><br>
    
    
    <?php
        include("../../fragmentos/footer.php");
    ?>

</body>
</html>