<h1>EXAMEN 1 - FERNANDO CALLES</h1>
<?php
if(validado()){
    echo "<h2>Bienvenido ".$_SESSION['usuario']->usuario ."</h2>";
    echo '<form action="" method="post">';
    for($i = 1 ; $i <= 50 ; $i++){
        echo'<label for="'.$i.'"><input type="checkbox" name="numeros[]" id="'.$i.'" value="'.$i.'">'.$i.'</label><br>';
    }
    echo '<input type="submit" name="apostar" id="apostar" value="Apostar">';
    echo '</form>';

    if(isAdmin()){
        echo '<form action="" method="post">';
        echo "<input type='submit' name='generarSorteo' id='generarSorteo' value='Generar sorteo'>";
        echo'</form>';
    }
}
?>