<?php

class UsuarioDAO{

    public static function insert($usuario){
        $sql = "INSERT INTO Usuario(usuario, password, numeroAccesos, perfil, activo) VALUES (?,?,?,?,?)";
        $parametros = array($usuario->usuario,
        sha1($usuario->password),
        $usuario->numeroAccesos,
        $usuario->perfil,
        $usuario->activo);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;
    }

    public static function validarUsuario($nombre,$password){
        $sql = "SELECT * FROM Usuario WHERE usuario = ? AND password = ? AND activo = true";
        $parametros = array($nombre,sha1($password));

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        
        if($usuarioSTD = $result->fetchObject()){
            $usuario = new Usuario($usuarioSTD->codUsuario,
            $usuarioSTD->usuario,
            $usuarioSTD->password,
            $usuarioSTD->numeroAccesos,
            $usuarioSTD->perfil,
            $usuarioSTD->activo);
            return $usuario;
        }else{
            return null;
        }
    }
}
?>