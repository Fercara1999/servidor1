<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<header class="container">
    <div class="row">
    <div class="col-3">
        <form method="post">
            <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;" id="botonHome" name="botonHome">
                <img src="<?php echo IMG."logoGrande.png" ?>" class="mb-2" alt="" width="150px" height="100px">
            </button>
        </form>
    </div>


        
        <div class="col-6 mx-auto">
            <form action="./busqueda.php" method="post" class="d-flex mt-4">
                <input type="text" class="form-control" style="width: 300px;" name="busqueda" id="busqueda" placeholder="Introduce tu búsqueda">
                <input type="submit" class='btn btn-primary' name="buscar" id="buscar" value="Buscar">
            </form>    
        </div>
        
        <div class="col-3 mx-auto">
            <?php
                muestraHeaderUsuario();
                // if(sesionIniciada()) {
                //     if($_SESSION['usuario']->rol == 'moderador'){
                //         echo "<a href='./homeModerador.php' class='ms-4'>Bienvenid@ ".$_SESSION['usuario']->usuario."</a>";
                //         echo '<a href="./carrito.php"><img src="./imagenes/carritoVacio.png" alt="" width="70px" height="70px"></a><br>';
                //     } else if($_SESSION['usuario']->rol == 'administrador'){
                //         echo "<a href='./homeAdmin.php' class='ms-4'>Bienvenid@ ".$_SESSION['usuario']->usuario."</a>";
                //         echo '<a href="./carrito.php"><img src="./imagenes/carritoVacio.png" alt="" width="70px" height="70px"></a><br>';
                //     } else {
                //         // echo "<a href='./homeUser.php' class='ms-4'>Bienvenid@ {$_SESSION['usuario']->usuario}</a>";
                //         echo '<form method="post" style="display: inline-block; margin-left: 10px;">';
                //         echo '<button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;" id="botonHomeUser" name="botonHomeUser">';
                //         echo 'Bienvenid@ '.$_SESSION['usuario']->usuario;
                //         echo '</button>';
                //         echo '<button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;" id="botonCarrito" name="botonCarrito">';
                //         echo '<img src="webroot/img/carritoVacio.png" alt="" width="70px" height="70px">';
                //         echo '</button>';
                //         echo '</form>';
                //     }
                //     echo '<br><a href="'.VIEW.'logout.php" class="ms-4">Cierre de sesión</a>';
                // } else {
                //     echo "<form method='post'>";
                //     echo "<input type='submit' class='btn btn-primary mt-4' value='Login / Registro' name='login' id='login'>";
                //     echo "</form>";
                // }
            ?>
        </div>
    </div>
</header>