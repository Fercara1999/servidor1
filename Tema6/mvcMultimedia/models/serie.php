<?php

class Serie extends Multimedia{

    private $temporadas;
    private $episodios_por_temporada;

    function __construct($multimedia_id,$titulo,$duracion,$temporadas,$episodios_por_temporada,$activo){
        parent::__construct($multimedia_id,$titulo,$duracion,$activo);
        $this->temporadas = $temporadas;
        $this->episodios_por_temporada = $episodios_por_temporada;
    }

}