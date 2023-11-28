<?php

function mostrarTabla($archivo){

    if($fp = fopen($archivo,"r")){
        echo "<table border='1'>";
        echo "<th>Alummo</th><th>Nota 1</th><th>Nota 2</th><th>Nota 3</th>";
        while($fila = fgetcsv($fp,filesize($archivo),";")) {
            if($fila[0] != null){
                echo "<form action='' method='get'>";
                echo "<tr>";
                foreach ($fila as $key) {
                    echo  "<label for='".$key."'><input type='text' name='".$key."' id='".$key."'><td>".$key."</td></label>";
                }
                echo "<td><input type='submit' value='Editar' id='Editar' name='Editar'></td>";
                echo "<td><input type='submit' value='Eliminar' id='Eliminar' name='Eliminar'></td>";
                echo "</form>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }else{
        echo "Error al abrir el fichero";
    }
}

?>
