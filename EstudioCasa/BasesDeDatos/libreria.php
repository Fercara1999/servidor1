<?php

require("./conSQL.php");

try {
    $con = mysqli_connect(IP,USER,PASSWORD,'libreria');
        echo "conectado";

        $isbn = $_REQUEST['isbn'];
        $titulo = $_REQUEST['titulo'];
        $autor = $_REQUEST['autor'];
        $editorial = $_REQUEST['editorial'];
        $fechaPublicacion = $_REQUEST['fecha_publicacion'];
        $precio = $_REQUEST['precio'];

        $sql = 'insert into libros values(?,?,?,?,?,?)';
        $stmt = mysqli_prepare($con,$sql);

        mysqli_stmt_bind_param($stmt,'ssssss', $isbn, $titulo, $autor, $editorial, $fechaPublicacion, $precio);
        mysqli_stmt_execute($stmt);

    mysqli_close($con);

    // Comprobar en clase desde que id Accedemos

} catch (\mysqli_sql_exception $e) {
    echo "Error de MySQLi: " . $e->getMessage() . "<br>";
    echo "Número de error: " . $e->getCode();
} catch (\Throwable $th) {
    switch ($th->getCode()){
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
        case 1406:
            echo "Alguno de los campos a insertar ha excedido el número de carácteres permitidos";
            break;
    }

    mysqli_close($con);
}

?>