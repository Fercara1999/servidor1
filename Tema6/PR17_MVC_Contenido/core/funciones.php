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
            $script = file_get_contents("./webroot/sql/script_libreria.sql");
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

// Muestra el contenido del carrito del usuario que tiene la sesión iniciada, usa la superglobal $_SESSION['usuario']['carrito'] para ello
function muestraCarrito(){
    $isbn = $_SESSION['usuario']->carrito;

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM libros WHERE ISBN = ?';

        $stmt = $con->prepare($sql);
        $stmt->execute([$isbn]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo '<div class="container mt-5 text-center">';
        echo '<h1 class="mb-4">Estás a un paso de comprar...</h1>';
        echo '<div class="card mb-3 mx-auto" style="max-width: 840px;">';
        echo '<div class="row g-0">';
        
        echo '<div class="col-md-4">';
        foreach ($result as $dato => $valor) {
            if ($dato == 'rutaPortada') {
                echo '<img src="'.$valor.'" class="img-fluid" alt="Portada del libro">';
            }
        }
        echo '</div>';
        
        echo '<div class="col-md-8">';
        echo '<div class="card-body">';
        foreach ($result as $dato => $valor) {
            if ($dato != 'borrado') {
                if ($dato == 'titulo') {
                    echo '<h2 class="card-title">'.$valor.'</h2>';
                }
                if ($dato == 'autor') {
                    echo '<p class="card-text"><small class="text-muted">'.$valor.'</small></p>';
                }
                if ($dato == 'unidades'){
                    if($valor > 0 )
                        echo '<p class="card-text"><small>UNIDADES DISPONIBLES: '.$valor.'</small></p>';
                }
                if ($dato == 'sinopsis') {
                    echo '<p class="card-text">'.$valor.'</p>';
                }
                if ($dato == 'precio') {
                    echo '<h4 class="card-title">'.$valor.'€</h4>';
                    $precio = $valor;
                }
            }
        }

        echo '<div class="d-flex justify-content-center mt-3">';
        echo "<form method='post' action=''><input type='submit' class='btn btn-primary me-3' value='Vaciar carrito' id='vaciar' name='vaciar'>";
        echo "<input type='submit' class='btn btn-primary me-3' value='Explorar tienda' id='explorar' name='explorar'></form></div>";
        
        echo '<div class="d-flex justify-content-between align-items-center mt-5">';
        echo "<form method='post' class='d-flex'>";
        echo "<input type='hidden' name='isbn' value='".$_SESSION['usuario']->carrito."' id='isbn'>";
        echo "<input type='hidden' name='precio' value='".$precio."' id='precio'>";
        echo "<label for='cantidad' class='me-3'>Cuantas unidades quieres comprar:</label>";
        echo "<input type='number' class='form-control me-3' id='cantidad' value='1' name='cantidad' style='width: 80px;' min='1'>";
        echo "<input type='submit' class='btn btn-primary' value='Finalizar compra' id='comprar' name='comprar'>";
        echo '</form></div>';

        echo '</div></div></div></div></div>';

    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
}

// Muestra los errores que se producen en las diferentes funciones
function muestraErroresCatch($th){
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
        case 1062:
            echo "Has introducido una clave que ya se encuentra en la base de datos";
            break;
        default:
            echo "Error de la base de datos";
            break;
    }

    return $th->getCode();
}

