<?php

class Libro{
    private $isbn;
    private $titulo;
    private $autor;
    private $editorial;
    private $genero;
    private $anioPublicacion;
    private $sinopsis;
    private $rutaPortada;
    private $precio;
    private $unidades;
    private $borrado;

    function __construct($ISBN,$titulo,$autor,$editorial,$genero,$anioPublicacion,$sinopsis,$rutaPortada,$precio,$unidades,$borrado = 'false'){
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->genero = $genero;
        $this->anioPublicacion = $anioPublicacion;
        $this->sinopsis = $sinopsis;
        $this->rutaPortada = $rutaPortada;
        $this->precio = $precio;
        $this->unidades = $unidades;
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