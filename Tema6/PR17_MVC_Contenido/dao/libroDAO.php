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

    public static function nuevoLibro(){

        $isbn = $_REQUEST['isbn'];
        $titulo = $_REQUEST['titulo'];
        $autor = $_REQUEST['autor'];
        $editorial = $_REQUEST['editorial'];
        $genero = $_REQUEST['genero'];
        $anoPublicacion = $_REQUEST['anoPublicacion'];
        $sinopsis = $_REQUEST['sinopsis'];
        $rutaPortada = $_REQUEST['ruta'];
        $precio = $_REQUEST['precio'];
        $unidades = $_REQUEST['unidades'];

        try {

            $sql = 'INSERT INTO libros(ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades) VALUES (?,?,?,?,?,?,?,?,?,?)';
            $parametros = array($isbn,$titulo,$autor,$editorial,$genero,$anoPublicacion,$sinopsis,$rutaPortada,$precio,$unidades);

            FactoryBD::realizaConsulta($sql,$parametros);

            echo "Libro introducido con exito";
            unset($con);
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }

    public static function verProductos(){
        $usuario = $_SESSION['usuario']->usuario;
        try {
    
            $sql = 'SELECT * FROM libros WHERE borrado = false';
            $parametros = array();
            $result = FactoryBD::realizaConsulta($sql,$parametros);
    
            $resultados = $result->fetchAll(PDO::FETCH_ASSOC);
            echo "<h1>Libros</h1>";
            echo "<table class='table table-hover'>";
            echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Género</th><th>Año de publicación</th><th>Sinópsis</th><th>Ruta portada</th><th>Precio</th><th>Unidades</th></tr>";
    
            foreach ($resultados as $valores) {
                echo '<tr>';
                echo "<form method='post'>";
                
                foreach ($valores as $campo => $valor) {
                    if($campo != 'borrado'){
                        echo "<input type='hidden' name='$campo' value='$valor'>";
                        echo '<td>'.$valor.'</td>';
                    }
                }
                if($_SESSION['usuario']->rol == 'administrador'){
                    echo '<td><input type="submit" class="bg-warning btn" value="Modificar" name="modificarProducto" id="modificarProducto"</td>';
                    echo '<td><input type="submit" class="bg-danger btn" value="Borrar" name="borrarProducto" id="borrarProducto"</td></form>';
                }
                echo "</tr>";
            }
    
            echo "</table>";
            unset($con);
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
            unset($con);
        }
    }

    public static function modificarLibro(){
        $producto = $_REQUEST['ISBN'];
    
        try {
            $sql = 'SELECT * FROM libros WHERE isbn = ? and borrado = false';
            $parametros = array($producto);
            $result = FactoryBD::realizaConsulta($sql,$parametros);
    
            $resultados = $result->fetch(PDO::FETCH_ASSOC);
    
            echo "<table class='table table-hover'>";
            echo "<tr><th>ISBN</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Género</th><th>Año de publicación</th><th>Sinópsis</th><th>Ruta portada</th><th>Precio</th><th>Unidades</th></tr>";
    
            echo '<tr>';
            echo "<form method='post'>";
    
            foreach ($resultados as $campo => $valores) {
                if($campo == 'ISBN'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
                } else if($campo == 'titulo' || $campo == 'autor' || $campo == 'editorial' || $campo == 'sinopsis' || $campo == 'rutaPortada'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
                } else if($campo == 'genero'){
                    echo '<td><select name="genero" class="form-control" id="genero">';
                    echo '<option value="0">Selecciona una opción</option>';
                    $generos = array("aventuras", "ficcion", "policiaco", "terror", "misterio", "romantica", "humor", "poesia", "mitologia", "teatro", "cuento", "no_ficcion");
    
                    foreach ($generos as $opcion) {
                        $selected = ($valores == $opcion) ? 'selected' : '';
                        echo '<option value="'.$opcion.'" '.$selected.'>'.$opcion.'</option>';
                    }
                    echo '</select></td>';
                } else if($campo == 'anioPublicacion' || $campo == 'unidades') {
                    echo '<td><input type="number" class="form-control" name="'.$campo.'" value="'.$valores.'" min="1"></td>';
                } else if($campo == 'precio') {
                    echo '<td><input type="number" class="form-control" name="'.$campo.'" value="'.$valores.'" step="0.01"></td>';
                } else if($campo != 'borrado'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
                }
            }
    
            echo "<td><input type='submit' class='btn bg-success' value='Guardar cambios' name='guardarCambiosProducto'></td></form>";
    
            echo "</tr>";
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
            unset($con);
        }
    
    }

    public static function guardaCambiosProducto(){
        $isbn = $_REQUEST['ISBN'];
        $titulo = $_REQUEST['titulo'];
        $autor = $_REQUEST['autor'];
        $editorial = $_REQUEST['editorial'];
        $genero = $_REQUEST['genero'];
        $anoPublicacion = $_REQUEST['anioPublicacion'];
        $sinopsis = $_REQUEST['sinopsis'];
        $rutaPortada = $_REQUEST['rutaPortada'];
        $precio = $_REQUEST['precio'];
        $unidades = $_REQUEST['unidades'];
    
        try {
            $sql = 'UPDATE libros SET ISBN = ?, titulo = ?, autor = ?, editorial = ?, genero = ?, anioPublicacion = ?, sinopsis = ?, rutaPortada = ?, precio = ?, unidades = ? WHERE ISBN = ?';
            $parametros = array($isbn,$titulo,$autor,$editorial,$genero,$anoPublicacion,$sinopsis,$rutaPortada,$precio,$unidades,$isbn);

            FactoryBD::realizaConsulta($sql,$parametros);
    
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }

    public static function borraProducto(){
        $isbn = $_REQUEST['ISBN'];
    
        try {    
            $sql = 'UPDATE libros SET borrado = true WHERE ISBN = ?';
            $parametros = array($isbn);
    
            FactoryBD::realizaConsulta($sql,$parametros);
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }

    public static function buscarLibros($busqueda) {
        try {
            $sql = 'SELECT * FROM libros WHERE 
                    ISBN LIKE ? OR
                    titulo LIKE ? OR
                    autor LIKE ? OR
                    editorial LIKE ? OR
                    genero LIKE ?';
    
            $busquedaParam = "%{$busqueda}%";
            $parametros = array($busquedaParam,$busquedaParam,$busquedaParam,$busquedaParam,$busquedaParam);

            $result = FactoryBD::realizaConsulta($sql,$parametros);
    
            $resultados = $result->fetchAll(PDO::FETCH_ASSOC);
    
            if($resultados){
                echo '<div class="row g-3">';
    
                foreach ($resultados as $valores) {
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
                        echo "<form method='post'>";
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
            }else{
                echo '<div class="container mt-5 text-center">';
            echo '<h1 class="mb-4">No se encontraron resultados para la búsqueda</h1></div>';
            }
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }
}

?>