// Muestra el formulario de cambio de contraseña en el que se pide la contraseña actual y dos veces la nueva contraseña
function verCambioContrasena(){
    try {
        echo "<form method='post'>";

        echo "<br><label for='contrasenaActual' class='form-label me-2 ancho-caja'>Contraseña actual: <input type='password' name='contrasenaActual' id='contrasenaActual' class='form-control'></label><br>";
        echo "<label for='nuevaContrasena' class='form-label me-2 ancho-caja'>Nueva contraseña: <input type='password' name='nuevaContrasena' id='nuevaContrasena' class='form-control'></label><br>";
        echo "<label for='confirmaNuevaContrasena' class='form-label me-2 ancho-caja'>Confirma contraseña nueva: <input type='password' name='confirmaNuevaContrasena' id='confirmaNuevaContrasena' class='form-control'></label><br>";

        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}

function muestraHeaderUsuario(){
    if(sesionIniciada()){
        echo '<form method="post" style="display: inline-block; margin-left: 10px;">';
        echo '<button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;" id="botonHomeUser" name="botonHomeUser">';
        echo 'Bienvenid@ '.$_SESSION['usuario']->usuario;
        echo '</button>';
        echo '<button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;" id="botonCarrito" name="botonCarrito">';
        echo '<img src="webroot/img/carritoVacio.png" alt="" width="70px" height="70px">';
        echo '</button>';
        echo '</form>';
        echo '<br><a href="'.VIEW.'logout.php" class="ms-4">Cierre de sesión</a>';
    }else{
        echo "<form method='post'>";
        echo "<input type='submit' class='btn btn-primary mt-4' value='Login / Registro' name='login' id='login'>";
        echo "</form>";
    }
}

function isAdmin(){
    if($_SESSION['usuario']->rol == 'administrador')
        return true;
    else
        return false;
}

function isModerador(){
    if($_SESSION['usuario']->rol == 'moderador')
        return true;
    else
        return false;
}

// Muestra el mensaje de error almacenado en el campo que le indicamos en el array que le indicamos
function muestraErrores($errores,$name){
    if(isset($errores[$name]))
        echo $errores[$name];
}

// Realiza todas las validaciones a la hora de meter el albarán y devuelve true en caso de que no haya errores y false en caso de que si
function validaAlbaran(&$albaran){
    if(campoVacio('fechaAlbaran'))
        $albaran['fechaAlbaran'] = "El campo de fecha del albarán está vacío";
    else if(compruebaFecha($_REQUEST['fechaAlbaran']))
        $albaran['fechaAlbaran'] = "La fecha introducida es posterior a la fecha actual";
    if(campoVacio('isbn')){
        $albaran['isbn'] = 'El campo ISBN está vacío';
    }else if(!expresionISBN('isbn')){
        $albaran['isbn'] = "El formato del ISBN no es válido";
    }else if(existeISBN('isbn'))
        $albaran['isbn'] = "No existe ningun libro con el ISBN introducido";
    if(campoVacio('cantidad'))
        $albaran['cantidad'] = "El campo cantidad está vacío";
    if(count($albaran) == 0)
        return true;
    else
        return false;
}

// Comprueba que la fecha que se pasa como parámetro sea posterior a la fecha actual
function compruebaFecha($campoFecha){
    $hoy = new DateTime();
    $hoy->format('Y-m-d');

    $fechaHoy = $hoy->format('Y-m-d');

    if($fechaHoy < $campoFecha)
        return true;
    else
        return false;
}

// Expresion para que el ISBN tenga 13 carácteres numéricos
function expresionISBN($campo){
    $patron = '/^\d{13}$/';
    $isbn = $_REQUEST[$campo];

    if(preg_match($patron,$isbn))
        return true;
    else
        return false;
}

// Comprueba si el ISBN introducido pertenece o no a algún libro de la base de datos a la hora de meter un nuevo albarán
function existeISBN($isbn){
    try {
        $con = new PDO(DSN, USER, PASSWORD);
        $isbn = $_REQUEST[$isbn];
    
        $sql = 'SELECT * FROM libros WHERE ISBN = ?';
        $stmt = $con->prepare($sql);
        $stmt->execute(array($isbn));

        $resultadoLibro = $stmt->fetch(PDO::FETCH_ASSOC);

        if($resultadoLibro)
            return false;
        else
            return true;
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
}

// Realiza todas las validaciones a la hora de meter un nuevo libro y devuelve true en caso de que no haya errores y false en caso de que si
function validaLibro(&$libro){
    if(campoVacio('isbn'))
        $libro['isbn'] = "El campo ISBN está vacío";
    else if(!expresionISBN('isbn'))
        $libro['isbn'] = "El formato del ISBN no es válido";
    if(campoVacio('titulo'))
        $libro['titulo'] = "El campo titulo está vacío";
    else if(expresionTitulo())
        $libro['titulo'] = "El formato del titulo no es valido";
    if(campoVacio('autor'))
        $libro['autor'] = "El campo autor está vacío";
    else if(expresionAutor())
        $libro['autor'] = "El formato del autor no es valido";
    if(campoVacio('editorial'))
        $libro['editorial'] = "El campo editorial está vacío";
    else if(expresionAutor())
        $libro['editorial'] = "El formato de la editorial no es valido";
    if(campoVacio('genero'))
        $libro['genero'] = "El campo genero está vacío";
    else if(distinta0())
        $libro['genero'] = "No has seleccionado un genero";
    if(!compruebaAno($_REQUEST['anoPublicacion']))
        $libro['anoPublicacion'] = "El año de publicacion es posterior a la fecha actual";
    if(campoVacio('sinopsis'))
        $libro['sinopsis'] = "El campo sinopsis está vacío";
    if(campoVacio('ruta'))
        $libro['rutaPortada'] = "El campo ruta portada está vacío";
    if(campoVacio('precio'))
        $libro['precio'] = "El campo precio está vacío";
    if(campoVacio('unidades'))
        $libro['unidades'] = "El campo unidades está vacío";
    if(count($libro) == 0)
        return true;
    else
        return false;
}

// Muestra todos los errores que contiene el array que le pasamos por parámetro
function muestraErroresArray($errores){
    echo "<div class='text-danger'>";
    foreach ($errores as $campo => $mensajes) {
        echo $mensajes . "<br>";
    }
    echo "</div>";
}

// Expresion para el titulo, permite mayúsuclas, minúsculas y números
function expresionTitulo(){
    $patron = '/^[A-Za-z0-9\s]+$/';
    $campo = $_REQUEST['titulo'];
    
    if(preg_match($patron, $campo)) {
        return false;
    } else {
        return true;
    }
}

// Expresion para que se incluya al menos el nombre y primer apellido del autor, el segundo apellido es opcional
function expresionAutor(){
    $patron = '/^[A-Z]{1}[a-z]{1,}\s[A-Z]{1}[a-z]{1,}(?:\s[A-Z]{1}[a-z]+)?$/';
    $campo = $_REQUEST['autor'];
    if(preg_match($patron, $campo))
        return false;
    else
        return true;
}

// Función que comprueba que en el select se ha elegido una opción diferente al '0'
function distinta0(){
    if($_REQUEST['genero'] == '0')
        return true;
    else
        return false;
}

// Comprueba que el año que se pasa como parámetro sea posterior a la fecha actual
function compruebaAno($campoFecha) {
    $hoy = new DateTime();
    $anoHoy = (int)$hoy->format('Y');
    $anoCampoFecha = (int)$campoFecha;

    if ($anoHoy >= $anoCampoFecha) {
        return true;
    } else {
        return false;
    }
}
?>