<?php

require("./confBD.php");

function pulsadoBoton($boton){
    if(isset($_REQUEST[$boton]))
        return true;
    else
        return false;
}

function campoVacio($campo){
    if(empty($_REQUEST[$campo]))
        return true;
    else
        return false;
}

function expresionContrasena($campo){
    $patron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
    $texto = $_REQUEST[$campo];
    
    if(preg_match($patron,$texto))
        return true;
    else
        return false;
}

function expresionCorreo(){
    $patron = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $texto = $_REQUEST['correo'];

    if(preg_match($patron,$texto))
        return true;
    else
        return false;
}

function mismaContrasena($contra,$repContra){
    $contrasena = $_REQUEST[$contra];
    $confContrasena = $_REQUEST[$repContra];

    if($contrasena == $confContrasena)
        return true;
    else
        return false;
}

function recuerda($campo){
    if(!empty($_REQUEST[$campo])){
        echo $_REQUEST[$campo];
    }
}

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
    else if(!mismaContrasena('contrasena','repContrasena'))
        $arrayError['repContrasena'] = "Las contraseñas no coinciden";
    if(!expresionCorreo())
        $arrayError['correo'] = "El correo no está en un formato correcto";
    if(campoVacio('fechaNacimiento'))
        $arrayError['fechaNacimiento'] = "El campo fecha de naacimiento está vacio";
    if(count($arrayError) == 0)
        return true;
    else
        return false;
}

function muestraError(&$array,$campo){
    if(isset($array[$campo]))
        echo $array[$campo];
}

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

    }catch (\Throwable $th){
        echo $th ->getMessage();
        mysqli_close($con);
    }
}

function validaUsuario($user,$pass){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASSWORD);
        $sql = "select * from usuarios where usuario = ? and contrasena = ?";
        $stmt = $con->prepare($sql);
        $pass = sha1($pass);
        // $user y $pass son los parámetros que metemos nosotros
        $stmt->execute([$user,$pass]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        // Si usuario devuelve true es que existe el usuario por lo que lo devuelve
        if($usuario){
            return $usuario;
        }
        //Si no, que devuelva false
        return false;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        // Finalmente, cierra la sesión
        unset($con);
    }
}

function verDatos(){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN, USER, PASSWORD);

        $usuario = $_SESSION['usuario']['usuario'];
        $sql = 'SELECT * FROM usuarios WHERE usuario = ?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$usuario]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as $datos => $valores) {
                if($datos != 'borrado') {
                    echo "<label for='$datos' class='form-label me-2'>".$datos."<input type='text' name='$datos' id ='$datos' class='form-control' value='$valores'>";
                }
            }
        } else {
            echo 'No se encontraron datos para el usuario.';
        }

        unset($con);
    } catch (\Throwable $th) {
        echo $th->getMessage();
        unset($con);
    }
}


function verLibros(){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN, USER, PASSWORD);

        // $usuario = $_SESSION['usuario']['usuario'];
        $sql = 'SELECT * FROM libros WHERE borrado = false';
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="row g-3">';

        foreach ($result as $valores) {
            echo '<div class="col-md-4">';
            echo '<div class="card">';
            echo '<div class="row g-0">';
            
            echo '<div class="col-6">';
            foreach ($valores as $dato => $valor) {
                if ($dato != 'borrado') {
                    if ($dato == 'rutaPortada') {
                        echo '<img src="'.$valor.'" class="img-fluid w-100" alt="card-horizontal-image" style="height: 300px;">';
                    }
                }
            }
            echo '</div>';
            
            echo '<div class="col-6">';
            echo '<div class="card-body">';
            foreach ($valores as $dato => $valor) {
                if ($dato != 'borrado') {
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
            echo "<input type='submit' class='btn btn-primary' value='Añadir al carrito'>";
            echo '</div></div>';
            
            echo '</div></div></div>';
        }

        echo '</div>';
        unset($con);
    } catch (\Throwable $th) {
        echo $th->getMessage();
        unset($con);
    }
}

?>