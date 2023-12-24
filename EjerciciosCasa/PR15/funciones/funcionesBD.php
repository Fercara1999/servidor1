<?php

require("./../confBD.php");

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
        $stmt->execute([$user,$pass]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario){
            return $usuario;
        }
        return false;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
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
    require("./confBD.php");
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
                        echo '<img src="'.$valor.'" class="img-fluid w-100" alt="card-horizontal-image" style="height: 300px; width: 150px">';
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