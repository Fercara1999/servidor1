<?php

// Función que incluye una llamada a comrpruebaBD, en caso de que devuelva algo distinto de '7', nos dirá que la BD esá creada
// si no es así, creará un botón de creación de la BD
function cargaScript() {
    try {
        if (compruebaBD() != 7) {
            // echo "Ya existe la BD";
        } else {
            echo "<form action='' method='get'>";
            echo "<input type='submit' value='Crear' id='Crear' name='Crear'>";
            echo "</form>";
        }
    } catch (PDOException $e) {
        muestraErrores($e);
    }
}

// Función que se ejecuta al hacer clic sobre el botón 'Crear', y ejecuta el script de creación de la BD
function insertaScript(){
    $DSN = 'pgsql:host='.IP.';dbname=postgres';
    try {
        $con = new PDO($DSN, USER, PASSWORD);
        $sql = 'create database ' .BD;
        $result = $con->exec($sql);
        $con = new PDO(DSN, USER, PASSWORD);
        $script = file_get_contents("./libreria.sql");
        if ($con->exec($script)) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error en la inserción:";
        }

        unset($con);
   }catch (PDOException $e) {
        muestraErrores($e);
        unset($con);
    }
}

// Función que comprueba la existencia de la BD o devuelve un código de error en caso de que no exista
function compruebaBD() {
    try {
        $con = new PDO(DSN, USER, PASSWORD);
    } catch (PDOException $e) {
        return $e->getCode();
    }
}

// Función que crea un mensaje de error con el codigo y mensaje del mismo, también devuelve el código
function muestraErrores($e){
    echo "<p class='error'>El error " .$e->getMessage(). " da el siguiente mensaje: " .$e->getCode()."<p>";
    return $e->getCode();
}

// Función que crea la tabla con todos los datos de la BD, es el contenido que verá el usuario en la página
function leeTabla(){
    try {
        $con = new PDO(DSN,USER,PASSWORD);
        $sql = 'select * from libros';
        $resultado = $con->query($sql);
        echo "<table border='1'>";
        echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha de lanzamiento</th><th>Precio</th><th>Modificar</th><th>Eliminar</th></tr>";

        while($row = $resultado -> fetch(PDO::FETCH_NUM)){
            echo "<tr>";
            echo "<form action='' method='get'>";
            foreach ($row as $key => $value) {
                echo "<label for='dato$key'><td><input type='text' name='dato$key' id='dato$key' value='$row[$key]' readonly></td></label>";
            }
            echo "<td><input type='submit' name='Modificar' id='Modificar' value='Modificar'></td>";
            echo "<td><input type='submit' name='Eliminar' id='Eliminar' value='Eliminar'></td>";
            echo "</form></tr>";
        }

        echo "</table>";

        unset($con);
    } catch (PDOException $e) {
        // muestraErrores($e);
        unset($con);
    }
}

// Función que recibe e introduce los datos a insertar en la base de datos 
function insertaDatos(){
    try {
        $con = new PDO(DSN,USER,PASSWORD);
    
            $isbn = $_REQUEST['isbn'];
            $titulo = $_REQUEST['titulo'];
            $autor = $_REQUEST['autor'];
            $editorial = $_REQUEST['editorial'];
            $fechaPublicacion = $_REQUEST['fechaLanzamiento'];
            $precio = $_REQUEST['precio'];
    
            $sql = 'insert into libros values(?,?,?,?,?,?)';
            $stmt = $con -> prepare($sql);
        
            $stmt -> execute(array($isbn,$titulo,$autor,$editorial,$fechaPublicacion,$precio));

            unset($con);
    } catch (PDOException $e) {
        muestraErrores($e);
        unset($con);
    }
}

// Función que crea una tabla con el registro que el usuario a seleccionado a través del botón modificar,
// estos campos serán modificables, salvo la clave primaria (ISBN) 
function modificaCampo(){
    try {
        $con = new PDO(DSN,USER,PASSWORD);
        $isbn = $_REQUEST['dato0'];
        $sql = "SELECT * FROM libros where isbn = ?";
        $stmt = $con -> prepare($sql);
        $stmt -> execute(array($isbn));
        while($fila = $stmt->fetch(PDO::FETCH_NUM)){
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

        unset($con);
    } catch (PDOException $e) {
        muestraErrores($e);
        unset($con);
    }
}

// Función que elimina el registro seleccionado por el usuario, se ejecuta al hacer clic sobre el botón 'Eliminar'
function borraDato(){
    try {
        $con = new PDO(DSN,USER,PASSWORD);
        $isbn = $_REQUEST['dato0'];
        $sql = "DELETE FROM libros WHERE isbn =?";
        $stmt = $con -> prepare($sql);
        $stmt -> execute(array($isbn));

        unset($con);
    } catch (PDOException $e) {
        muestraErrores($e);
        unset($con);
    }

}

// Función que inserta en la BD un registro con los datos que son pasados por el formulario y después de validar que no contiene errores de sintaxis
function guardaCambios(){
    try {
        $con = new PDO(DSN,USER,PASSWORD);
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
            $stmt = $con -> prepare($sql);
            $stmt -> execute(array($isbn,$titulo,$autor,$editorial,$fechaPublicacion,$precio,$isbn));
        }else
            echo "Error de los datos a insertar";

        unset($con);
    } catch (PDOException $e) {
        muestraErrores($e);
        unset($con);
    }

}

// Función que busca según el campo que el usuario indique, el valor que quiera
function buscar(){
    try {
        $con = new PDO(DSN,USER,PASSWORD);
        $campo = $_REQUEST['opcion'];
        $busqueda = $_REQUEST['busqueda'];
        $sql = "SELECT * FROM libros where $campo = ?";
        $stmt = $con -> prepare($sql);
        $resultado = $stmt -> execute(array($busqueda));
        if($stmt->rowCount() == 0){
            echo "<p class='error'>La búsqueda ha devuelto 0 resultados</p><br>";
        }else{
            echo "<table border='1'>";
            echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha de lanzamiento</th><th>Precio</th><th>Modificar</th><th>Eliminar</th></tr>";
            while($fila = $stmt->fetch(PDO::FETCH_NUM)){
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

        unset($con);
    } catch (PDOException $e) {
        muestraErrores($e);
        unset($con);
    }
}

function isUser(){
    if($_SERVER['PHP_AUTH_USER']==USUARIO &&
    hash('sha256',$_SERVER['PHP_AUTH_PW']) == PASSUSU)
    {
       return true;   
    }
    return false;
}

function isAdmin(){
    if($_SERVER['PHP_AUTH_USER']==ADMIN &&
    hash('sha256',$_SERVER['PHP_AUTH_PW']) == PASSADMIN)
    {
       return true;   
    }
    return false;
}

function cerrar(){
    die('Cerrarda sesion');
    header("Location: ./index.php");
}


?>