<?php

class Pajaro extends Animal{

    private $tipoPico;

    function __construct($nombre,$tipo,$tipoPico){
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->tipoPico = $tipoPico;
    }

    
}

?>