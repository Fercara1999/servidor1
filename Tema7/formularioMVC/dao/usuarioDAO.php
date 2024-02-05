<?php

class UsuarioDAO{

    public static function validaUsuario($nombre, $password){
        $sql = "SELECT * FROM usuarios WHERE usuario = ? and password = ?";
        $parametros = array($nombre, sha1($password));

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($usuarioSTD = $result->fetchObject()){
            $usuario = new Usuario($usuarioSTD->id_usuario,
            $usuarioSTD->usuario,
            $usuarioSTD->password,
            $usuarioSTD->perfil,
            $usuarioSTD->activo);
            return $usuario;
        }

        return null;
    }
}


?>