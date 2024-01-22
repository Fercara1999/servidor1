<?php

class UserDAO{

    public static function verLibros(){
        
    }
    public static function findAll(){
        //return array con todos los libros
        $sql = "SELECT * FROM libros WHERE borrado = false";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arraylibros = array();

        while($libroSTD = $result->fetchObject()){
            $libro = new Libro($libroSTD->isbn,
            $libroSTD->titulo,
            $libroSTD->autor,
            $libroSTD->editorial,
            $libroSTD->genero,
            $libroSTD->anioPublicacion,
            $libroSTD->sinopsis,
            $libroSTD->rutaPortada,
            $libroSTD->precio,
            $libroSTD->unidades,
            $libroSTD->borrado);
            array_push($arraylibros,$libro);
        }

        return $arraylibros;
    }

    public static function findbyId($id){
        
        $sql = "SELECT * FROM libros WHERE ISBN = ? and borrado = 0";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($libroSTD = $result->fetchObject()){
            $libro = new Libro($libroSTD->isbn,
            $libroSTD->titulo,
            $libroSTD->autor,
            $libroSTD->editorial,
            $libroSTD->genero,
            $libroSTD->anioPublicacion,
            $libroSTD->sinopsis,
            $libroSTD->rutaPortada,
            $libroSTD->precio,
            $libroSTD->unidades,
            $libroSTD->borrado);
            return $libro;
        }else{
        }
    }

    public static function insert($libro){
        $sql = "INSERT INTO libros(ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $parametros = array($libro->isbn,
            $libro->titulo,
            $libro->autor,
            $libro->editorial,
            $libro->genero,
            $libro->anioPublicacion,
            $libro->sinopsis,
            $libro->rutaPortada,
            $libro->precio,
            $libro->unidades,
            $libro->borrado);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function update($libro){
        $sql = 'UPDATE libros SET ISBN = ?,
        titulo = ?
        autor = ?,
        editorial = ?,
        genero = ?,
        anioPublicacion = ?,
        sinopsis = ?,
        rutaPortada = ?,
        precio = ?,
        unidades = ?,
        borrado = ?
        WHERE ISBN = ?';
        
        $parametros = array($libro->isbn,
        $libro->titulo,
        $libro->autor,
        $libro->editorial,
        $libro->genero,
        $libro->anioPublicacion,
        $libro->sinopsis,
        $libro->rutaPortada,
        $libro->precio,
        $libro->unidades,
        $libro->borrado);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function delete($libro){
        $sql = "UPDATE libros SET borrado = true WHERE ISBN = ?";

        $parametros = array($libro->ISBN);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function activar($libro){
        $sql = "UPDATE libros SET borrado = false WHERE ISBN = ?";

        $parametros = array($libro->ISBN);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function buscarPorNombre($nombre){
        $sql = "SELECT * FROM  libros WHERE titulo like ? and borrado = 0";
        $nombre = '%'.$nombre.'%';
        $parametros = array($nombre);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($libroSTD = $result->fetchObject()){
            $libro = new Libro($libroSTD->isbn,
            $libroSTD->titulo,
            $libroSTD->autor,
            $libroSTD->editorial,
            $libroSTD->genero,
            $libroSTD->anioPublicacion,
            $libroSTD->sinopsis,
            $libroSTD->rutaPortada,
            $libroSTD->precio,
            $libroSTD->unidades,
            $libroSTD->borrado);
            return $libro;
        }else{
            return null;
        }
    }
}

?>