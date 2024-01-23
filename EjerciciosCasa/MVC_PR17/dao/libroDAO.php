<?php

class LibroDAO{

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

    // Se ejecuta al abrir la página principal y muestra en cards los datos de todos los libros de la tabla libros
    public static function verLibros(){
        try {
            $con = new PDO(DSN, USER, PASSWORD);

            $sql = 'SELECT * FROM libros WHERE borrado = false';
            $stmt = $con->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<div class="row g-3">';

            foreach ($result as $valores) {
                echo '<div class="col-md-4">';
                echo '<div class="card">';
                echo '<div class="row g-0">';
                
                echo '<div class="col-6">';
                foreach ($valores as $dato => $valor) {
                    if ($dato != 'borrado') {
                        if ($dato == 'rutaPortada') {
                            echo '<img src="'.$valor.'" class="img-fluid w-100" alt="card-horizontal-image" width="150px">';
                        }
                    }
                }
                echo '</div>';
                
                echo '<div class="col-6">';
                echo '<div class="card-body">';
                foreach ($valores as $dato => $valor) {
                    echo "<form method='post' action=''>"; //.VIEW."carrito.php'
                    if ($dato != 'borrado') {
                        if ($dato == 'ISBN') {
                            echo "<input type='hidden' name='isbn' value='$valor' id='isbn'>";
                        }
                        if ($dato == 'titulo') {
                            echo '<h5 class="card-title">'.$valor.'</h5>';
                        }
                        if ($dato == 'autor') {
                            echo '<p class="card-text"><small class="text-muted">'.$valor.'</small></p>';
                        }
                        if ($dato == 'sinopsis') {
                            echo '<p class="card-text">'.$valor.'</p>';
                        }
                        if ($dato == 'precio') {
                            echo '<h5 class="card-title">'.$valor.'€</h5>';
                        }
                    }
                }
                echo "<input type='submit' class='btn btn-primary' value='Añadir al carrito' id='anadir' name='anadir'>";
                echo "</form>";
                echo '</div></div>';
                
                echo '</div></div></div>';
            }

            echo '</div>';
            unset($con);
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
            unset($con);
        }
    }
}

?>