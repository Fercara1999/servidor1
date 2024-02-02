<?php

class  AlbaranDAO{

    public static function findAll(){
        //return array con todos los libros
        $sql = "SELECT * FROM albaranes WHERE borrado = false";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayalbaranes = array();

        while($albaranSTD = $result->fetchObject()){
            $albaran = new Albaran($albaranSTD->codigoAlbaran,
            $albaranSTD->fechaAlbaran,
            $albaranSTD->ISBN_libro,
            $albaranSTD->cantidadIncremento,
            $albaranSTD->id_usuario,
            $albaranSTD->borrado);
            array_push($arrayalbaranes,$albaran);
        }

        return $arrayalbaranes;
    }

    public static function findbyId($id){
        
        $sql = "SELECT * FROM  albaranes WHERE codigoAlbaran = ? and borrado = 0";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($albaranSTD = $result->fetchObject()){
            $albaran = new Albaran($albaranSTD->codigoAlbaran,
            $albaranSTD->fechaAlbaran,
            $albaranSTD->ISBN_libro,
            $albaranSTD->cantidadIncremento,
            $albaranSTD->id_usuario,
            $albaranSTD->borrado);
            return $albaran;
        }else{
        }
    }

    public static function insert($albaran){
        $sql = "INSERT INTO albaran(codigoAlbaran,fechaAlbaran,ISBN_libro,cantidadIncremento,id_usuario,borrado) VALUES(?,?,?,?,?,?)";
        $parametros = array($albaran->codigoAlbaran,
        $albaran->fechaAlbaran,
        $albaran->ISBN_libro,
        $albaran->cantidadIncremento,
        $albaran->id_usuario,
        $albaran->borrado);
        // unset($parametros['fechaNacimiento']);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function update($albaran){
        $sql = 'UPDATE albaranes SET codigoAlbaran = ?,
        fechaAlbaran = ?
        ISBN_libro = ?,
        cantidadIncremento = ?,
        id_usuario = ?,
        borrado = ?
        WHERE codigoAlbaran = ?';
        
        $parametros = array($albaran->codigoAlbaran,
        $albaran->fechaAlbaran,
        $albaran->ISBN_libro,
        $albaran->cantidadIncremento,
        $albaran->id_usuario,
        $albaran->borrado);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function delete($albaran){
        $sql = "UPDATE albaranes SET borrado = true WHERE codigoAlbaran = ?";

        $parametros = array($albaran->codigoAlbaran);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function activar($albaran){
        $sql = "UPDATE albaranes SET borrado = false WHERE codigoAlbaran = ?";

        $parametros = array($albaran->codigoAlbaran);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function nuevoAlbaran(){
        $fecha = $_REQUEST['fechaAlbaran'];

        $isbn = $_REQUEST['isbn'];
        $cantidad = $_REQUEST['cantidad'];

        $usuario = $_SESSION['usuario']->id_usuario;

        try {
            $sql = 'INSERT INTO albaranes(fechaAlbaran, ISBN_libro, cantidadIncremento, id_usuario) VALUES (?,?,?,?)';
            $parametros = array($fecha,$isbn,$cantidad,$usuario);
            FactoryBD::realizaConsulta($sql,$parametros);

            $sql = 'UPDATE libros SET unidades = unidades + ? WHERE isbn = ?';
            $parametros = array($cantidad,$isbn);
            FactoryBD::realizaConsulta($sql,$parametros);

            return true;
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }

    public static function verAlbaranes(){
        $usuario = $_SESSION['usuario']->usuario;
        try {
    
            $sql = 'SELECT * FROM albaranes where borrado = false';
            $parametros = array();
            $result =  FactoryBD::realizaConsulta($sql,$parametros);
    
            $resultados = $result->fetchAll(PDO::FETCH_ASSOC);
            echo "<h1>Albaranes</h1>";
            echo "<table class='table table-hover'>";
            echo "<tr><th>Codigo albarán</th><th>Fecha albarán</th><th>ISBN</th><th>Cantidad</th><th>ID usuario</th></tr>";
    
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
                    echo '<td><input type="submit" class="bg-warning btn" value="Modificar" name="modificarAlbaran" id="modificarAlbaran"</td>';
                    echo '<td><input type="submit" class="bg-danger btn" value="Borrar" name="borrarAlbaran" id="borrarAlbaran"</td></form>';
                }
    
                echo "</tr>";
            }
    
            echo "</table>";
    
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
            unset($con);
        }
    }

    public static function modificarAlbaran(){
        $albaran = $_REQUEST['codigoAlbaran'];
    
        try {
            $sql = 'SELECT * FROM albaranes WHERE codigoAlbaran = ? and borrado = false';
            $parametros = array($albaran);
            
            $result = FactoryBD::realizaConsulta($sql,$parametros);
    
            $resultados = $result->fetch(PDO::FETCH_ASSOC);
    
            echo "<table class='table table-hover'>";
            echo "<tr><th>Codigo albarán</th><th>Fecha albarán</th><th>ISBN</th><th>Cantidad</th><th>ID usuario</th></tr>";
    
            echo '<tr>';
            echo "<form method='post'>";
            foreach ($resultados as $campo => $valores) {
                if($campo == 'codigoAlbaran'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
                }else if($campo == 'id_usuario'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
                }else if($campo == 'fechaAlbaran')
                    echo '<td><input type="date" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
                else if($campo == 'cantidadIncremento')
                    echo '<td><input type="number" class="form-control" name="'.$campo.'" value="'.$valores.'" min="1"></td>';
                else if($campo != 'borrado'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
                }
            }
    
                echo "<td><input type='submit' class='btn bg-success' value='Guardar cambios' name='guardarCambiosAlbaran'></td></form>";
    
            echo "</tr>";
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    
    }

    public static function guardaCambiosAlbaran(){
        $albaran = $_REQUEST['codigoAlbaran'];
        $fechaAlbaran = $_REQUEST['fechaAlbaran'];
        $ISBN = $_REQUEST['ISBN_libro'];
        $cantidad = $_REQUEST['cantidadIncremento'];
    
        try {
            $sqlAlbaranesOriginal = 'SELECT cantidadIncremento FROM albaranes WHERE codigoAlbaran = ?';
            $parametros = array($albaran);
            $result = FactoryBD::realizaConsulta($sqlAlbaranesOriginal,$parametros);
            $resultAlbaranesOriginal = $result->fetch(PDO::FETCH_ASSOC);
            $cantidadOriginal = $resultAlbaranesOriginal['cantidadIncremento'];
    
            $sqlAlbaranes = 'UPDATE albaranes SET fechaAlbaran = ?, ISBN_libro = ?, cantidadIncremento = ? WHERE codigoAlbaran = ?';
            $parametros = array($fechaAlbaran,$ISBN,$cantidad,$albaran);
            FactoryBD::realizaConsulta($sqlAlbaranes,$parametros);
    
            $sqlLibros = 'SELECT unidades FROM libros WHERE ISBN = ?';
            $parametros = array($ISBN);
            $result = FactoryBD::realizaConsulta($sqlLibros,$parametros);
            $resultLibros = $result->fetch(PDO::FETCH_ASSOC);
    
            $diferenciaCantidad = $cantidad - $cantidadOriginal;
            $nuevaCantidadLibros = $resultLibros['unidades'] + $diferenciaCantidad;
    
            $sqlUpdateLibros = 'UPDATE libros SET unidades = ? WHERE ISBN = ?';
            $parametros = array($nuevaCantidadLibros,$ISBN);
            FactoryBD::realizaConsulta($sqlUpdateLibros,$parametros);

            return true;
    
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }

    public static function borraAlbaran(){
        $albaran = $_REQUEST['codigoAlbaran'];
    
        try {
            $sql = 'UPDATE albaranes SET borrado = true WHERE codigoAlbaran = ?';
            $parametros = array($albaran);
    
            FactoryBD::realizaConsulta($sql,$parametros);
            return true;
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }

}

?>