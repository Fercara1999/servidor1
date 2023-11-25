<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abriendoFichero</title>
</head>
<body>
    <form action="./escribiendoFichero.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Titulo: <input type="text" name="titulo" id="titulo"></label><br>
        <label for="autor">Autor: <input type="text" name="autor" id="autor"></label><br>
        <label for="editorial">Editorial: <input type="text" name="editorial" id="editorial"></label><br>
        <label for="isbn">ISBN: <input type="text" name="isbn" id="isbn"></label><br>
        <label for="precio">Precio: <input type="number" name="precio" id="precio"></label><br>
        <input type="submit" value="Enviar" name="enviar" id="enviar">
        <input type="reset" name="borrar" id="borrar">

    </form>
</body>
</html>



<?php

    // if($fp = fopen("fichero.txt","w")){
    //     $texto = "Este es un texto te prueba para comprobar que se está escribiendo en el fichero";
    //     if(fwrite($fp,$texto))



    //         echo "Escrito";
    //     else{
    //         echo "Problemas al escribir en el fichero";
    //     }
    // }else{
    //     echo "Problemas al abrir el fichero";
    // }

?>