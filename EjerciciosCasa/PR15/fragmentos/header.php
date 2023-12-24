<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <style>
        html{
            padding: 20px;
        }
        a{
            text-decoration: none;
            color: black;
        }
    </style>
    <?php
        if(isset($_REQUEST['login']))
            header('Location: ./sesiones.php');
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="row">
            <div class="col-3"><img src="./logo/logoGrande.png" alt="" width="150px" height="100px"></div>
            <div class="col-6"></div>
            <?php
                if(sesionIniciada()) {
                    echo "<div class='col-3'><a href='./homeUser.php'>Bienvenido ".$_SESSION['usuario']['usuario']."</a>";
                    echo '<img src="./imagenes/carritoVacio.png" alt="" width="75px" height="75px"></div>';
                }else{
                    echo "<div class='col-3'><form method='get'>";
                    echo "<input type='submit' class='btn btn-primary' value='Login / Registro' name='login' id='login'>";
                    echo "</form></div>";
                }
                ?>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>