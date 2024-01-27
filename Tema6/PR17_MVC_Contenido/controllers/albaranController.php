<?php

$erroresAlbaran = [];

if(isset($_REQUEST['registrarNuevoAlbaran']) && validaAlbaran($erroresAlbaran)){
    AlbaranDAO::nuevoAlbaran();
}else if(isset($_REQUEST['registrarNuevoAlbaran'])){
    muestraErroresArray($erroresAlbaran);
}else if(isset($_REQUEST['modificarAlbaran'])){
    AlbaranDAO::modificarAlbaran();
}else if(isset($_REQUEST['guardarCambiosAlbaran'])){
    AlbaranDAO::guardaCambiosAlbaran();
    $_SESSION['vista'] = VIEW.'home.php';
    echo "Albarán modificado con exito";
}else if(isset($_REQUEST['borrarAlbaran'])){
    AlbaranDAO::borraAlbaran();
    $_SESSION['vista'] = VIEW.'home.php';
    echo "Albarán eliminado con exito";
}

?>