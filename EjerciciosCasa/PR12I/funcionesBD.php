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
    
    } catch (\Throwable $th) {
        muestraErrores($th);
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
    } catch (\Throwable $th) {
        muestraErrores($th);
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

        $sql = "INSERT INTO libros values(9788412579658,'Holly','Stephen King','Plaza & Janes','2023-09-19',23.90)";
        mysqli_query($con,$sql);
        $sql = "INSERT INTO libros values(9788412579648,'Juego de tronos','George Martin','Plaza & Janes','2023-09-20',26.90)";
        mysqli_query($con,$sql);
        $sql = "INSERT INTO libros values(9788413579648,'Todo Vuelve','Juan Gomez Jurado','Ediciones B','2023-10-20',22.90)";
        mysqli_query($con,$sql);

        mysqli_close($con);

    } catch (\Throwable $th) {
        muestraErrores($th);
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
        echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha de lanzamiento</th><th>Precio</th><th>Modificar</th><th>Eliminar</th></tr>";
    
        while($fila = mysqli_fetch_row($resultado)){
            echo "<tr>";
            echo "<form action='' method='get'>";
            foreach ($fila as $key => $value) {
                echo "<label for='dato$key'><td><input type='text' name='dato$key' id='dato$key' value='$fila[$key]' readonly></td></label>";
            }
            echo "<td><input type='submit' name='Modificar' id='Modificar' value='Modificar'></td>";
            echo "<td><input type='submit' name='Eliminar' id='Eliminar' value='Eliminar'></td>";
            echo "</form></tr>";
        }

        echo "</table>";

        mysqli_close($con);
    } catch (\Throwable $th) {
        muestraErrores($th);
        mysqli_close($con);
    }
}

function modificaCampo(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,'libreria');
        $isbn = $_REQUEST['dato0'];
        $sql = "SELECT * FROM libros where isbn =$isbn";
        $resultado = mysqli_query($con,$sql);
        // echo $resultado;
        while($fila = mysqli_fetch_row($resultado)){
            echo "<table border='1'>";
        echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha de lanzamiento</th><th>Precio</th><th>Guardar Cambios</th></tr>";
            echo "<tr>";
            echo "<form action='' method='get'>";
            foreach ($fila as $key => $value) {
                echo "<label for='dato$key'><td><input type='text' name='dato$key' id='dato$key' value='$fila[$key]'></td></label>";
            }
            echo "<td><center><input type='submit' name='Guardar' id='Guardar' value='Guardar'></center></td>";
            echo "</tr></form>";
        }

        echo "</table>";

        mysqli_close($con);
    } catch (\Throwable $th) {
        muestraErrores($th);
        mysqli_close($con);
    }
}

function guardaCambios(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,'libreria');
        $isbn = $_REQUEST['dato0'];
        $titulo = $_REQUEST['dato1'];
        $autor = $_REQUEST['dato2'];
        $editorial = $_REQUEST['dato3'];
        $fechaPublicacion = $_REQUEST['dato4'];
        $precio = $_REQUEST['dato5'];

        $sql = "UPDATE libros SET isbn = ?,
        titulo = ?,
        autor = ?,
        editorial = ?,
        fecha_lanzamiento = ?,
        precio = ?  WHERE isbn =?";
        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,'sssssds',$isbn,$titulo,$autor,$editorial,$fechaPublicacion,$precio,$isbn);
        mysqli_stmt_execute($stmt);

        mysqli_close($con);
    } catch (\Throwable $th) {
        muestraErrores($th);
        mysqli_close($con);
    }

}

function borraDato(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,'libreria');
        $isbn = $_REQUEST['dato0'];
        $sql = "DELETE FROM libros WHERE isbn =$isbn";
        mysqli_query($con,$sql);

        mysqli_close($con);
    } catch (\Throwable $th) {
        muestraErrores($th);
        mysqli_close($con);
    }

}

function buscar(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,'libreria');
        $campo = $_REQUEST['opcion'];
        $busqueda = $_REQUEST['busqueda'];
        $sql = "SELECT * FROM libros where $campo = '$busqueda'";
        $resultado = mysqli_query($con,$sql);

        if(mysqli_affected_rows($con) == 0){
            // header("Location: ./leeTabla.php");
            echo "La búsqueda ha devuelto 0 resultados";
        }else{

            echo "<table border='1'>";
            echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha de lanzamiento</th><th>Precio</th><th>Modificar</th><th>Eliminar</th></tr>";
            // echo $resultado;
            while($fila = mysqli_fetch_row($resultado)){
                echo "<tr>";
                echo "<form action='' method='get'>";
                foreach ($fila as $key => $value) {
                    echo "<label for='dato$key'><td><input type='text' name='dato$key' id='dato$key' value='$fila[$key]' readonly></td></label>";
                }
                echo "<td><input type='submit' name='Modificar' id='Modificar' value='Modificar'></td>";
                echo "<td><input type='submit' name='Eliminar' id='Eliminar' value='Eliminar'></td>";
                echo "</form></tr>";
            }

            echo "</table>";
        }

        mysqli_close($con);
    } catch (\Throwable $th) {
        muestraErrores($th);
        mysqli_close($con);
    }
}


function muestraErrores($th){
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
        case 1292:
            echo "Formato de fecha incorrecto";
            break;
        case 1048:
            echo "No puedes establecer los datos como nulos";
            break;
        default:
            echo "Error de la base de datos";
            break;
    }

}
?>