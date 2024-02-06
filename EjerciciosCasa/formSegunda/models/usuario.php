<?php

class Usuario{

    private $codUsuario;
    private $usuario;
    private $password;
    private $numeroAccesos;
    private $perfil;
    private $activo;


    function __construct($codUsuario,$usuario,$password,$numeroAccesos = 0,$perfil = 'user',$activo = '1'){
        $this->codUsuario = $codUsuario;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->numeroAccesos = $numeroAccesos;
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