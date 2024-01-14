<?php

require("./confBD.php");

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
        $con -> connect(IP,USERADMIN,PASSWORDADMIN);
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
        $con->connect(IP,USERADMIN,PASSWORDADMIN,BD);
        return "existe";
    } catch (\Throwable $th) {
        return $th->getCode();
    }
}

// FUNCIONES DE VALIDACIÓN DE FORMULARIOS

// Comprueba si un campo está o no vacío
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

// Valida si los datos introducidos en el formulario de inicio de sesión son correctos e inicia la sesión del usuario
function validaUsuario($user,$pass){
    try {
        $con = new PDO(DSN,USER,PASSWORD);
        $sql = "select * from usuarios where usuario = ? and contrasena = ?";
        $stmt = $con->prepare($sql);
        $pass = sha1($pass);
        $stmt->execute([$user,$pass]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario){
            return $usuario;
        }
        return false;
    } catch (PDOException $e) {
        muestraErroresCatch($e);
    } finally{
        unset($con);
    }
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

// Expresion para que el ISBN tenga 13 carácteres numéricos
function expresionISBN($campo){
    $patron = '/^\d{13}$/';
    $isbn = $_REQUEST[$campo];

    if(preg_match($patron,$isbn))
        return true;
    else
        return false;
}

// Muestra el mensaje de error almacenado en el campo que le indicamos en el array que le indicamos
function muestraErrores($errores,$name){
    if(isset($errores[$name]))
        echo $errores[$name];
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

// Expresión para que el nombre de la editorialcomience por mayúscula
function expresionEditorial(){
    $patron = '/^[A-Z]{1}[a-zA-Z\s]*$/';
    $campo = $_REQUEST['editorial'];
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

// FUNCIONES GENERALES

// Comprueba si he ha pulsado o no un botón
function pulsadoBoton($boton){
    if(isset($_REQUEST[$boton]))
        return true;
    else
        return false;
}

// Comprueba si la sesión está o no iniciada
function sesionIniciada(){
    if(!isset($_SESSION['usuario']['usuario'])){
        $_SESSION['error'] = "No tiene la sesión iniciada";
        return false;
    }else
        return true;
}

// FUNCIONES DE CONSULTA, INSERCIÓN, MODIFICACIÓN O BORRADO EN LA BASE DE DATOS

// En caso de que el formulario de registro haya sido correcto, esta función realiza la inserción del usuarios en la tabla correspondiente en la BD
function insertaUsuario(){

    try{
        $con = mysqli_connect(IP,USER,PASSWORD,BD);

        $usuario = $_REQUEST['usuario'];
        $contrasena = sha1($_REQUEST['contrasena']);
        $correo = $_REQUEST['correo'];
        $fechaNacimiento = $_REQUEST['fechaNacimiento'];

        $sql = 'insert into usuarios(usuario,contrasena,correo,fechaNacimiento) values(?,?,?,?)';
        $stmt = mysqli_prepare($con,$sql);

        mysqli_stmt_bind_param($stmt,'ssss',$usuario,$contrasena,$correo,$fechaNacimiento);
        mysqli_stmt_execute($stmt);

        mysqli_close($con);

        return true;

    }catch (\Throwable $th){
        mysqli_close($con);
        muestraErroresCatch($th);
    }
}

// Muestra los datos del usuario que se almacenan en la tabla usuarios
function verDatos(){
    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $usuario = $_SESSION['usuario']['usuario'];
        $sql = 'SELECT * FROM usuarios WHERE usuario = ?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$usuario]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "<form method='post'>";
            foreach ($result as $datos => $valores) {
                if($datos == 'usuario') {
                    echo "<label for='$datos' class='form-label me-2 ancho-caja'>".$datos."<input type='text' name='$datos' id ='$datos' class='form-control' value='$valores' readonly></label><br>";
                }else if($datos == 'correo'){
                    echo "<label for='$datos' class='form-label me-2 ancho-caja'>".$datos."<input type='email' name='$datos' id ='$datos' class='form-control' value='$valores'></label><br>";
                }else if($datos == 'fechaNacimiento'){
                    echo "<label for='$datos' class='form-label me-2 ancho-caja'>".$datos."<input type='date' name='$datos' id ='$datos' class='form-control' value='$valores'></label><br>";
                }
            }
        } else {
            echo 'No se encontraron datos para el usuario.';
        }
        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}

// Se ejecuta al abrir la página principal y muestra en cards los datos de todos los libros de la tabla libros
function verLibros(){
    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM libros WHERE borrado = false';
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="row g-9">';

        foreach ($result as $valores) {
            echo '<div class="col-md-4">';
            echo '<div class="card">';
            echo '<div class="row g-0">';
            
            echo '<div class="col-6">';
            foreach ($valores as $dato => $valor) {
                if ($dato != 'borrado') {
                    if ($dato == 'rutaPortada') {
                        echo '<img src="'.$valor.'" class="img-fluid w-100" alt="card-horizontal-image" width="150px">';
                    }
                }
            }
            echo '</div>';
            
            echo '<div class="col-6">';
            echo '<div class="card-body">';
            foreach ($valores as $dato => $valor) {
                
                echo "<form method='post' action='./carrito.php'>";
                if ($dato != 'borrado') {
                    if ($dato == 'ISBN') {
                        echo "<input type='hidden' name='isbn' value='$valor' id='isbn'>";
                    }
                    if ($dato == 'titulo') {
                        echo '<h5 class="card-title">'.$valor.'</h5>';
                    }
                    if ($dato == 'autor') {
                        echo '<p class="card-text"><small class="text-muted">'.$valor.'</small></p>';
                    }
                    if ($dato == 'sinopsis') {
                        echo '<p class="card-text">'.$valor.'</p>';
                    }
                    if ($dato == 'precio') {
                        echo '<h5 class="card-title">'.$valor.'€</h5>';
                    }
                }
            }
            echo "<input type='submit' class='btn btn-primary' value='Añadir al carrito' id='anadir' name='anadir'>";
            echo "</form>";
            echo "<form method='get' action='listaDeseos.php'>";
            echo "<input type='hidden' name='isbn' value='{$valores['ISBN']}'>";
            echo "<button style='border: none; background: none; padding: 0;'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/1200px-Heart_coraz%C3%B3n.svg.png' style='width:30px' name='deseo' id='deseo'>";
            echo "</button></form><br><br>";

            echo '</div></div>';
            
            echo '</div></div></div>';
        }

        echo '</div>';
        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}

// Actualiza los datos del usuario según los haya introducido el propio usuario
function actualizarDatos(){
    try {
        $con = new PDO(DSN, USER, PASSWORD);
        $usuario = $_SESSION['usuario']['usuario'];
        
        $correo = $_REQUEST['correo'];
        $fecha = $_REQUEST['fechaNacimiento'];
        if(expresionCorreo() && campoVacio($fecha)){
            $sql = 'UPDATE usuarios SET correo = ?, fechaNacimiento = ? WHERE usuario = ?';
            $stmt = $con->prepare($sql);
    
            $stmt->execute(array($correo,$fecha,$usuario));
            echo "Datos actualizados con exito";
        }else{
            echo "No se han podido modificar los datos";
        }

    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
}

// Muestra el formulario de cambio de contraseña en el que se pide la contraseña actual y dos veces la nueva contraseña
function verCambioContrasena(){
    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $usuario = $_SESSION['usuario']['usuario'];
        
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

// Valida que los datos del cambio de contraseña son correctos
function validaCambioContrasena(){
    $actual = $_REQUEST['contrasenaActual'];
    $nueva = $_REQUEST['nuevaContrasena'];
    $confirmaNueva = $_REQUEST['confirmaNuevaContrasena'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $usuario = $_SESSION['usuario']['usuario'];
        $sql = 'SELECT contrasena FROM usuarios WHERE usuario = ?';

        $stmt = $con->prepare($sql);
        $stmt->execute([$usuario]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if ($result['contrasena'] == sha1($actual)) {
                if (mismaContrasena($nueva, $confirmaNueva)) {
                    if (expresionContrasena('nuevaContrasena')) {
                        $sql = 'UPDATE usuarios SET contrasena = ? WHERE usuario = ?';
                        $stmt = $con->prepare($sql);
                        $stmt->execute(array(sha1($nueva), $usuario));
                        echo "Contraseña actualizada correctamente";
                    } else {
                        echo "La nueva contraseña no cumple con los requisitos mínimos";
                        exit;
                    }
                } else {
                    echo "Las contraseñas introducidas no coinciden";
                    exit;
                }
            } else {
                echo "La contraseña introducida no es la que tienes en estos momentos";
            }
        }
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
}

// Muestra el contenido del carrito del usuario que tiene la sesión iniciada, usa la superglobal $_SESSION['usuario']['carrito'] para ello
function muestraCarrito(){
    $isbn = $_SESSION['usuario']['carrito'];

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
        echo "<a href='./index.php'><input type='submit' class='btn btn-primary me-3' value='Explorar tienda' id='explorar' name='explorar'></a>";
        echo "<form method='post' action='./carrito.php'><input type='submit' class='btn btn-primary' value='Vaciar carrito' id='vaciar' name='vaciar'></form></div>";
        
        echo '<div class="d-flex justify-content-between align-items-center mt-5">';
        echo "<form method='post' class='d-flex'>";
        echo "<input type='hidden' name='isbn' value='".$_SESSION['usuario']['carrito']."' id='isbn'>";
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

// Inserta el pedido realizado por el usuario en la tabla pedidos
function finalizarCompra() {
    if (empty($_SESSION['usuario']['id_usuario'])) {
        echo '<div class="container mt-5 text-center">';
        echo '<h1 class="mb-4">Debes estar registrado para finalizar la compra</h1></div>';
    } else {
        $usuario = $_SESSION['usuario']['id_usuario'];

        $hoy = new DateTime();
        $fechaHoy = $hoy->format('Y-m-d');
        
        $libro = $_REQUEST['isbn'];
        $cantidad = $_REQUEST['cantidad'];

        try {
            $con = new PDO(DSN, USER, PASSWORD);
            $con->beginTransaction();

            //Obtiene las unidades de las que disponemos para ese libro
            $sqlUnidades = 'SELECT unidades FROM libros WHERE isbn = ?';
            $stmtUnidades = $con->prepare($sqlUnidades);
            $stmtUnidades->execute([$libro]);
            $unidadesDisponibles = $stmtUnidades->fetchColumn();

            // Si hay más unidades que cantidad nos pide, entra en este if
            if ($cantidad <= $unidadesDisponibles) {
                // Resta a las unidades las que le estamos pidiendo
                $sqlActualizarUnidades = 'UPDATE libros SET unidades = unidades - ? WHERE isbn = ?';
                $stmtActualizarUnidades = $con->prepare($sqlActualizarUnidades);
                $stmtActualizarUnidades->execute([$cantidad, $libro]);

                $precioTotal = $_REQUEST['precio'] * $cantidad;
                // Inserta el pedido en la bd
                $sqlInsertarPedido = 'INSERT INTO pedidos(id_usuario, fechaPedido, ISBN, cantidad, precioTotal) VALUES (?, ?, ?, ?, ?)';
                $stmtInsertarPedido = $con->prepare($sqlInsertarPedido);
                $stmtInsertarPedido->execute([$usuario, $fechaHoy, $libro, $cantidad, $precioTotal]);

                $_SESSION['usuario']['carrito'] = "";
                $con->commit();
                unset($con);

                echo '<div class="text-center mt-2 mx-auto"><img src="./imagenes/compraRealizada.gif" width="300px"></div>';
            } else {
                echo '<div class="container mt-5 text-center">';
                echo '<h1 class="mb-4">No hay suficientes unidades disponibles para realizar la compra</h1></div>';
            }
        } catch (\Throwable $th) {
            $con->rollBack();
            muestraErroresCatch($th);
        }
    }
}

// Muestra los pedidos realizados por el usuario que ha iniciado la sesión
function misPedidos(){
    echo '<br><h1 class="mb-1">Mis pedidos</h1>';
    $usuario = $_SESSION['usuario']['id_usuario'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM pedidos WHERE id_usuario = ? and borrado = false';
        $stmt = $con->prepare($sql);

        $stmt->execute(array($usuario));
        
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

            echo '<div class="col">';
            echo '<div class="card">';
            echo '<div class="row g-0">';
            
            echo '<div class="col-md-2">';

            echo "<form method='post' action='./creaFactura.php'>";
            foreach ($result as $datos => $valores) {
                if($datos == 'ISBN'){
                    $sqln = 'SELECT * FROM libros WHERE ISBN = ?';
                    $stmtn = $con->prepare($sqln);
                    $stmtn->execute(array($valores));
                    $resultado = $stmtn->fetch(PDO::FETCH_ASSOC);
                    foreach ($resultado as $datosResultado => $valoresResultado){
                        if($datosResultado == 'rutaPortada'){
                            echo "<input type='hidden' name='$datosResultado' value='$valoresResultado'>";
                            echo '<img src="'.$valoresResultado.'" class="img-fluid h-100" alt="card-vertical-image" width="250px">';
                        }
                    }
                }
            }
            echo '</div>';
            
            echo '<div class="col-md-6">';
            echo '<div class="card-body">';
            echo "<input type='hidden' name='usuario' value='".$_SESSION['usuario']['usuario']."'>";
            echo "<input type='hidden' name='correo' value='".$_SESSION['usuario']['correo']."'>";
            echo "<input type='hidden' name='fechaNacimiento' value='".$_SESSION['usuario']['fechaNacimiento']."'>";
            foreach ($result as $datos => $valores) {
                if($datos == 'idPedido') {
                    echo "<input type='hidden' name='$datos' value='$valores'>";
                    echo "<h1 class='card-title'>Número de pedido: $valores</h1>";
                }else if($datos == 'fechaPedido'){
                    echo "<input type='hidden' name='$datos' value='$valores'>";
                    echo "<h6 class='card-subtitle text-muted mt-2'>Fecha de pedido: $valores</h6>";
                }else if($datos == 'ISBN'){
                    $sqln = 'SELECT * FROM libros WHERE ISBN = ?';
                    $stmtn = $con->prepare($sqln);
                    $stmtn->execute(array($valores));
                    $resultadoLibro = $stmtn->fetch(PDO::FETCH_ASSOC);
                    foreach($resultadoLibro as $datosLibro => $valoresLibro){
                        if($datosLibro == 'titulo'){
                            echo "<input type='hidden' name='$datosLibro' value='$valoresLibro'>";
                            echo "<h2 class='mt-4'>Título pedido: $valoresLibro</h2>";
                        }if($datosLibro == 'precio'){
                            echo "<div class='d-flex align-items-center'>";
                            echo "<input type='hidden' name='$datosLibro' value='$valoresLibro'>";
                            echo "<h4 class='mt-3 me-4'>Precio libro: ".$valoresLibro."€</h4>";
                        }
                    }
                }else if($datos == 'cantidad'){
                    echo "<input type='hidden' name='$datos' value='$valores'>";
                    echo "<h4 class='mt-3 me-4'>Cantidad pedida: $valores</h4>";
                }else if($datos == 'precioTotal'){
                    echo "<input type='hidden' name='$datos' value='$valores'>";
                    echo "<h4 class='mt-3'>Importe total: ".$valores."€</h4>";
                    echo "</div>";
                }
            }
            echo '</div>';
            echo "<input type='submit' name='factura' id='factura' class='btn btn-primary me-3' value='Descargar factura'>";
            echo '</div>';
            
            echo '</div>';
            echo '</div>';
            echo "</form>";
        }
        unset($con);

    } catch (\Throwable $th) {
        $con->rollBack();
        muestraErroresCatch($th);
    }
}

// Inserta un nuevo albarán en la tabla correspondiente
function nuevoAlbaran(){
    $fecha = $_REQUEST['fechaAlbaran'];

    $isbn = $_REQUEST['isbn'];
    $cantidad = $_REQUEST['cantidad'];

    $usuario = $_SESSION['usuario']['id_usuario'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);
        $con->beginTransaction();

        $sql = 'INSERT INTO albaranes(fechaAlbaran, ISBN_libro, cantidadIncremento, id_usuario) VALUES (?,?,?,?)';
        $stmt = $con->prepare($sql);

        $stmt->execute(array($fecha,$isbn,$cantidad,$usuario));

        $sql = 'UPDATE libros SET unidades = unidades + ? WHERE isbn = ?';
        $stmt = $con->prepare($sql);

        $stmt->execute(array($cantidad,$isbn));
        $con->commit();

        echo "Albarán introducido con exito";

        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
}

// Inserta un nuevo libro en la tabla correspondiente
function nuevoLibro(){
    $isbn = $_REQUEST['isbn'];
    $titulo = $_REQUEST['titulo'];
    $autor = $_REQUEST['autor'];
    $editorial = $_REQUEST['editorial'];
    $genero = $_REQUEST['genero'];
    $anoPublicacion = $_REQUEST['anoPublicacion'];
    $sinopsis = $_REQUEST['sinopsis'];
    $rutaPortada = $_REQUEST['ruta'];
    $precio = $_REQUEST['precio'];
    $unidades = $_REQUEST['unidades'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'INSERT INTO libros(ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades) VALUES (?,?,?,?,?,?,?,?,?,?)';
        $stmt = $con->prepare($sql);

        $stmt->execute(array($isbn,$titulo,$autor,$editorial,$genero,$anoPublicacion,$sinopsis,$rutaPortada,$precio,$unidades)); 

        echo "Libro introducido con exito";
        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
}

// Consulta a la BD para ver todos los albaranes introducidos, en caso de ser administradores, incluye un boton de modificar y borrar
function verAlbaranes(){
    $usuario = $_SESSION['usuario']['usuario'];
    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM albaranes where borrado = false';
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<h1>Albaranes</h1>";
        echo "<table class='table table-hover'>";
        echo "<tr><th>Codigo albarán</th><th>Fecha albarán</th><th>ISBN</th><th>Cantidad</th><th>ID usuario</th></tr>";

        foreach ($result as $valores) {
            echo '<tr>';
            echo "<form method='post' action='./modificando.php'>";
            
            foreach ($valores as $campo => $valor) {
                if($campo != 'borrado'){
                    echo "<input type='hidden' name='$campo' value='$valor'>";
                    echo '<td>'.$valor.'</td>';
                }
            }
            if($_SESSION['usuario']['rol'] == 'administrador'){     
                echo '<td><input type="submit" class="bg-warning btn" value="Modificar" name="modificarAlbaran" id="modificarAlbaran"</td>';
                echo '<td><input type="submit" class="bg-danger btn" value="Borrar" name="borrarAlbaran" id="borrarAlbaran"</td></form>';
            }

            echo "</tr>";
        }

        echo "</table>";

    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}

// Consulta a la BD para ver todos los pedidos introducidos, en caso de ser administradores, incluye un boton de modificar y borrar
function verPedidos(){
    $usuario = $_SESSION['usuario']['usuario'];
    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM pedidos WHERE borrado = false';
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<h1>Pedidos</h1>";
        echo "<table class='table table-hover'>";
        echo "<tr><th>ID pedido</th><th>ID usuario</th><th>Fecha pedido</th><th>ISBN</th><th>Cantidad</th><th>Precio total</th></tr>";

        foreach ($result as $valores) {
            echo '<tr>';
            echo "<form method='post' action='./modificando.php'>";
            
            foreach ($valores as $campo => $valor) {
                if($campo != 'borrado'){
                    echo "<input type='hidden' name='$campo' value='$valor'>";
                    echo '<td>'.$valor.'</td>';
                }
            }
            if($_SESSION['usuario']['rol'] == 'administrador'){
                echo '<td><input type="submit" class="bg-warning btn" value="Modificar" name="modificarPedido" id="modificarPedido"</td>';
                echo '<td><input type="submit" class="bg-danger btn" value="Borrar" name="borrarPedido" id="borrarPedido"</td></form>';
            }
            echo "</tr>";
        }

        echo "</table>";

    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}

// Consulta a la BD para ver todos los libros introducidos, en caso de ser administradores, incluye un boton de modificar y borrar
function verProductos(){
    $usuario = $_SESSION['usuario']['usuario'];
    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM libros WHERE borrado = false';
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<h1>Libros</h1>";
        echo "<table class='table table-hover'>";
        echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Género</th><th>Año de publicación</th><th>Sinópsis</th><th>Ruta portada</th><th>Precio</th><th>Unidades</th></tr>";

        foreach ($result as $valores) {
            echo '<tr>';
            echo "<form method='post' action='./modificando.php'>";
            
            foreach ($valores as $campo => $valor) {
                if($campo != 'borrado'){
                    echo "<input type='hidden' name='$campo' value='$valor'>";
                    echo '<td>'.$valor.'</td>';
                }
            }
            if($_SESSION['usuario']['rol'] == 'administrador'){
                echo '<td><input type="submit" class="bg-warning btn" value="Modificar" name="modificarProducto" id="modificarProducto"</td>';
                echo '<td><input type="submit" class="bg-danger btn" value="Borrar" name="borrarProducto" id="borrarProducto"</td></form>';
            }
            echo "</tr>";
        }

        echo "</table>";
        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}

// Abre un nuevo menú con los datos del albarán seleccionado, listo para modificar
function modificarAlbaran(){
    $albaran = $_REQUEST['codigoAlbaran'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM albaranes WHERE codigoAlbaran = ? and borrado = false';
        $stmt = $con->prepare($sql);
        $stmt->execute([$albaran]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "<table class='table table-hover'>";
        echo "<tr><th>Codigo albarán</th><th>Fecha albarán</th><th>ISBN</th><th>Cantidad</th><th>ID usuario</th></tr>";

        echo '<tr>';
        echo "<form method='post'>";
        foreach ($result as $campo => $valores) {
            if($campo == 'codigoAlbaran'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
            }else if($campo == 'id_usuario'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
            }else if($campo == 'fechaAlbaran')
                echo '<td><input type="date" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
            else if($campo == 'cantidadIncremento')
                echo '<td><input type="number" class="form-control" name="'.$campo.'" value="'.$valores.'" min="1"></td>';
            else if($campo != 'borrado'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
            }
        }

            echo "<td><input type='submit' class='btn bg-success' value='Guardar cambios' name='guardarCambiosAlbaran'></td></form>";

        echo "</tr>";
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }

}

// Abre un nuevo menú con los datos del pedido seleccionado, listo para modificar
function modificarPedido(){
    $pedido = $_REQUEST['idPedido'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM pedidos WHERE idPedido = ? and borrado = false';
        $stmt = $con->prepare($sql);
        $stmt->execute([$pedido]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "<table class='table table-hover'>";
        echo "<tr><th>ID pedido</th><th>ID usuario</th><th>Fecha pedido</th><th>ISBN</th><th>Cantidad</th><th>Precio total</th></tr>";

        echo '<tr>';
        echo "<form method='post'>";
        foreach ($result as $campo => $valores) {
            if($campo == 'idPedido'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
            }else if($campo == 'id_usuario'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
            }else if($campo == 'fechaPedido')
                echo '<td><input type="date" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
            else if($campo == 'ISBN')
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
            else if($campo == 'cantidad'){
                echo '<td><input type="number" class="form-control" name="'.$campo.'" value="'.$valores.'" min="1"></td>';
            }else if ($campo == 'precioTotal'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
            }else if($campo != 'borrado'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
            }
        }

            echo "<td><input type='submit' class='btn bg-success' value='Guardar cambios' name='guardarCambiosPedido'></td></form>";

        echo "</tr>";
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }

}

// Abre un nuevo menú con los datos del libro seleccionado, listo para modificar
function modificarLibro(){
    $producto = $_REQUEST['ISBN'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM libros WHERE isbn = ? and borrado = false';
        $stmt = $con->prepare($sql);
        $stmt->execute([$producto]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "<table class='table table-hover'>";
        echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Género</th><th>Año de publicación</th><th>Sinópsis</th><th>Ruta portada</th><th>Precio</th><th>Unidades</th></tr>";

        echo '<tr>';
        echo "<form method='post'>";

        foreach ($result as $campo => $valores) {
            if($campo == 'ISBN'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
            } else if($campo == 'titulo' || $campo == 'autor' || $campo == 'editorial' || $campo == 'sinopsis' || $campo == 'rutaPortada'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
            } else if($campo == 'genero'){
                echo '<td><select name="genero" class="form-control" id="genero">';
                echo '<option value="0">Selecciona una opción</option>';
                $generos = array("aventuras", "ficcion", "policiaco", "terror", "misterio", "romantica", "humor", "poesia", "mitologia", "teatro", "cuento", "no_ficcion");

                foreach ($generos as $opcion) {
                    $selected = ($valores == $opcion) ? 'selected' : '';
                    echo '<option value="'.$opcion.'" '.$selected.'>'.$opcion.'</option>';
                }
                echo '</select></td>';
            } else if($campo == 'anioPublicacion' || $campo == 'unidades') {
                echo '<td><input type="number" class="form-control" name="'.$campo.'" value="'.$valores.'" min="1"></td>';
            } else if($campo == 'precio') {
                echo '<td><input type="number" class="form-control" name="'.$campo.'" value="'.$valores.'" step="0.01"></td>';
            } else if($campo != 'borrado'){
                echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
            }
        }

        echo "<td><input type='submit' class='btn bg-success' value='Guardar cambios' name='guardarCambiosProducto'></td></form>";

        echo "</tr>";
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }

}

// Actualiza en la BD los cambios introducidos sobre el albarán 
function guardaCambiosAlbaran(){
    $albaran = $_REQUEST['codigoAlbaran'];
    $fechaAlbaran = $_REQUEST['fechaAlbaran'];
    $ISBN = $_REQUEST['ISBN_libro'];
    $cantidad = $_REQUEST['cantidadIncremento'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);
        $con->beginTransaction();

        $sqlAlbaranesOriginal = 'SELECT cantidadIncremento FROM albaranes WHERE codigoAlbaran = ?';
        $stmtAlbaranesOriginal = $con->prepare($sqlAlbaranesOriginal);
        $stmtAlbaranesOriginal->execute([$albaran]);
        $resultAlbaranesOriginal = $stmtAlbaranesOriginal->fetch(PDO::FETCH_ASSOC);
        $cantidadOriginal = $resultAlbaranesOriginal['cantidadIncremento'];

        $sqlAlbaranes = 'UPDATE albaranes SET fechaAlbaran = ?, ISBN_libro = ?, cantidadIncremento = ? WHERE codigoAlbaran = ?';
        $stmtAlbaranes = $con->prepare($sqlAlbaranes);
        $stmtAlbaranes->execute([$fechaAlbaran, $ISBN, $cantidad, $albaran]);

        $sqlLibros = 'SELECT unidades FROM libros WHERE ISBN = ?';
        $stmtLibros = $con->prepare($sqlLibros);
        $stmtLibros->execute([$ISBN]);
        $resultLibros = $stmtLibros->fetch(PDO::FETCH_ASSOC);

        $diferenciaCantidad = $cantidad - $cantidadOriginal;
        $nuevaCantidadLibros = $resultLibros['unidades'] + $diferenciaCantidad;

        $sqlUpdateLibros = 'UPDATE libros SET unidades = ? WHERE ISBN = ?';
        $stmtUpdateLibros = $con->prepare($sqlUpdateLibros);
        $stmtUpdateLibros->execute([$nuevaCantidadLibros, $ISBN]);

        $con->commit();
        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}

// Actualiza en la BD los cambios introducidos sobre el pedido 
function guardaCambiosPedido(){
    $idPedido = $_REQUEST['idPedido'];
    $fechaPedido = $_REQUEST['fechaPedido'];
    $ISBN = $_REQUEST['ISBN'];
    $cantidad = $_REQUEST['cantidad'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);
        $con->beginTransaction();

        $sqlPrecioPorUnidad = 'SELECT precio FROM libros WHERE ISBN = ?';
        $stmtPrecioPorUnidad = $con->prepare($sqlPrecioPorUnidad);
        $stmtPrecioPorUnidad->execute([$ISBN]);
        $precioPorUnidad = $stmtPrecioPorUnidad->fetchColumn();

        $nuevoPrecioTotal = $cantidad * $precioPorUnidad;

        $sqlPedidos = 'UPDATE pedidos SET fechaPedido = ?, ISBN = ?, cantidad = ?, precioTotal = ? WHERE idPedido = ?';
        $stmtPedidos = $con->prepare($sqlPedidos);
        $stmtPedidos->execute([$fechaPedido, $ISBN, $cantidad, $nuevoPrecioTotal, $idPedido]);

        $sqlUpdateLibros = 'UPDATE libros SET unidades = unidades + ? WHERE ISBN = ?';
        $stmtUpdateLibros = $con->prepare($sqlUpdateLibros);
        $stmtUpdateLibros->execute([$cantidad, $ISBN]);

        $con->commit();
        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}

// Actualiza en la BD los cambios introducidos sobre el libro 
function guardaCambiosProducto(){
    $isbn = $_REQUEST['ISBN'];
    $titulo = $_REQUEST['titulo'];
    $autor = $_REQUEST['autor'];
    $editorial = $_REQUEST['editorial'];
    $genero = $_REQUEST['genero'];
    $anoPublicacion = $_REQUEST['anioPublicacion'];
    $sinopsis = $_REQUEST['sinopsis'];
    $rutaPortada = $_REQUEST['rutaPortada'];
    $precio = $_REQUEST['precio'];
    $unidades = $_REQUEST['unidades'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);
        
        $sql = 'UPDATE libros SET ISBN = ?, titulo = ?, autor = ?, editorial = ?, genero = ?, anioPublicacion = ?, sinopsis = ?, rutaPortada = ?, precio = ?, unidades = ? WHERE ISBN = ?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$isbn,$titulo,$autor,$editorial,$genero,$anoPublicacion,$sinopsis,$rutaPortada,$precio,$unidades,$isbn]);

        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}


// Elimina el albarán seleccionado (borrado lógico)
function borraAlbaran(){
    $albaran = $_REQUEST['codigoAlbaran'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'UPDATE albaranes SET borrado = true WHERE codigoAlbaran = ?';
        $stmt = $con->prepare($sql);

        $stmt->execute(array($albaran));

        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
}

// Elimina el pedido seleccionado (borrado lógico)
function borraPedido(){
    $pedido = $_REQUEST['idPedido'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'UPDATE pedidos SET borrado = true WHERE idPedido = ?';
        $stmt = $con->prepare($sql);

        $stmt->execute(array($pedido));

        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
}

// Elimina el producto seleccionado (borrado lógico)
function borraProducto(){
    $isbn = $_REQUEST['ISBN'];

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'UPDATE libros SET borrado = true WHERE ISBN = ?';
        $stmt = $con->prepare($sql);

        $stmt->execute(array($isbn));

        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
}

// Función para el buscador, busca teniendo en cuenta solamente parte del campo a buscar, por ejemplo para buscar "Juego de tronos", basta con buscar "tronos"
function buscarLibros($busqueda) {
    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM libros WHERE 
                ISBN LIKE ? OR
                titulo LIKE ? OR
                autor LIKE ? OR
                editorial LIKE ? OR
                genero LIKE ?';

        $stmt = $con->prepare($sql);

        $busquedaParam = "%{$busqueda}%";
        $stmt->execute([$busquedaParam, $busquedaParam, $busquedaParam, $busquedaParam, $busquedaParam]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($result){
            echo '<div class="row g-3">';

            foreach ($result as $valores) {
                echo '<div class="col-md-4">';
                echo '<div class="card">';
                echo '<div class="row g-0">';
                
                echo '<div class="col-6">';
                foreach ($valores as $dato => $valor) {
                    if ($dato != 'borrado') {
                        if ($dato == 'rutaPortada') {
                            echo '<img src="'.$valor.'" class="img-fluid w-100" alt="card-horizontal-image" width="150px">';
                        }
                    }
                }
                echo '</div>';
                
                echo '<div class="col-6">';
                echo '<div class="card-body">';
                foreach ($valores as $dato => $valor) {
                    echo "<form method='post' action='./carrito.php'>";
                    if ($dato != 'borrado') {
                        if ($dato == 'ISBN') {
                            echo "<input type='hidden' name='isbn' value='$valor' id='isbn'>";
                        }
                        if ($dato == 'titulo') {
                            echo '<h5 class="card-title">'.$valor.'</h5>';
                        }
                        if ($dato == 'autor') {
                            echo '<p class="card-text"><small class="text-muted">'.$valor.'</small></p>';
                        }
                        if ($dato == 'sinopsis') {
                            echo '<p class="card-text">'.$valor.'</p>';
                        }
                        if ($dato == 'precio') {
                            echo '<h5 class="card-title">'.$valor.'€</h5>';
                        }
                    }
                }
                echo "<input type='submit' class='btn btn-primary' value='Añadir al carrito' id='anadir' name='anadir'>";
                echo "</form>";
                echo '</div></div>';
                
                echo '</div></div></div>';
            }
            echo '</div>';
        }else{
            echo '<div class="container mt-5 text-center">';
        echo '<h1 class="mb-4">No se encontraron resultados para la búsqueda</h1></div>';
        }

        unset($con);
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

function insertarCookie() {
    $i = 0;
    $existe = false;

    while (!empty($_COOKIE['isbn'][$i]) && $i <= 3) {
        if ($_COOKIE['isbn'][$i] == $_REQUEST['isbn']) {
            $existe = true;
            break;
        }
        $i++;
    }

    if (!$existe && !empty($_COOKIE['isbn'][3]) && !empty($_COOKIE['isbn'][2]) && !empty($_COOKIE['isbn'][1]) && !empty($_COOKIE['isbn'][0])) {
        $_COOKIE['isbn'][0] = $_COOKIE['isbn'][1];
        $_COOKIE['isbn'][1] = $_COOKIE['isbn'][2];
        $_COOKIE['isbn'][2] = $_COOKIE['isbn'][3];
        $_COOKIE['isbn'][3] = $_REQUEST['isbn'];
        
        setcookie("isbn[0]", $_COOKIE['isbn'][0], time() + (3600 * 24));
        setcookie("isbn[1]", $_COOKIE['isbn'][1], time() + (3600 * 24));
        setcookie("isbn[2]", $_COOKIE['isbn'][2], time() + (3600 * 24));
        setcookie("isbn[3]", $_COOKIE['isbn'][3], time() + (3600 * 24));
    } else if (!$existe) {
        $_COOKIE['isbn'][$i] = $_REQUEST['isbn'];
        setcookie("isbn[$i]", $_REQUEST['isbn'], time() + (3600 * 24));
    }
}


function muestraCookies() {
    if (!empty($_COOKIE['isbn'])) {
        $cookies = array_reverse($_COOKIE['isbn'], true);
        foreach ($cookies as $key => $value) {
            $producto = findById($value);
            if ($producto) {
                echo "<p class='text-center'>- <a href='carrito.php?isbn=" . $producto['ISBN'] . "'>" . $producto['titulo'] . "</a></p>";
            }
        }
    } else {
        echo "No se ha visitado ningún producto ";
    }
}


function findById($id){
    try {
        $DSN = 'mysql:host='.IP.';dbname='.BD;
        $con = new PDO($DSN,USER,PASSWORD);
        $sql = "select * from libros where ISBN = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($id));
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $producto;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

function insertarCookieDeseos() {
    $isbnNuevo = $_REQUEST['isbn'];
    $existe = false;
    
    foreach ($_COOKIE['deseos'] as $value) {
        if ($value == $isbnNuevo) {
            $existe = true;
            break;
        }
    }

    if (!$existe) {
        $i = 0;
        while (!empty($_COOKIE['deseos'][$i])) {
            $i++;
        }
        setcookie("deseos[$i]", $isbnNuevo, time() + (3600 * 24));
    }
}

function verLibrosDeseos(){
    try {
        $con = new PDO(DSN, USER, PASSWORD);

        if(!empty($_COOKIE['deseos'])){
            echo '<div class="row g-9">';
            
            foreach($_COOKIE['deseos'] as $value){
                $sql = 'SELECT * FROM libros WHERE borrado = false and ISBN = ?';
                $stmt = $con->prepare($sql);
                $stmt->execute([$value]);
        
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                foreach ($result as $valores) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card">';
                    echo '<div class="row g-0">';
                    
                    echo '<div class="col-6">';
                    foreach ($valores as $dato => $valor) {
                        if ($dato != 'borrado') {
                            if ($dato == 'rutaPortada') {
                                echo '<img src="'.$valor.'" class="img-fluid w-100" alt="card-horizontal-image" width="150px">';
                            }
                        }
                    }
                    echo '</div>';
                    
                    echo '<div class="col-6">';
                    echo '<div class="card-body">';
                    foreach ($valores as $dato => $valor) {
                        echo "<form method='post' action='./carrito.php'>";
                        if ($dato != 'borrado') {
                            if ($dato == 'ISBN') {
                                echo "<input type='hidden' name='isbn' value='$valor' id='isbn'>";
                            }
                            if ($dato == 'titulo') {
                                echo '<h5 class="card-title">'.$valor.'</h5>';
                            }
                            if ($dato == 'autor') {
                                echo '<p class="card-text"><small class="text-muted">'.$valor.'</small></p>';
                            }
                            if ($dato == 'sinopsis') {
                                echo '<p class="card-text">'.$valor.'</p>';
                            }
                            if ($dato == 'precio') {
                                echo '<h5 class="card-title">'.$valor.'€</h5>';
                            }
                        }
                    }
                    echo "<input type='submit' class='btn btn-primary' value='Añadir al carrito' id='anadir' name='anadir'>";
                    echo "</form>";
                    echo "<form method='get' action='borracokie.php'>";
                    echo "<input type='hidden' name='isbn' value='{$valores['ISBN']}'>";
                    echo "<button style='border: none; background: none; padding: 0;'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/1200px-Heart_coraz%C3%B3n.svg.png' style='width:30px' name='nodeseo' id='nodeseo'>";
                    echo "</button></form><br><br>";
        
                    echo '</div></div>';
                    
                    echo '</div></div></div>';
                }
            }

            echo '</div>';
        } else {
            echo "<h1 class='text-center'>No hay libros en la lista de deseos</h1>";
        }
        
        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}


?>