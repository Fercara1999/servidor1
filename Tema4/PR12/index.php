<?php

require("./confBD.php");
include("./funciones.php");

cargaScript();

if(isset($_REQUEST['Crear'])){
    insertaScript();
}

?>