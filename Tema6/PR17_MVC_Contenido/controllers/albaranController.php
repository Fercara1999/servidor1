<?php

$erroresAlbaran = [];

if(isset($_REQUEST['registrarNuevoAlbaran']) && validaAlbaran($erroresAlbaran)){
    if(AlbaranDAO::nuevoAlbaran())
        $mensaje = "Albarán introducido con exito";
}else if(isset($_REQUEST['registrarNuevoAlbaran'])){
    $erroresAlbaran = muestraErroresArray($erroresAlbaran);
}else if(isset($_REQUEST['modificarAlbaran'])){
    AlbaranDAO::modificarAlbaran();
}else if(isset($_REQUEST['guardarCambiosAlbaran'])){
    if(AlbaranDAO::guardaCambiosAlbaran())
        $mensaje = "Albarán modificado con exito";
}else if(isset($_REQUEST['borrarAlbaran'])){
    if(AlbaranDAO::borraAlbaran())
        $mensaje = "Albarán eliminado con exito";
}

?>