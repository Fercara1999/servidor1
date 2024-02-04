<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Examen 1</title>
    <?php 
        require("./config/config.php");
        session_start();
    ?>
</head>
<body>
    <?php    
        if(isset($_REQUEST['iniciarSesion'])){
            $_SESSION['controller'] = CON . "loginController.php";
        }else if(isset($_REQUEST['registro'])){
            $_SESSION['controller'] = CON . "registroController.php";
            $_SESSION['vista'] = VIEW . "registro.php";
        }else if(isset($_REQUEST['apostar'])){
            $_SESSION['controller'] = CON. 'apuestaController.php';
        }else if(isset($_REQUEST['Home'])){
            $_SESSION['vista'] = VIEW.'home.php';
        }else if(isset($_REQUEST['verApuestas'])){
            $_SESSION['vista'] = VIEW .'verApuestas.php';
            $_SESSION['controller'] = CON. 'apuestaController.php';
        }else if(isset($_REQUEST['generarSorteo'])){
            $_SESSION['controller'] = CON ."sorteosController.php";
            $_SESSION['vista'] = VIEW. "api.php";
        }else if((isset($_REQUEST['creaResultados']))){
            $_SESSION['controller'] = CON ."sorteosController.php";
        }

        if(isset($_SESSION['controller'])){
            require($_SESSION['controller']);
        }
        require("./views/layout.php");

        if(!isset($_SESSION['vista'])){

    ?>

    <form action="" method="post">
        <label for="usuario">Usuario: <input type="text" name="usuario" id="usuario"></label><br>
        <label for="contrasena">Contraseña: <input type="password" name="contrasena" id="contrasena"></label><br>
        <label for="recuerda"><input type="checkbox" name="recuerda" id="recuerda"> Recuérdame</label><br>
        <input type="submit" name="iniciarSesion" id="iniciarSesion" value="Iniciar sesión">
    </form>
    <form action="" method="post">
        <input type="submit" name="registro" id="registro" value="Registro">
    </form>

    <?php
        }
    ?>
</body>
</html>