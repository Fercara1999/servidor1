<?php

function cargaScript(){
   try {
        if(compruebaBD() != 7){
        }else{
            echo "<form action='' method='get'>";
            echo "<input type='submit' value='Crear' id='Crear' name='Crear'>";
            echo "</form>";
        }
   }catch (\Throwable $th) {
    muestraErrores($th);
    }
}

function insertaScript(){
    try {
        $con = new PDO(DSNS,USER,PASSWORD);
        $script = file_get_contents("./libreria.sql");
        if ($con->exec($script)) {
            echo "Datos insertados correctamente.";
        } else {
            // echo "Error en la inserción: " . $con->error;
        }
   }catch (\Throwable $th) {
    muestraErrores($th);
    }
}

function compruebaBD(){
    try {
        $con = new PDO(DSN,USER,PASSWORD);
    } catch (PDOException $e) {
        return $e->getCode();
    }
}

function muestraErrores($e){
    switch ($e->getCode()){
        case 7:
            echo "La base de datos no existe";
            break;
        case 2002:
            echo "La IP de acceso a la BD es incorrecta";
            break;
        case 1045:
            echo "Usuario o contraseña incorrectos";
            break;
        case 1049:
            // echo "Error al conectarse a la base de datos indicada";
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
        case 1007:
            echo "Problema al crear la bd";
            break;
        default:
            echo "Error de la base de datos";
            break;
    }

    return $e->getCode();
}

function leeTabla(){
    try {
        $con = new PDO(DSN,USER,PASSWORD);
        $sql = 'SELECT * FROM libros';
        $resultado = $con->query($sql);
        echo "<table border='1'>";
        echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha de lanzamiento</th><th>Precio</th><th>Modificar</th><th>Eliminar</th></tr>";

        while($row = $resultado -> fetch(PDO::FETCH_BOTH)){
            echo "<tr>";
            echo "<form action='' method='get'>";
            foreach ($row as $key => $value) {
                echo "<label for='dato$key'><td><input type='text' name='dato$key' id='dato$key' value='$fila[$key]' readonly></td></label>";
            }
            echo "<td><input type='submit' name='Modificar' id='Modificar' value='Modificar'></td>";
            echo "<td><input type='submit' name='Eliminar' id='Eliminar' value='Eliminar'></td>";
            echo "</form></tr>";
        }

        echo "</table>";

        unset($con);
    } catch (PDOException $e) {
        echo $e->getCode();
    }
}

function insertaDatos(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,BD);
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

function modificaCampo(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,BD);
        $isbn = $_REQUEST['dato0'];
        $sql = "SELECT * FROM libros where isbn = ?";
        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,'i',$isbn);
        $resultado = mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        // echo $resultado;
        while($fila = mysqli_fetch_row($resultado)){
            echo "<table border='1'>";
        echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha de lanzamiento</th><th>Precio</th><th>Guardar Cambios</th></tr>";
            echo "<tr>";
            echo "<form action='' method='get'>";
            foreach ($fila as $key => $value) {
                if($key == 0)
                    echo "<label for='dato$key'><td><input type='text' name='dato$key' id='dato$key' value='$fila[$key]' readonly></td></label>";
                else
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

function borraDato(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,BD);
        $isbn = $_REQUEST['dato0'];
        $sql = "DELETE FROM libros WHERE isbn =?";
        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,'i',$isbn);
        mysqli_stmt_execute($stmt);

        mysqli_close($con);
    } catch (\Throwable $th) {
        muestraErrores($th);
        mysqli_close($con);
    }

}

function guardaCambios(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,BD);
        $erroresGuarda = [];

        if(validaFormularioGuarda($erroresGuarda)){

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
        }else
            echo "Error de los datos a insertar";

        mysqli_close($con);
    } catch (\Throwable $th) {
        muestraErrores($th);
        mysqli_close($con);
    }

}

function buscar(){
    try {
        $con = mysqli_connect(IP,USER,PASSWORD,BD);
        $campo = $_REQUEST['opcion'];
        $busqueda = $_REQUEST['busqueda'];
        $sql = "SELECT * FROM libros where $campo = ?";
        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,'s',$busqueda);
        $resultado = mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if(mysqli_affected_rows($con) == 0){
            echo "La búsqueda ha devuelto 0 resultados<br>";

        }else{

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
        }

        mysqli_close($con);
    } catch (\Throwable $th) {
        muestraErrores($th);
        mysqli_close($con);
    }
}

?>