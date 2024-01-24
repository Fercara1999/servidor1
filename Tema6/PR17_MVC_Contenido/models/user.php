<?php

class User{
    private $id_usuario;
    private $usuario;
    private $contrasena;
    private $correo;
    private $fechaNacimiento;
    private $rol;
    private $borrado;

    function __construct($id_usuario,$usuario,$contrasena,$correo,$fechaNacimiento,$rol,$borrado = 'false'){
        $this->id_usuario = $id_usuario;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->correo = $correo;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->rol = $rol;
        $this->borrado = $borrado;
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