<?php

$erroresAlbaran = [];

if(isset($_REQUEST['registrarNuevoAlbaran']) && validaAlbaran($erroresAlbaran)){
    AlbaranDAO::nuevoAlbaran();
}else if(isset($_REQUEST['registrarNuevoAlbaran'])){
    muestraErroresArray($erroresAlbaran);
}

?>