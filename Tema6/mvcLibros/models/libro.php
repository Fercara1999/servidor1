<?php

class Libro{
    private $isbn;
    private $titulo;
    private $autor;
    private $editorial;
    private $fechaLanzamiento;
    private $activo;

    function __construct($isbn,$titulo,$autor,$editorial,$fechaLanzamiento,$activo = 'true'){
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->fechaLanzamiento = $fechaLanzamiento;
        $this->activo = $activo;
    }

    function __get($att){
        if(property_exists(__CLASS__,$att))
            return $this->$att;
    }

    function __set($att,$value){
        if(property_exists(__CLASS__,$att))
            $this->$att = $value;
        else
            echo "No existe esa propiedad";
    }
}
?>