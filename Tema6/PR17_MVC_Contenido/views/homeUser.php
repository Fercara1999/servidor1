<body>
        <?php
        // if(isset($_REQUEST['actualizar'])){
        //     actualizarDatos();
        // }
        // if(isset($_REQUEST['actualizarContrasena'])){
        //     validaCambioContrasena();
        // }
        ?>
        
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

        PedidoDAO::misPedidos();        

    ?>
    <br><br>
</body>
</html>