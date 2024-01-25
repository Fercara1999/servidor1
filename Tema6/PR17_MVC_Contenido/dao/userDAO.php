<?php

class UserDAO{
    public static function findAll(){
        //return array con todos los usuarios
        $sql = "SELECT * FROM usuarios WHERE borrado = false";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayUsuarios = array();

        while($usuarioSTD = $result->fetchObject()){
            $usuario = new User($usuarioSTD->id_usuario,
            $usuarioSTD->usuario,
            $usuarioSTD->contrasena,
            $usuarioSTD->correo,
            $usuarioSTD->fechaNacimiento,
            $usuarioSTD->rol,
            $usuarioSTD->borrado );
            array_push($arrayUsuarios,$usuario);
        }

        return $arrayUsuarios;
    }

    public static function findbyId($id){
        
        $sql = "SELECT * FROM  usuarios WHERE id_usuario = ? and borrado = 0";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($usuarioSTD = $result->fetchObject()){
            $usuario = new User($usuarioSTD->id_usuario,
            $usuarioSTD->usuario,
            $usuarioSTD->contrasena,
            $usuarioSTD->correo,
            $usuarioSTD->fechaNacimiento,
            $usuarioSTD->rol,
            $usuarioSTD->borrado);
            return $usuario;
        }else{
        }
    }

    public static function insert($usuario) {
        $sql = "INSERT INTO usuarios(usuario, contrasena, correo, fechaNacimiento, rol) VALUES(?, ?, ?, ?, ?)";
        $parametros = array(
            $usuario->usuario,
            sha1($usuario->contrasena),
            $usuario->correo,
            $usuario->fechaNacimiento,
            $usuario->rol
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;
    }
    

    public static function update($usuario){
        $sql = 'UPDATE usuarios SET id_usuario = ?,
        usuario = ?
        contrasena = ?,
        correo = ?,
        fechaNacimiento = ?,
        rol = ?,
        borrado = ?
        WHERE id_usuario = ?';
        
        $parametros = array($usuario->id_usuario,
        $usuario->usuario,
        $usuario->contrasena,
        $usuario->correo,
        $usuario->fechaNacimiento,
        $usuario->rol,
        $usuario->borrado,
        $usuario->id_usuario);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    // public static function cambiarContrasena($usuario){
    //     $sql = 'UPDATE Usuario SET id_usuario = ?,
    //     contrasena = ?,
    //     correo = ?,
    //     fechaNacimiento = ?,
    //     borrado = ?
    //     WHERE id_usuario = ?';
        
    //     $parametros = array(sha1($usuario->usuario),
    //     $usuario->contrasena,
    //     $usuario->correo,
    //     $usuario->fechaNacimiento,
    //     $usuario->borrado,
    //     $usuario->id_usuario);

    //     $result = FactoryBD::realizaConsulta($sql,$parametros);
    //     if($result->rowCount() > 0)
    //         return true;
    //     else
    //         return false;
    // }

    public static function delete($usuario){
        $sql = "UPDATE usuarios SET borrado = true WHERE id_usuario = ?";

        $parametros = array($usuario->id_usuario);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function activar($usuario){
        $sql = "UPDATE usuarios SET borrado = false WHERE id_usuario = ?";

        $parametros = array($usuario->id_usuario);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function buscarPorNombre($nombre){
        $sql = "SELECT * FROM  usuarios WHERE usuario like ? and borrado = 0";
        $nombre = '%'.$nombre.'%';
        $parametros = array($nombre);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($usuarioSTD = $result->fetchObject()){
            $usuario = new User($usuarioSTD->id_usuario,
            $usuarioSTD->usuario,
            $usuarioSTD->contrasena,
            $usuarioSTD->correo,
            $usuarioSTD->fechaNacimiento,
            $usuarioSTD->rol,
            $usuarioSTD->borrado);
            return $usuario;
        }else{
            return null;
        }
    }

    public static function validaUsuario($user,$pass){
        try {
            $con = new PDO(DSN,USER,PASSWORD);
            $sql = "select * from usuarios where usuario = ? and contrasena = ?";
            $parametros = array($user,sha1($pass));
            $result = FactoryBD::realizaConsulta($sql,$parametros);
            $usuario = $result->fetchObject();
            if($usuario){
                return $usuario;
            }
            return false;
        } catch (PDOException $e) {
            echo $e->getCode();
        } finally{
            unset($con);
        }
    }

    public static function verDatos(){
        try {
            $usuario = $_SESSION['usuario']->usuario;
            $sql = 'SELECT * FROM usuarios WHERE usuario = ?';

            $parametros = array($usuario);
            $result = FactoryBD::realizaConsulta($sql,$parametros);

            if ($datosUsuario = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<form method='post'>";
                
                foreach ($datosUsuario as $dato => $value) {
                    if ($dato == 'usuario') {
                        echo "<label for='$dato' class='form-label me-2 ancho-caja'>$dato<input type='text' name='$dato' id ='$dato' class='form-control' value='$value' readonly></label><br>";
                    } else if ($dato == 'correo') {
                        echo "<label for='$dato' class='form-label me-2 ancho-caja'>$dato<input type='email' name='$dato' id ='$dato' class='form-control' value='$value'></label><br>";
                    } else if ($dato == 'fechaNacimiento') {
                        echo "<label for='$dato' class='form-label me-2 ancho-caja'>$dato<input type='date' name='$dato' id ='$dato' class='form-control' value='$value'></label><br>";
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

    public static function actualizarDatos(){
        try {
            $usuario = $_SESSION['usuario']->usuario;
            
            $correo = $_REQUEST['correo'];
            $fecha = $_REQUEST['fechaNacimiento'];
            if(expresionCorreo() && campoVacio($fecha)){
                $sql = 'UPDATE usuarios SET correo = ?, fechaNacimiento = ? WHERE usuario = ?';
                $parametros = array($correo,$fecha,$usuario);
                FactoryBD::realizaConsulta($sql,$parametros);
                echo "Datos actualizados con exito";
            }else{
                echo "No se han podido modificar los datos";
            }
    
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }

    public static function validaCambioContrasena(){
        $actual = $_REQUEST['contrasenaActual'];
        $nueva = $_REQUEST['nuevaContrasena'];
        $confirmaNueva = $_REQUEST['confirmaNuevaContrasena'];
    
        try {
    
            $usuario = $_SESSION['usuario']->usuario;
            $sql = 'SELECT contrasena FROM usuarios WHERE usuario = ?';
    
            $parametros = array($usuario);

            $result = FactoryBD::realizaConsulta($sql,$parametros);
    
            $datos  = $result->fetch(PDO::FETCH_ASSOC);
    
            if ($datos) {
                if ($datos['contrasena'] == sha1($actual)) {
                    if (mismaContrasena($nueva, $confirmaNueva)) {
                        if (expresionContrasena('nuevaContrasena')) {
                            $sql = 'UPDATE usuarios SET contrasena = ? WHERE usuario = ?';
                            $parametros = array(sha1($nueva),$usuario);
                            FactoryBD::realizaConsulta($sql,$parametros);
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
}

?>