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

    echo '<div class="container text-center">';

    echo '<div class="row">';
    echo '<div class="col-md-3">';
    echo '<form method="post">';
    echo '<input type="submit" class="btn btn-primary" value="PEDIDOS" name="pedidos" id="pedidos">';
    echo '</form>';
    echo '</div>';
    
    echo '<div class="col-md-3">';
    echo '<form method="post">';
    echo '<input type="submit" class="btn btn-primary" value="ALBARANES" name="albaranes" id="albaranes">';
    echo '</form>';
    echo '</div>';
    
    echo '<div class="col-md-3">';
    echo '<form method="post">';
    echo '<input type="submit" class="btn btn-primary" value="PRODUCTOS" name="productos" id="productos">';
    echo '</form>';
    echo '</div>';
    
    echo '</div>';
    
    echo '</div>';
?>

<br><br>