<?php

// Se ejecuta al abrir la página principal y muestra en cards los datos de todos los libros de la tabla libros
function verLibros(){
    try {
        $con = new PDO(DSN, USER, PASSWORD);

        $sql = 'SELECT * FROM libros WHERE borrado = false';
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="row g-9">';

        foreach ($result as $valores) {
            echo '<div class="col-md-4">';
            echo '<div class="card">';
            echo '<div class="row g-0">';
            
            echo '<div class="col-6">';
            foreach ($valores as $dato => $valor) {
                if ($dato != 'borrado') {
                    if ($dato == 'rutaPortada') {
                        echo '<img src="'.$valor.'" class="img-fluid w-100" alt="card-horizontal-image" width="150px">';
                    }
                }
            }
            echo '</div>';
            
            echo '<div class="col-6">';
            echo '<div class="card-body">';
            foreach ($valores as $dato => $valor) {
                
                echo "<form method='post' action='./carrito.php'>";
                if ($dato != 'borrado') {
                    if ($dato == 'ISBN') {
                        echo "<input type='hidden' name='isbn' value='$valor' id='isbn'>";
                    }
                    if ($dato == 'titulo') {
                        echo '<h5 class="card-title">'.$valor.'</h5>';
                    }
                    if ($dato == 'autor') {
                        echo '<p class="card-text"><small class="text-muted">'.$valor.'</small></p>';
                    }
                    if ($dato == 'sinopsis') {
                        echo '<p class="card-text">'.$valor.'</p>';
                    }
                    if ($dato == 'precio') {
                        echo '<h5 class="card-title">'.$valor.'€</h5>';
                    }
                }
            }
            echo "<input type='submit' class='btn btn-primary' value='Añadir al carrito' id='anadir' name='anadir'>";
            echo "</form>";
            echo "<form method='get' action='listaDeseos.php'>";
            echo "<input type='hidden' name='isbn' value='{$valores['ISBN']}'>";
            echo "<button style='border: none; background: none; padding: 0;'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/1200px-Heart_coraz%C3%B3n.svg.png' style='width:30px' name='deseo' id='deseo'>";
            echo "</button></form><br><br>";

            echo '</div></div>';
            
            echo '</div></div></div>';
        }

        echo '</div>';
        unset($con);
    } catch (\Throwable $th) {
        muestraErroresCatch($th);
        unset($con);
    }
}

?>