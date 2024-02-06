<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div>
        </div>    

        <div>
            <?php
                // Si el usuario está validado, entramos
                if(validado()){
                    echo "Bienvenido " .$_SESSION['usuario']->username;
                    echo '<form action="" method="post">';
                        // Si el usuario no es administrador, damos la opcion de iniciar la partida
                        if(!isAdmin()){
                            echo '<input type="submit" value="Iniciar partida" name="iniciarPartida" class="btn btn-primary"><br>';
                        }

                        echo '<input type="submit" value="Cerrar sesión" name="cerrarSesion" class="btn btn-primary">';
                    echo '</form>';


                // Cargamos el array de estadísticas
                $arrayEstadisticas = EstadisticaDAO::findbyIdUsuario();

        ?>

        <table border='1' class='table table-hover p-5'>
            <tr>
                <th>ID Estadistica</th>
                <th>ID Usuario</th>
                <th>ID Palabra</th>
                <th>Resultasdo</th>
                <th>Intentos</th>
                <th>Fecha</th>
            </tr>
            <?php
            foreach ($arrayEstadisticas as $estadistica) {
                // Mostramos los datos de las estadisticas
                echo "<tr>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='idestadistica' id='idestadistica' value='$estadistica->id_estadistica' class='btn btn-primary'>";
                echo "<td>". $estadistica->id_estadistica."</td>";
                echo "<td>". $estadistica->id_usuario."</td>";
                echo "<td>".$estadistica->id_palabra."</td>";
                echo "<td>".$estadistica->resultado."</td>";
                echo "<td>".$estadistica->intentos."</td>";
                echo "<td>".$estadistica->fecha."</td>";
            }
        }
            ?>
        </table>
        </div>
        <nav>
        </nav>
    </header>
    <main>
        <!-- Vistas -->
        <?php
            // Requerismo la vista home si no hemos indicado ninguna y sino requrerimos la indicada
            if(!isset($_SESSION['vista']))
                require VIEW.'home.php';
            else{
                require $_SESSION['vista'];
            }
        ?>

    </main>
    <footer>
    </footer>
</body>
</html>