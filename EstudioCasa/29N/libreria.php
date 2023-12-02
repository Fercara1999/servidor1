<?php

require("./conSQL.php");

try {
    $con = mysqli_connect(IP,USER,PASSWORD,'libreria');
        echo "conectado";
       

    mysqli_close($con);

    // Comprobar en clase desde que id Accedemos

} catch (\Throwable $th) {
    switch ($th->getCode){
        case 0:
            echo "No encuentra todos los parámetros de la secuencia";
            break;
        case 2002:
            echo "La IP de acceso a la BD es incorrecta";
            break;
        case 1045:
            echo "Usuario o contraseña incorrectos";
            break;
        case 1049:
            echo "Error al conectarse a la base de datos indicada";
            break;
        case 1146:
            echo "Error al encontrar la tabla indicada";
            break;
        case 1064:
            echo "No se han indicado los valores a insertar en la BD";
            break;
    }

    mysqli_close($con);
}

?>