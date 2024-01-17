<?php

class LibroDAO{

    public static function FindAll(){
        $sql = 'SELECT * FROM Libros WHERE activo = 1';
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayLibros = [];

        while($libroSTD = $result->fetchObject()){
            $libro = new Libro($libroSTD->isbn,
            $libroSTD->titulo,
            $libroSTD->autor,
            $libroSTD->editorial,
            $libroSTD->fechaLanzamiento,
            $libroSTD->activo);
            array_push($arrayLibros,$libro);
        }

        return $arrayLibros;
    }

    public static function FindByID($isbn){

        $sql = 'SELECT * FROM Libros WHERE isbn = ? AND activo = 1';
        $parametros = array($isbn);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($libroSTD = $result->fetchObject()){
            $libro = new Libro($libroSTD->isbn,
            $libroSTD->titulo,
            $libroSTD->autor,
            $libroSTD->editorial,
            $libroSTD->fechaLanzamiento,
            $libroSTD->activo);
            return $libro;
        }else
            return null;
    }

    public static function insert($libro){

        $sql = "INSERT INTO Libros(isbn,titulo,autor,editorial,fechaLanzamiento) VALUES (?,?,?,?,?)";

        // $parametros = array($libro->isbn,$libro->titulo,$libro->autor,$libro->editorial,$libro->fechaLanzamiento);
        $libro = array_values((array)$libro);
        array_pop($libro);
        $parametros = $libro;

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        return true;
    }

    public static function update($libro){

        $sql = "UPDATE Libros SET isbn = ?,
        titulo = ?,
        autor = ?,
        editorial = ?,
        fechaLanzamiento = ?
        WHERE isbn = ?";

        $parametros = array($libro->isbn,
        $libro->titulo,
        $libro->autor,
        $libro->editorial,
        $libro->fechaLanzamiento,
        $libro->isbn);

        $result = FactoryBD::RealizaConsulta($sql,$parametros);
        return true;
    }

    public static function delete($libro){

        $sql = "UPDATE Libros SET activo = 0 WHERE isbn = ?";

        $parametros = array($libro->isbn);

        $result = FactoryBD::RealizaConsulta($sql,$parametros);

        return true;
    }

    public static function buscaTitulo($nombre){

        $sql = 'SELECT * FROM Libros WHERE titulo LIKE ?';

        $nombre = '%'.$nombre.'%';
        $parametros = array($nombre);

        $result = FactoryBD::RealizaConsulta($sql,$parametros);

        if($libroSTD = $result->fetchObject()){
            $libro = new Libro($libroSTD->isbn,
            $libroSTD->titulo,
            $libroSTD->autor,
            $libroSTD->editorial,
            $libroSTD->fechaLanzamiento);
            return $libro;
        }else{
            return null;
        }
    }
}

?>