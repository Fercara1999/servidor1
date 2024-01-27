<?php

class PedidoDAO{

    public static function findAll(){
        //return array con todos los libros
        $sql = "SELECT * FROM pedidos WHERE borrado = false";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arraypedidos = array();

        while($pedidoSTD = $result->fetchObject()){
            $pedido = new Pedido($pedidoSTD->idPedido,
            $pedidoSTD->id_usuario,
            $pedidoSTD->fechaPedido,
            $pedidoSTD->ISBN,
            $pedidoSTD->cantidad,
            $pedidoSTD->precioTotal,
            $pedidoSTD->borrado);
            array_push($arraypedidos,$pedido);
        }

        return $arraypedidos;
    }

    public static function findbyId($id){
        
        $sql = "SELECT * FROM pedidos WHERE idPedido = ? and borrado = 0";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($pedidoSTD = $result->fetchObject()){
            $pedido = new Pedido($pedidoSTD->idPedido,
            $pedidoSTD->id_usuario,
            $pedidoSTD->fechaPedido,
            $pedidoSTD->ISBN,
            $pedidoSTD->cantidad,
            $pedidoSTD->precioTotal,
            $pedidoSTD->borrado);
            return $pedido;
        }else{
        }
    }

    public static function insert($pedido){
        $sql = "INSERT INTO pedidos(idPedido,id_usuario,fechaPedido,ISBN,cantidad,precioTotal,borrado) VALUES(?,?,?,?,?,?,?)";
        $parametros = array($pedido->idPedido,
            $pedido->id_usuario,
            $pedido->fechaPedido,
            $pedido->ISBN,
            $pedido->cantidad,
            $pedido->precioTotal,
            $pedido->borrado,);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function update($pedido){
        $sql = 'UPDATE pedidos SET idPedido = ?,
        id_usuario = ?
        fechaPedido = ?,
        ISBN = ?,
        cantidad = ?,
        precioTotal = ?,
        borrado = ?
        WHERE ISBN = ?';
        
        $parametros = array($pedido->idPedido,
        $pedido->id_usuario,
        $pedido->fechaPedido,
        $pedido->ISBN,
        $pedido->cantidad,
        $pedido->precioTotal,
        $pedido->borrado,);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function delete($pedido){
        $sql = "UPDATE pedidos SET borrado = true WHERE idPedido = ?";

        $parametros = array($pedido->ISBN);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function activar($pedido){
        $sql = "UPDATE pedidos SET borrado = false WHERE idPedido = ?";

        $parametros = array($pedido->ISBN);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function misPedidos(){
        echo '<br><h1 class="mb-1">Mis pedidos</h1>';
    $usuario = $_SESSION['usuario']->id_usuario;

    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM pedidos WHERE id_usuario = ? and borrado = false';
        $stmt = $con->prepare($sql);

        $stmt->execute(array($usuario));
        
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

            echo '<div class="col">';
            echo '<div class="card">';
            echo '<div class="row g-0">';
            
            echo '<div class="col-md-2">';

            echo "<form method='post' action='./creaFactura.php'>";
            foreach ($result as $datos => $valores) {
                if($datos == 'ISBN'){
                    $sqln = 'SELECT * FROM libros WHERE ISBN = ?';
                    $stmtn = $con->prepare($sqln);
                    $stmtn->execute(array($valores));
                    $resultado = $stmtn->fetch(PDO::FETCH_ASSOC);
                    foreach ($resultado as $datosResultado => $valoresResultado){
                        if($datosResultado == 'rutaPortada'){
                            echo "<input type='hidden' name='$datosResultado' value='$valoresResultado'>";
                            echo '<img src="'.$valoresResultado.'" class="img-fluid h-100" alt="card-vertical-image" width="250px">';
                        }
                    }
                }
            }
            echo '</div>';
            
            echo '<div class="col-md-6">';
            echo '<div class="card-body">';
            echo "<input type='hidden' name='usuario' value='".$_SESSION['usuario']->usuario."'>";
            echo "<input type='hidden' name='correo' value='".$_SESSION['usuario']->correo."'>";
            echo "<input type='hidden' name='fechaNacimiento' value='".$_SESSION['usuario']->fechaNacimiento."'>";
            foreach ($result as $datos => $valores) {
                if($datos == 'idPedido') {
                    echo "<input type='hidden' name='$datos' value='$valores'>";
                    echo "<h1 class='card-title'>Número de pedido: $valores</h1>";
                }else if($datos == 'fechaPedido'){
                    echo "<input type='hidden' name='$datos' value='$valores'>";
                    echo "<h6 class='card-subtitle text-muted mt-2'>Fecha de pedido: $valores</h6>";
                }else if($datos == 'ISBN'){
                    $sqln = 'SELECT * FROM libros WHERE ISBN = ?';
                    $stmtn = $con->prepare($sqln);
                    $stmtn->execute(array($valores));
                    $resultadoLibro = $stmtn->fetch(PDO::FETCH_ASSOC);
                    foreach($resultadoLibro as $datosLibro => $valoresLibro){
                        if($datosLibro == 'titulo'){
                            echo "<input type='hidden' name='$datosLibro' value='$valoresLibro'>";
                            echo "<h2 class='mt-4'>Título pedido: $valoresLibro</h2>";
                        }if($datosLibro == 'precio'){
                            echo "<div class='d-flex align-items-center'>";
                            echo "<input type='hidden' name='$datosLibro' value='$valoresLibro'>";
                            echo "<h4 class='mt-3 me-4'>Precio libro: ".$valoresLibro."€</h4>";
                        }
                    }
                }else if($datos == 'cantidad'){
                    echo "<input type='hidden' name='$datos' value='$valores'>";
                    echo "<h4 class='mt-3 me-4'>Cantidad pedida: $valores</h4>";
                }else if($datos == 'precioTotal'){
                    echo "<input type='hidden' name='$datos' value='$valores'>";
                    echo "<h4 class='mt-3'>Importe total: ".$valores."€</h4>";
                    echo "</div>";
                }
            }
            echo '</div>';
            echo "<input type='submit' name='factura' id='factura' class='btn btn-primary me-3' value='Descargar factura'>";
            echo '</div>';
            
            echo '</div>';
            echo '</div>';
            echo "</form>";
        }
        unset($con);

    } catch (\Throwable $th) {
        muestraErroresCatch($th);
    }
    }

    public static function finalizarCompra() {
        if (empty($_SESSION['usuario']->id_usuario)) {
            echo '<div class="container mt-5 text-center">';
            echo '<h1 class="mb-4">Debes estar registrado para finalizar la compra</h1></div>';
        } else {
            $usuario = $_SESSION['usuario']->id_usuario;
    
            $hoy = new DateTime();
            $fechaHoy = $hoy->format('Y-m-d');
            
            $libro = $_REQUEST['isbn'];
            $cantidad = $_REQUEST['cantidad'];
    
            try {
                //Obtiene las unidades de las que disponemos para ese libro
                $sqlUnidades = 'SELECT unidades FROM libros WHERE isbn = ?';
                $parametros = array($libro);
                $result = FactoryBD::realizaConsulta($sqlUnidades,$parametros);
                $unidadesDisponibles = $result->fetchColumn();
    
                // Si hay más unidades que cantidad nos pide, entra en este if
                if ($cantidad <= $unidadesDisponibles) {
                    // Resta a las unidades las que le estamos pidiendo
                    $sqlActualizarUnidades = 'UPDATE libros SET unidades = unidades - ? WHERE isbn = ?';
                    $parametros = array($cantidad,$libro);
                    $result = FactoryBD::realizaConsulta($sqlActualizarUnidades,$parametros);
                    $precioTotal = $_REQUEST['precio'] * $cantidad;
                    // Inserta el pedido en la bd
                    $sqlInsertarPedido = 'INSERT INTO pedidos(id_usuario, fechaPedido, ISBN, cantidad, precioTotal) VALUES (?, ?, ?, ?, ?)';
                    $parametros = array($usuario,$fechaHoy,$libro,$cantidad,$precioTotal);
                    $result = FactoryBD::realizaConsulta($sqlInsertarPedido,$parametros);
    
                } else {
                    echo '<div class="container mt-5 text-center">';
                    echo '<h1 class="mb-4">No hay suficientes unidades disponibles para realizar la compra</h1></div>';
                }
            } catch (\Throwable $th) {
                muestraErroresCatch($th);
            }
        }
    }

    public static function verPedidos(){
        $usuario = $_SESSION['usuario']->usuario;
        try {
    
            $sql = 'SELECT * FROM pedidos WHERE borrado = false';
            $parametros = array();
            
            $result = FactoryBD::realizaConsulta($sql,$parametros);
    
            $resultados = $result->fetchAll(PDO::FETCH_ASSOC);
            echo "<h1>Pedidos</h1>";
            echo "<table class='table table-hover'>";
            echo "<tr><th>ID pedido</th><th>ID usuario</th><th>Fecha pedido</th><th>ISBN</th><th>Cantidad</th><th>Precio total</th></tr>";
    
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
                    echo '<td><input type="submit" class="bg-warning btn" value="Modificar" name="modificarPedido" id="modificarPedido"</td>';
                    echo '<td><input type="submit" class="bg-danger btn" value="Borrar" name="borrarPedido" id="borrarPedido"</td></form>';
                }
                echo "</tr>";
            }
    
            echo "</table>";
    
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
            unset($con);
        }
    }

