<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <!-- <link rel="stylesheet" href="<?php CSS.'estilos.css'?>"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div>
            <form action="" method="post"> 
                <input type="submit" name="Home" id="Home" value="Home" class="btn btn-primary">
            </form>
        </div>    
        <h1>Página Web de Fernando</h1>
        <div>
            <?php
                echo '<form action="" method="post">';
                echo '<input type="submit" name="verApuestas" id="verApuestas" value="Ver apuestas">';
                echo '</form>';
                
            ?>
        </div>
        <nav>
        </nav>
    </header>
    <main>
        <!-- Vistas -->
        <?php
            if(!isset($_SESSION['vista']))
                require VIEW.'home.php';
            else{
                require $_SESSION['vista'];
            }
        ?>

    </main>
    <footer>
        Copyright
    </footer>
</body>
</html>

<?php


?>