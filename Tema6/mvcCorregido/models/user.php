<?php

class User{
    private $codUsuario;
    private $descUsuario;
    private $password;
    // private $perfil;
    private $fechaUltimaConexion;

    function __construct($codUsuario,$descUsuario,$password,$fechaUltimaConexion){
        $this->codUsuario = $codUsuario;
        $this->descUsuario = $descUsuario;
        $this->password = $password;
        // $this->perfil = $perfil;
        $this->fechaUltimaConexion = $fechaUltimaConexion;
    }

    function __get($att){
        if(property_exists(__CLASS__,$att))
            return $this->$att;
    }

    function __set($att, $value){
        if(property_exists(__CLASS__,$att))
            $this->$att = $value;
        else
            echo "No existe ese parametro";
    }

    function __toString(){
        return "$this->codUsuario,$this->descUsuario,$this->password,$this->fechaUltimaConexion";
    }
}

?>