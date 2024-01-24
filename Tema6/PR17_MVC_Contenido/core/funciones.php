<?php

// require("./config/configBD.php");

// FUNCIONES PARA LA EJECUCIÓN DEL SCRIPT

// Recibe la respuesta de si existe o no la BD y si no existe, crea un boton que al pulsarlo ejecuta la funcion de ejecución del script
function cargaScript(){
    try {
            if(compruebaBD() != 1049){
            //  echo "La base de datos ya está creada";
            }else{
            echo "<div style='text-align:center;'>";
            echo "<form action='' method='post'>";
            echo "<input type='submit' class='btn btn-danger btn-lg mb-2' value='Crear base de datos' id='Crear' name='Crear'>";
            echo "</form>";
            echo "</div>";
            }
    }catch (\Throwable $th) {
        return $th->getCode();
        }
    }
     
    // Ejecuta el script de creación de la base de datos
    function insertaScript(){
        try {
            $con = new mysqli();
            $con -> connect(IP,USER,PASSWORD);
            $script = file_get_contents("./script_libreria.sql");
            if ($con->multi_query($script)) {
                // Tuve que redirigir con JS ya que con PHP no se actualizaba la página
                echo "<script>window.location.href = './index.php';</script>";
                exit;
            } else {
                echo "Error en la inserción: " . $con->error;
            }
    }catch (\Throwable $th) {
        return $th->getCode();
        }
    }
    
    // Comprueba si existe o no la base de datos y devuelve un mensaje de que existe la BD en caso de que si, y el código del error en caso de que no
    function compruebaBD(){
        try {
            $con = new mysqli();
            $con->connect(IP,USER,PASSWORD,BD);
            return "existe";
        } catch (\Throwable $th) {
            return $th->getCode();
        }
    }

    // Comprueba si la sesión está o no iniciada
    function sesionIniciada(){
        if(!isset($_SESSION['usuario'])){
            $_SESSION['error'] = "No tiene la sesión iniciada";
            return false;
        }else
            return true;
    }

// FUNCIONES GENERALES

// Comprueba si he ha pulsado o no un botón
function pulsadoBoton($boton){
    if(isset($_REQUEST[$boton]))
        return true;
    else
        return false;
}

// Recuerda el valor de un campo si no se ha podido llevar a cabo la ejecución del formulario
function recuerda($campo){
    if(!empty($_REQUEST[$campo])){
        echo $_REQUEST[$campo];
    }
}

// Vacida si el formulario de registro es correcto
function validaRegistro(&$arrayError){
    if(campoVacio('usuario'))
        $arrayError['usuario'] = "El campo usuario está vacio";
    if(campoVacio('contrasena'))
        $arrayError['contrasena'] = "El campo contraseña está vacío";
    else if(!expresionContrasena('contrasena'))
        $arrayError['contrasena'] = "El campo contraseña no cumple con los requisitos necesarios";
    if(campoVacio('repContrasena'))
        $arrayError['repContrasena'] = "El campo repite contraseña está vacío";
    else if(!expresionContrasena('repContrasena'))
        $arrayError['repContrasena'] = "El campo confirma contraseña no cumple con los requisitos necesarios";
    else if(!mismaContrasena($_REQUEST['contrasena'],$_REQUEST['repContrasena']))
        $arrayError['repContrasena'] = "Las contraseñas no coinciden";
    if(!expresionCorreo())
        $arrayError['correo'] = "El correo no está en un formato correcto";
    if(campoVacio('fechaNacimiento'))
        $arrayError['fechaNacimiento'] = "El campo fecha de naacimiento está vacio";
    else if(!compruebaEdad($_REQUEST['fechaNacimiento']))
        $arrayError['fechaNacimiento'] = "Debes tener al menos 12 años para poder registrarte";
    if(count($arrayError) == 0)
        return true;
    else
        return false;
}

// Muestra el mensaje de error teniendo en cuenta el array de errores que le pasamos y el campo del array
function muestraError(&$array,$campo){
    if(isset($array[$campo]))
        echo $array[$campo];
}

function campoVacio($campo){
    if(empty($_REQUEST[$campo]))
        return true;
    else
        return false;
}

// Comprueba si la contraseña introducida tiene al menos 8 carácteres, entre ellos 1 número, 1 minúscula y 1 mayúscula
function expresionContrasena($campo){
    $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
    $texto = $_REQUEST[$campo];
    
    if(preg_match($patron,$texto))
    return true;
else
return false;
}

// Comprueba si el correo introducido tiene el formato correcto
function expresionCorreo(){
    $patron = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $texto = $_REQUEST['correo'];
    
    if(preg_match($patron,$texto))
    return true;
else
return false;
}

// Compara las contraseñas del campo 'contraseña' y 'confirma contraseña' y devuelve true si son iguales y false si no
function mismaContrasena($contra,$repContra){
    $contrasena = $contra;
    $confContrasena = $repContra;
    
    if($contrasena == $confContrasena)
    return true;
else
return false;
}

// Comprueba que la fecha de nacimiento con la que se registra el usuario sea mayor a 12 años
function compruebaEdad($campoFecha) {
    $hoy = new DateTime();
    $fechaNacimiento = new DateTime($campoFecha);

    $edad = $hoy->format('Y') - $fechaNacimiento->format('Y');

    if ($edad >= 12) {
        return true;
    } else {
        return false;
    }
}


?>