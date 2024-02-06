<?php

$apuesta = ApuestaDAO::getApuestaByID($_REQUEST['id_apuesta']);

echo '<form action="" method="post">';
echo "<input type='hidden' name='id_apuesta' id='id_apuesta' value='".$apuesta->id_apuesta."'>";
for ($i=1; $i <= 50 ; $i++) { 
    if($i == $apuesta->numero1 || $i == $apuesta->numero2 || $i == $apuesta->numero3 || $i == $apuesta->numero4 || $i == $apuesta->numero5){
        echo'<label for="'.$i.'"><input type="checkbox" checked name="numeros[]" id="'.$i.'" value="'.$i.'">'.$i.'</label><br>';
    }else{
        echo'<label for="'.$i.'"><input type="checkbox" name="numeros[]" id="'.$i.'" value="'.$i.'">'.$i.'</label><br>';
    }
}
echo '<input type="submit" name="guardarCambiosApuesta" id="guardarCambiosApuesta" value="Guardar Cambios"></form>';

?>
