<?php

class Perro extends Animal{
    private $raza;

    function __construct($nombre,$tipo,$raza){
        parent::__construct($nombre,$tipo);
        $this->raza = $raza;
    }

    public function __toString(){
        return parent::__toString() ." es de raza $this->raza";
    }
}

?>