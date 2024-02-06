<?php

// Clase para el usuario
class Usuario{
    private $id_usuario;
    private $username;
    private $password;
    private $tipo;
    
    function __construct($id_usuario,$username,$password,$tipo){
        $this->id_usuario = $id_usuario;
        $this->username = $username;
        $this->password = $password;
        $this->tipo = $tipo;
    }

    public function __get($att){
        if(property_exists(__CLASS__,$att))
            return $this->$att;
    }

    public function __set($att,$val){
        if(property_exists(__CLASS__,$att))
            $this->$att = $val;
        else{
            echo "No existe el att";
        }
    }
}

?>