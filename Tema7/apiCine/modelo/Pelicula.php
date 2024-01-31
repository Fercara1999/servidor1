<?php

class Pelicula{
    private $id;
    private $titulo;
    private $director;
    private $genero;
    private $activo;

    public function __construct($id,$titulo,$director,$genero,$activo = 'true'){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->director = $director;
        $this->genero = $genero;
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