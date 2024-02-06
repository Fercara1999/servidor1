<?php

// Clase para la palabra
class Palabra{

    private $id_palabra;
    private $palabra;
    private $num_letras;

    function __construct($id_palabra, $palabra, $num_letras){
        $this->id_palabra = $id_palabra;
        $this->palabra = $palabra;
        $this->num_letras = $num_letras;
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