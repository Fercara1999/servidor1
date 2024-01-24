
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
                if(sesionIniciada()) {
                    if($_SESSION['usuario']->rol == 'moderador'){
                        echo "<a href='./homeModerador.php' class='ms-4'>Bienvenid@ ".$_SESSION['usuario']->usuario."</a>";
                        echo '<a href="./carrito.php"><img src="./imagenes/carritoVacio.png" alt="" width="70px" height="70px"></a><br>';
                    } else if($_SESSION['usuario']->rol == 'administrador'){
                        echo "<a href='./homeAdmin.php' class='ms-4'>Bienvenid@ ".$_SESSION['usuario']->usuario."</a>";
                        echo '<a href="./carrito.php"><img src="./imagenes/carritoVacio.png" alt="" width="70px" height="70px"></a><br>';
                    } else {
                        echo "<a href='./homeUser.php' class='ms-4'>Bienvenid@ ".$_SESSION['usuario']->usuario."</a>";
                        echo '<a href="./views/carrito.php"><img src="webroot/img/carritoVacio.png" alt="" width="70px" height="70px"></a><br>';
                    }
                    echo '<a href="'.VIEW.'logout.php" class="ms-4">Cierre de sesión</a>';
                } else {
                    echo "<form method='post'>";
                    echo "<input type='submit' class='btn btn-primary mt-4' value='Login / Registro' name='login' id='login'>";
                    echo "</form>";
                }
            ?>
        </div>
    </div>
</header>