<?php

class Multimedia{
    protected $multimedia_id;
    protected $titulo;
    protected $duracion;
    protected $activo;


    function __construct($multimedia_id,$titulo,$duracion,$activo = 'true'){
        $this->multimedia_id = $multimedia_id;
        $this->titulo = $titulo;
        $this->duracion = $duracion;
        $this->activo = $activo;
    }

    function __get($att){
        if(property_exists(__CLASS__,$att)){
            return $this->$att;
        }
    }

    function __set($att,$value){
        if(property_exists(__CLASS__,$att)){
            $this->$att = $value;
        }else{
            echo "No existe el atributo";
        }
    }

}

?>