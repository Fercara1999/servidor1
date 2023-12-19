<?php

require("./seguro/datos.php");
require("./funciones.php");

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
     if(esUsuario()){
        header("Location: ./paginaUsuario.php");
        exit;
     }else{
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        exit;
     }
}else{
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        exit;
}

?>