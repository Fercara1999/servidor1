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
}

?>