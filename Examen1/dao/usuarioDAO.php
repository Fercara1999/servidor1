<?php

// Clase para el usuarioDAO
class UsuarioDAO{

    // Función para realizar el login del usuario
    public static function validarUsuario($nombre,$password){
        $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
        $parametros = array($nombre,sha1($password));

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        
        if($usuarioSTD = $result->fetchObject()){
            $usuario = new Usuario($usuarioSTD->id_usuario,
            $usuarioSTD->username,
            $usuarioSTD->password,
            $usuarioSTD->tipo);
            return $usuario;
        }else{
            return null;
        }
    }
}

?>