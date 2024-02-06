<?php
    require("./config/config.php");
    require("./consumirAPI/configurarAPI.php");
    require("./consumirAPI/curl.php");
    session_start();

    if(!empty($_SESSION['msg'])){
        echo $_SESSION['msg'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        if(isset($_REQUEST['Home'])){
            $_SESSION['vista'] = VIEW . 'home.php';
        }else if(isset($_REQUEST['iniciarSesion'])){
            $_SESSION['controller'] = CON . "loginController.php";
        }else if(isset($_REQUEST['cerrarSesion'])){
            $_SESSION['controller'] = CON . "loginController.php";
        }else if(isset($_REQUEST['crearLibro'])){
            $_SESSION['controller'] = CON . 'librosController.php';
            $_SESSION['vista'] = VIEW . 'crearLibro.php';
        }
        
        if(isset($_SESSION['controller']))
            require($_SESSION['controller']);
        require("./views/layout.php");
    ?>

    

</body>
</html>