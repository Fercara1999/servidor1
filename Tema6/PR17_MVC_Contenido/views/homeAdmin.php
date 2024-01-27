<body>
    <?php
        if(isset($_REQUEST['modificar'])){
            UserDAO::verDatos();
            echo '<input type="submit" class="btn btn-primary" id="actualizar" value="Actualizar datos" name="actualizar">';
            echo "</form><br>";
        }else{
            echo '<form action="" method="post">';
            echo '<input type="submit" class="btn btn-primary me-3" id="modificar" value="Modificar datos" name="modificar">';
            echo "</form>";
        }

        if(isset($_REQUEST['modificarContrasena'])){
            verCambioContrasena();
            echo '<input type="submit" class="btn btn-primary" id="actualizarContrasena" value="Actualizar contraseña" name="actualizarContrasena">';
            echo "</form>";
        }else{
            echo '<form action="" method="post">';
            echo '<input type="submit" class="btn btn-primary" id="modificarContrasena" value="Modificar contraseña" name="modificarContrasena">';
            echo "</form>";
        }

        $erroresAlbaran = [];
        

        if(isset($_REQUEST['nuevoAlbaran'])){
            echo "<form method='post' class='ancho-caja'>";
            echo "<div class='form-group'>";
            echo "<label for='fechaAlbaran'>Fecha albarán:</label>";
            echo "<input type='date' class='form-control ancho-caja' name='fechaAlbaran' id='fechaAlbaran'>";
            echo muestraErrores($erroresAlbaran,'fechaAlbaran');
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo "<label for='isbn'>ISBN:</label>";
            echo "<input type='text' class='form-control ancho-caja' name='isbn' id='isbn'>";
            echo muestraErrores($erroresAlbaran,'isbn');
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo "<label for='cantidad'>Cantidad:</label>";
            echo "<input type='number' class='form-control ancho-caja' name='cantidad' id='cantidad' min='1'>";
            echo muestraErrores($erroresAlbaran,'cantidad');
            echo "</div>";
            
            echo "<input type='submit' class='btn btn-primary' name='registrarNuevoAlbaran' id='registrarNuevoAlbaran' value='Registrar albarán'>";
            echo "</form>";
        }

        $erroresLibro = [];

        if(isset($_REQUEST['nuevoLibro'])){
            echo "<form method='post'>";
            echo "<div class='form-group'>";
            echo '<label for="isbn">ISBN: <input type="text" class="form-control ancho-caja" name="isbn" id="isbn"></label><br>';
            muestraErrores($erroresLibro,'isbn');
            echo '<label for="titulo">Titulo: <input type="text" class="form-control ancho-caja" name="titulo" id="titulo"></label><br>';
            muestraErrores($erroresLibro,'titulo');
            echo '<label for="autor">Autor: <input type="text" class="form-control ancho-caja" name="autor" id="autor"></label><br>';
            muestraErrores($erroresLibro,'autor');
            echo '<label for="editorial">Editorial: <input type="text" class="form-control ancho-caja" name="editorial" id="editorial"></label><br><br>';
            muestraErrores($erroresLibro,'editorial');
            echo 'Género: <select name="genero" id="genero">';
            echo '<option value="0">Selecciona una opción</option>';
            echo '<option value="aventuras">Aventuras</option>';
            echo '<option value="ficcion">Ficción</option>';
            echo '<option value="policiaco">Policiaco</option>';
            echo '<option value="terror">Terror</option>';
            echo '<option value="misterio">Misterio</option>';
            echo '<option value="romantica">Romántica</option>';
            echo '<option value="humor">Humor</option>';
            echo '<option value="poesia">Poesia</option>';
            echo '<option value="mitologia">Mitología</option>';
            echo '<option value="teatro">Teatro</option>';
            echo '<option value="cuento">Cuento</option>';
            echo '<option value="no_ficcion">No ficcion</option>';
            echo '</select>';
            muestraErrores($erroresLibro,'genero');
            echo '<br><br><label for="anoPublicacion">Año de publicación: <input type="number" class="form-control ancho-caja" name="anoPublicacion" id="anoPublicacion" min="1900"></label><br>';
            muestraErrores($erroresLibro,'anoPublicacion');
            echo '<label for="sinopsis">Sinopsis: <input type="text" class="form-control ancho-caja" name="sinopsis" id="sinopsis"></label><br>';
            muestraErrores($erroresLibro,'sinopsis');
            echo '<label for="ruta">Ruta portada: <input type="text" class="form-control ancho-caja" name="ruta" id="ruta"></label><br>';
            muestraErrores($erroresLibro,'ruta');
            echo '<label for="precio">Precio: <input type="number" class="form-control ancho-caja" name="precio" id="precio" step="0.01"></label><br>';
            muestraErrores($erroresLibro,'precio');
            echo '<label for="unidades">Unidades: <input type="number" class="form-control ancho-caja" name="unidades" id="unidades" min="1"></label><br>';
            muestraErrores($erroresLibro,'unidades');

            echo "</div>";
            echo "<input type='submit' class='btn btn-primary' name='registrarNuevoLibro' id='registrarNuevoLibro' value='Registrar libro'>";
            echo "</form>";
        }

        echo '<br><br>';
        echo '<form method="post">';
        echo '<input type="submit" class="btn btn-primary" value="Nuevo albarán" name="nuevoAlbaran" id="nuevoAlbaran">';
        echo "</form>";
        echo '<form method="post">';
        echo '<input type="submit" class="btn btn-primary" value="Nuevo libro" name="nuevoLibro" id="nuevoLibro">';
        echo "</form>";
        
        PedidoDAO::misPedidos();
        AlbaranDAO::verAlbaranes();
        PedidoDAO::verPedidos();
        LibroDAO::verProductos();
    ?>

    <br><br>
</body>
</html>