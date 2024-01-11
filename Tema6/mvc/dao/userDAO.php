<?php

class UserDAO{
    public static function findAll(){
        //return array con todos los usuarios
        $sql = "SELECT * FROM Usuario";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayUsuarios = array();

        while($usuarioSTD = $result->fetchObject()){
            $usuario = new User($usuarioSTD->codUsuario,
            $usuarioSTD->password,
            $usuarioSTD->descUsuario,
            $usuarioSTD->fechaUltimaConexion,
            $usuarioSTD->perfil);
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
            $usuarioSTD->perfil);
            return $usuario;
        }else{
        }
    }

    public static function insert($usuario){
        $sql = "INSERT INTO Usuario(codUsuario,descUsuario,password,fechaUltimaConexion) VALUES(?,?,?,?)";
        $parametros = array($usuario);
        // unset($parametros['perfil']);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }
}

?>