<?php 

function cargaScript(){
   try {
        if(!compruebaBD() == 1049){
            // echo "La base de datos ya está creada";
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
        $con = new mysqli();
        $con -> connect(IP,USER,PASSWORD);
        $script = file_get_contents("./libreria.sql");
        $con->multi_query($script);
        header("Location: ./index.php");
   }catch (\Throwable $th) {
    muestraErrores($th);
    }
}

function compruebaBD(){
    try {
        $con = new mysqli();
        $con->connect(IP,USER,PASSWORD,BD);
    } catch (\Throwable $th) {
        return $th->getCode();
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
        case 1007:
            echo "Problema al crear la bd";
            break;
        default:
            echo "Error de la base de datos";
            break;
    }

    return $th->getCode();
}

?>