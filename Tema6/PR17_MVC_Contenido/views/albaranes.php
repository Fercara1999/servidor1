<?php

echo '<form method="post">';
echo '<input type="submit" class="btn btn-primary" value="Nuevo albarán" name="nuevoAlbaran" id="nuevoAlbaran">';
echo "</form>";

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

AlbaranDAO::verAlbaranes();



?>