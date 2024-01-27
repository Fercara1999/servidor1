    
        <?php
            // if(isset($_REQUEST['modificarProducto'])){
            //     modificarLibro();
            // }

            if(isset($_REQUEST['modificarAlbaran'])){
                modificarAlbaran();
            }

            if(isset($_REQUEST['borrarAlbaran'])){
                borraAlbaran();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['modificarPedido'])){
                modificarPedido();
            }

            if(isset($_REQUEST['borrarPedido'])){
                borraPedido();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['borrarProducto'])){
                borraProducto();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['guardarCambiosAlbaran'])){
                guardaCambiosAlbaran();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['guardarCambiosPedido'])){
                guardaCambiosPedido();
                header("Location: ./homeAdmin.php");
            }

            if(isset($_REQUEST['guardarCambiosProducto'])){
                guardaCambiosProducto();
                header("Location: ./homeAdmin.php");
            }

        ?>

    <br><br>
</body>
</html>
