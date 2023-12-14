<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Autentificación authserver</h1>

    <?php

    require('./seguro/datos.php');

        // Si existe el usuario logueado

        if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
            // redirige a user o admin
            if(isUser()){
                header('Location: ./paginaUser.php');
                exit;
            }else if(isAdmin()){
                header('Location: ./paginaAdmin.php');
                exit;
            // no es nada, pide login
            }else{
                header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                header('HTTP/1.0 401 Unauthorized');
                exit;
        //pide login
        }else{
            header('WWW-Authenticate: Basic Realm="Contenido restringido"');
            header('HTTP/1.0 401 Unauthorized');
            exit;
        }
            // if($_SERVER['PHP_AUTH_USER'] != USER || hash('sha256',$_SERVER['PHP_AUTH_PW']) != PASS){
            // if($_SERVER['PHP_AUTH_USER'] == USER && hash('sha256',$_SERVER['PHP_AUTH_PW']) == PASS){
            //     header("Location: ./seguro/paginaUser.php");
            //     // header('Location: ./index.php');
            //     exit;
            // }else if($_SERVER['PHP_AUTH_USER'] == USERA && hash('sha256',$_SERVER['PHP_AUTH_PW']) == PASSA){
            //         header("Location: ./seguro/paginaAdmin.php");
            //         // header('Location: ./index.php');
            //         exit;
            // }
            }else{
                // header('Location: ./index.php');
                header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                header('HTTP/1.0 401 Unauthorized');
                // exit;
            }
        }else{
            header('WWW-Authenticate: Basic Realm="Contenido restringido"');
            header('HTTP/1.0 401 Unauthorized');
            exit;
        }

    ?>
</body>
</html>