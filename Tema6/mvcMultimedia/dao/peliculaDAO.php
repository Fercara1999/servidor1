<?php

class PeliculaDAO {
    public static function findAll(){
        $sql = "SELECT Pelicula.*, Multimedia.titulo, Multimedia.duracion
        FROM Pelicula
        INNER JOIN Multimedia ON Pelicula.multimedia_id = Multimedia.multimedia_id
        WHERE Pelicula.activo = true";

        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arrayPeliculas = [];

        while ($peliculaSTD = $result->fetchObject()) {
            echo print_r($peliculaSTD);
            $pelicula = new Pelicula(
                $peliculaSTD->multimedia_id,
                $peliculaSTD->titulo,
                $peliculaSTD->duracion,
                $peliculaSTD->genero,
                $peliculaSTD->director,
                $peliculaSTD->activo
            );
            array_push($arrayPeliculas, $pelicula);
        }
        return $arrayPeliculas;
    }

    public static function findByTitulo($titulo){
        $sql = "SELECT Pelicula.*, Multimedia.titulo, Multimedia.duracion FROM Pelicula
        INNER JOIN Multimedia ON Pelicula.multimedia_id = Multimedia.multimedia_id
        WHERE Pelicula.activo = true and Multimedia.titulo = ?";
        
        $parametros = array($titulo);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        while ($peliculaSTD = $result->fetchObject()) {
            echo print_r($peliculaSTD);
            $pelicula = new Pelicula(
                $peliculaSTD->multimedia_id,
                $peliculaSTD->titulo,
                $peliculaSTD->duracion,
                $peliculaSTD->genero,
                $peliculaSTD->director,
                $peliculaSTD->activo
            );
        }

        return $peliculaSTD;
    }
}

?>