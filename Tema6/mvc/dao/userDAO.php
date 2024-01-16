<?php

class UserDAO{
    public static function findAll(){
        //return array con todos los usuarios
        $sql = "SELECT * FROM Usuario WHERE activo = true";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayUsuarios = array();

        while($usuarioSTD = $result->fetchObject()){
            $usuario = new User($usuarioSTD->codUsuario,
            $usuarioSTD->password,
            $usuarioSTD->descUsuario,
            $usuarioSTD->fechaUltimaConexion,
            $usuarioSTD->perfil,
            $usuarioSTD->activo );
            array_push($arrayUsuarios,$usuario);
        }

        return $arrayUsuarios;
    }

    public static function findbyId($id){
        
        $sql = "SELECT * FROM  Usuario WHERE codUsuario = ?";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($usuarioSTD = $result->fetchObject()){
            $usuario = new User($usuarioSTD->codUsuario,
            $usuarioSTD->password,
            $usuarioSTD->descUsuario,
            $usuarioSTD->fechaUltimaConexion,
            $usuarioSTD->perfil,
            $usuarioSTD->activo);
            return $usuario;
        }else{
        }
    }

    public static function insert($usuario){
        $sql = "INSERT INTO Usuario(codUsuario,descUsuario,password,fechaUltimaConexion) VALUES(?,?,?,?)";
        $parametros = array($usuario->codUsuario,
        $usuario->descUsuario,
        sha1($usuario->password),
        $usuario->fechaUltimaConexion);
        // unset($parametros['perfil']);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function update($usuario){
        $sql = 'UPDATE Usuario SET descUsuario = ?,
        fechaUltimaConexion = ?,
        perfil = ?,
        activo = ?
        WHERE codUsuario = ?';
        
        $parametros = array($usuario->descUsuario,
        $usuario->fechaUltimaConexion,
        $usuario->perfil,
        $usuario->activo,
        $usuario->codUsuario);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function cambiarContrasena($usuario){
        $sql = 'UPDATE Usuario SET password = ?,
        descUsuario = ?,
        fechaUltimaConexion = ?,
        perfil = ?,
        activo = ?
        WHERE codUsuario = ?';
        
        $parametros = array(sha1($usuario->password),
        $usuario->descUsuario,
        $usuario->fechaUltimaConexion,
        $usuario->perfil,
        $usuario->activo,
        $usuario->codUsuario);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function delete($usuario){
        $sql = "UPDATE Usuario SET activo = false WHERE codUsuario = ?";

        $parametros = array($usuario->codUsuario);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function activar($usuario){
        $sql = "UPDATE Usuario SET activo = true WHERE codUsuario = ?";

        $parametros = array($usuario->codUsuario);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function buscarPorNombre($nombre){
        $sql = "SELECT * FROM  Usuario WHERE descUsuario like ? and activo = 1";
        $nombre = '%'.$nombre.'%';
        $parametros = array($nombre);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($usuarioSTD = $result->fetchObject()){
            $usuario = new User($usuarioSTD->codUsuario,
            $usuarioSTD->password,
            $usuarioSTD->descUsuario,
            $usuarioSTD->fechaUltimaConexion,
            $usuarioSTD->perfil,
            $usuarioSTD->activo);
            return $usuario;
        }else{
            return null;
        }
    }

    public static function validarUsuario($nombre,$password){
        $sql = "SELECT * FROM Usuario WHERE descUsuario = ? AND password = ?";
        $parametros = array($nombre,sha1($password));

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($result->rowCount())
            echo "Login correcto";
        else
            echo "Login INcorrecto";
    }
}

?>