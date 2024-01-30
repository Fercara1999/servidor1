<?php

class Pelicula extends Multimedia{

    private $genero;
    private $director;

    function __construct($multimedia_id,$titulo,$duracion,$genero,$director,$activo){
        parent::__construct($multimedia_id,$titulo,$duracion,$activo);
        $this->genero = $genero;
        $this->director = $director;
    }

}

?>