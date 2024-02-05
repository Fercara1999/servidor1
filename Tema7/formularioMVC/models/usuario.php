<?php

class Usuario{
    private $id_usuario;
    private $usuario;
    private $password;
    private $perfil;
    private $activo;

    function __construct($id_usuario, $usuario, $password, $perfil, $activo = 1){
        $this->id_usuario = $id_usuario;
        $this->usuario = $usuario;
        sha1($this->password = $password);
        $this->perfil = $perfil;
        $this->activo = $activo;
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