<?php

require("./funciones/confBD.php");

// Función que valida el usuario que metemos
function validaUsuario($user,$pass){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "select * from usuarios where usuario = ? and clave = ?";
        $stmt = $con->prepare($sql);
        $pass = sha1($pass);
        // $user y $pass son los parámetros que metemos nosotros
        $stmt->execute([$user,$pass]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        // Si usuario devuelve true es que existe el usuario por lo que lo devuelve
        if($usuario){
            return $usuario;
        }
        //Si no, que devuelva false
        return false;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        // Finalmente, cierra la sesión
        unset($con);
    }
}

function compruebaPaginas($user){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "select url from paginas where codigo IN (select codigoPagina from accede where codigoPerfil = (select perfil from usuarios
        s where usuario = ?));";
        $stmt = $con->prepare($sql);
        $stmt->execute([$user]);
        $paginas = $stmt->fetchAll(PDO::FETCH_NUM);
        echo "Puedes acceder a las páginas: ";
            foreach ($paginas as $pagina => $value) {
                echo $paginas[$pagina][0].", ";
            }

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

?>