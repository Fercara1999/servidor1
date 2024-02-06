<a href="index.php"><- Volver</a>
<?php

require("./funciones/funciones.php");
require("./funciones/funcionesBD.php");


if(isset($_REQUEST['id'])){
    $producto = findById($_REQUEST['id']);
    if($producto){
        insertarCookie();
    }else{
        echo "No existe el producto";
    }
}

?>