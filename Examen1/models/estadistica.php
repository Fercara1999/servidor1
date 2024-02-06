<?php

// Clase para la estadística
class Estadistica{

    private $id_estadistica;
    private $id_usuario;
    private $id_palabra;
    private $resultado;
    private $intentos;
    private $fecha;

    function __construct($id_estadistica, $id_usuario,$id_palabra,$resultado,$intentos,$fecha){
        $this->id_estadistica = $id_estadistica;
        $this->id_usuario = $id_usuario;
        $this->id_palabra = $id_palabra;
        $this->resultado = $resultado;
        $this->intentos = $intentos;
        $this->fecha = $fecha;
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