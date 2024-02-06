<?php

class Libro {
    private $isbn;
    private $titulo;
    private $autor;
    private $editorial;
    private $fechaLanzamiento;
    private $numeroPaginas;
    private $activo;

    public function __construct($isbn, $titulo, $autor, $editorial, $fechaLanzamiento, $numeroPaginas, $activo = true) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->fechaLanzamiento = $fechaLanzamiento;
        $this->numeroPaginas = $numeroPaginas;
        $this->activo = $activo;
    }

    public function __get($att) {
        if (property_exists(__CLASS__, $att)) {
            return $this->$att;
        }
    }

    public function __set($att, $val) {
        if (property_exists(__CLASS__, $att)) {
            $this->$att = $val;
        } else {
            echo "No existe el atributo '$att' en la clase " . __CLASS__;
        }
    }
}

?>
