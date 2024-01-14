<?php

class Animal{
    private $nombre;
    private $tipo;

    function __construct($nombre,$tipo){
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }
    
    public function __get($att){
        if(property_exists(__CLASS__,$att))
            return $this->$att;
    }
    
    public function __set($att,$value){
        if(property_exists(__CLASS__,$att))
            $this->att = $value;
        else
            echo "No existe ese atributo";
    }

    public function __toString()
    {
        return "El animal $this->nombre es de tipo $this->tipo ";
    }
}


?>