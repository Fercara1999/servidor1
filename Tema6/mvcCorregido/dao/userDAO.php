<?php

class UserDAO{
    public static function findAll(){
        $sql = "SELECT * FROM Usuario";
        $parametros = [];

        $result = FactoryBD::realizaConsula($sql,$parametros);
        $arrayUsuarios = [];

        while($usuariosSTD = $result->fetchObject()){
            $usuario = new User(
                $usuariosSTD->codUsuario,
                $usuariosSTD->descUsuario,
                $usuariosSTD->password,
                $usuariosSTD->perfil,
                $usuariosSTD->fechaUltimaConexion);
                array_push($arrayUsuarios,$usuariosSTD);
        }

        return $arrayUsuarios;
    }

    public static function findById($id){
        $sql = "SELECT * FROM Usuario WHERE codUsuario = ?";
        $parametros = [$id];

        $result = FactoryBD::realizaConsula($sql,$parametros);
        while($usuariosSTD = $result->fetchObject()){
            $usuario = new User(
                $usuariosSTD->codUsuario,
                $usuariosSTD->descUsuario,
                $usuariosSTD->password,
                $usuariosSTD->perfil,
                $usuariosSTD->fechaUltimaConexion);
                return $usuario;
        }
    }

    public static function insert($usuario){
        
        $sql = "INSERT INTO Usuario(codUsuario,descUsuario,password,fechaUltimaConexion) VALUES (?,?,?,?)";
        $parametros = array($usuario->codUsuario,$usuario->descUsuario,$usuario->password,$usuario->fechaUltimaConexion);

        $result = FactoryBD::realizaConsula($sql,$parametros);
        return true;
    }

}

?>