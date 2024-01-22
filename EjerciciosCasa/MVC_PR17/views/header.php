<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <style>
        html {
            padding: 20px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        </style>
    <?php
    require_once("./config/config.php");

        if(isset($_REQUEST['login'])){
            $_SESSION['vista'] = VIEW.'sesiones.php';
            $_SESSION['controller'] = CON.'loginController.php';
        }else
            $_SESSION['controller'] = CON.'loginController.php';
        
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="container">
        <div class="row">
            <div class="col-3"><a href="./index.php"><img src="./webroot/img/logoGrande.png" class="mb-2" alt="" width="150px" height="100px"></a></div>
            
            <div class="col-4 mx-auto">
                <form action="./busqueda.php" method="post" class="d-flex mt-4">
                    <input type="text" class="form-control" style="width: 300px;" name="busqueda" id="busqueda" placeholder="Introduce tu búsqueda">
                    <input type="submit" class='btn btn-primary' name="buscar" id="buscar" value="Buscar">
                </form>    
            </div>
            <div class="col-2 mx-auto mt-4">
                <a href='./listaDeseos.php'>Tu lista de deseos</a>
            </div>
            
            <div class="col-3 mx-auto">
                <?php
                    if(sesionIniciada()) {
                        if($_SESSION['usuario']['rol'] == 'moderador'){
                            echo "<a href='./homeModerador.php' class='ms-4'>Bienvenid@ ".$_SESSION['usuario']['usuario']."</a>";
                            echo '<a href="./carrito.php"><img src="./imagenes/carritoVacio.png" alt="" width="70px" height="70px"></a><br>';
                        } else if($_SESSION['usuario']['rol'] == 'administrador'){
                            echo "<a href='./homeAdmin.php' class='ms-4'>Bienvenid@ ".$_SESSION['usuario']['usuario']."</a>";
                            echo '<a href="./carrito.php"><img src="./imagenes/carritoVacio.png" alt="" width="70px" height="70px"></a><br>';
                        } else {
                            echo "<a href='./homeUser.php' class='ms-4'>Bienvenid@ ".$_SESSION['usuario']['usuario']."</a>";
                            echo '<a href="./carrito.php"><img src="./imagenes/carritoVacio.png" alt="" width="70px" height="70px"></a><br>';
                        }
                        echo '<a href="./logout.php" class="ms-4">Cierre de sesión</a>';
                    } else {
                        echo "<form method='post'>";
                        echo "<input type='submit' class='btn btn-primary mt-4' value='Login / Registro' name='login' id='login'>";
                        echo "</form>";
                    }
                ?>
            </div>
        </div>
    </header>
    <?php
        if(!isset($_SESSION['vista']))
            require_once './index.php';
        else
            require_once $_SESSION['vista'];
        
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