    public static function modificarPedido(){
        $pedido = $_REQUEST['idPedido'];
    
        try {
            $sql = 'SELECT * FROM pedidos WHERE idPedido = ? and borrado = false';
            $parametros = array($pedido);
            $result = FactoryBD::realizaConsulta($sql,$parametros);
    
            $resultados = $result->fetch(PDO::FETCH_ASSOC);
    
            echo "<table class='table table-hover'>";
            echo "<tr><th>ID pedido</th><th>ID usuario</th><th>Fecha pedido</th><th>ISBN</th><th>Cantidad</th><th>Precio total</th></tr>";
    
            echo '<tr>';
            echo "<form method='post'>";
            foreach ($resultados as $campo => $valores) {
                if($campo == 'idPedido'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
                }else if($campo == 'id_usuario'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
                }else if($campo == 'fechaPedido')
                    echo '<td><input type="date" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
                else if($campo == 'ISBN')
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
                else if($campo == 'cantidad'){
                    echo '<td><input type="number" class="form-control" name="'.$campo.'" value="'.$valores.'" min="1"></td>';
                }else if ($campo == 'precioTotal'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'" readonly></td>';
                }else if($campo != 'borrado'){
                    echo '<td><input type="text" class="form-control" name="'.$campo.'" value="'.$valores.'"></td>';
                }
            }
    
                echo "<td><input type='submit' class='btn bg-success' value='Guardar cambios' name='guardarCambiosPedido'></td></form>";
    
            echo "</tr>";
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    
    }

    public static function guardaCambiosPedido(){
        $idPedido = $_REQUEST['idPedido'];
        $fechaPedido = $_REQUEST['fechaPedido'];
        $ISBN = $_REQUEST['ISBN'];
        $cantidad = $_REQUEST['cantidad'];
    
        try {
            $sqlPrecioPorUnidad = 'SELECT precio FROM libros WHERE ISBN = ?';
            $parametros = array($ISBN);
            $result = FactoryBD::realizaConsulta($sqlPrecioPorUnidad,$parametros);
            $precioPorUnidad = $result->fetchColumn();
    
            $nuevoPrecioTotal = $cantidad * $precioPorUnidad;
    
            $sqlPedidos = 'UPDATE pedidos SET fechaPedido = ?, ISBN = ?, cantidad = ?, precioTotal = ? WHERE idPedido = ?';
            $parametros = array($fechaPedido,$ISBN,$cantidad,$nuevoPrecioTotal,$idPedido);
            $result = FactoryBD::realizaConsulta($sqlPedidos,$parametros);
    
            $sqlUpdateLibros = 'UPDATE libros SET unidades = unidades + ? WHERE ISBN = ?';
            $parametros = array($cantidad,$ISBN);
            FactoryBD::realizaConsulta($sqlUpdateLibros,$parametros);
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }

    public static function borraPedido(){
        $pedido = $_REQUEST['idPedido'];
    
        try {
            $sql = 'UPDATE pedidos SET borrado = true WHERE idPedido = ?';
            $parametros = array($pedido);
    
            FactoryBD::realizaConsulta($sql,$parametros);
        } catch (\Throwable $th) {
            muestraErroresCatch($th);
        }
    }
}

?>