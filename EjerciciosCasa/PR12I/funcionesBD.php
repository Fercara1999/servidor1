<?php

require("./conexionBD.php");

function insertaDatos(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,'libreria');
            echo "conectado";
    
            $isbn = $_REQUEST['isbn'];
            $titulo = $_REQUEST['titulo'];
            $autor = $_REQUEST['autor'];
            $editorial = $_REQUEST['editorial'];
            $fechaPublicacion = $_REQUEST['fechaLanzamiento'];
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
}

function creaBD(){

    try {
        $con = mysqli_connect(IP,USER,PASSWORD);
        $sql = 'CREATE DATABASE IF NOT EXISTS libreria';
        mysqli_query($con,$sql);
        creaTablaYDatos();

        mysqli_close($con);
    } catch (\mysqli_sql_exception $e) {
        echo "Error de MySQLi: " . $e->getMessage() . "<br>";
        echo "Número de error: " . $e->getCode();
    } catch (\Throwable $th) {
        switch ($th->getCode()){
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;
        }
    
        mysqli_close($con);
    }

}

function creaTablaYDatos(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,'libreria');
        $sql = 'CREATE TABLE IF NOT EXISTS libros (
            isbn VARCHAR(13) PRIMARY KEY,
            titulo VARCHAR(255) NOT NULL,
            autor VARCHAR(255) NOT NULL,
            editorial VARCHAR(255) NOT NULL,
            fecha_lanzamiento DATE NOT NULL,
            precio DECIMAL(10, 2) NOT NULL
        )';
        mysqli_query($con,$sql);

        $sql = "INSERT INTO libros values(9788412579658,'Holly','Stephen King','Plaza','2023-09-19',23.90)";
        mysqli_query($con,$sql);

        mysqli_close($con);

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
            case 1062:
                echo "Clave primaria repetida";
                break;
        }
    
        mysqli_close($con);
    }
}

function leeTabla(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,'libreria');
        $sql = 'SELECT * FROM libros';
        $resultado = mysqli_query($con,$sql);
        // echo $resultado;
        echo "<table border='1'>";
        echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha de lanzamiento</th><th>Precio</th></tr>";
    
        while($fila = mysqli_fetch_row($resultado)){
            echo "<tr>";
            foreach ($fila as $key => $value) {
                echo "<td>$fila[$key]</td>";
            }
            echo "</tr>";
        }

        echo "</tr></table>";

        mysqli_close($con);
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
}
?>