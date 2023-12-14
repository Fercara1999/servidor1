<link rel="stylesheet" href="./estilos/estilos.css">

<?php

include("./fragmentos/header.html");
require("./confBD.php");
include("./funciones.php");
include("./validacionesForm.php");

?>


<?php

$errores = [];

if(enviado() && validaFormulario($errores)){
    if(isset($_REQUEST['Enviar'])){
        insertaDatos();
        header("Location: ./index.php");
    }
}else{

?>

<br>
<form action="" method="get">
<label for="isbn">ISBN: <input type="number" name="isbn" id="isbn" value='<?php recuerda('isbn') ?>'></label>
<p class="error"><?php muestraError($errores,'isbn'); ?></p>
<label for="titulo">Titulo: <input type="text" name="titulo" id="titulo" value='<?php recuerda('titulo') ?>'></label>
<p class="error"><?php muestraError($errores,'titulo'); ?></p>
<label for="autor">Autor: <input type="text" name="autor" id="autor" value='<?php recuerda('autor') ?>'></label>
<p class="error"><?php muestraError($errores,'autor'); ?></p>
<label for="editorial">Editorial: <input type="text" name="editorial" id="editorial" value='<?php recuerda('editorial') ?>'></label>
<p class="error"><?php muestraError($errores,'editorial'); ?></p>
<label for="fechaLanzamiento">Fecha de lanzamiento: <input type="date" name="fechaLanzamiento" id="fechaLanzamiento" value='<?php recuerda('fechaLanzamiento') ?>'></label>
<p class="error"><?php muestraError($errores,'fechaLanzamiento'); ?></p>
<label for="precio">Precio: <input type="number" name="precio" id="precio" step='0.01' value='<?php recuerda('precio') ?>'></label>
<p class="error"><?php muestraError($errores,'precio'); ?></p>
<input type="submit" name="Enviar" id="Enviar">
</form>
<br>
<?php } 

cargaScript();

if(isset($_REQUEST['Crear'])){
    insertaScript();
    header("Location: ./index.php");
}

if(isset($_GET['Guardar'])){
    guardaCambios();
    header("Location: ./index.php");
}

if (isset($_GET['Modificar'])){
    modificaCampo();
}elseif (isset($_GET['Eliminar'])){
    borraDato();
    header("Location: ./index.php");
}elseif (isset($_GET['Buscar'])){
        buscar();
}else{     
    leeTabla();
}

include("./fragmentos/footer.php");?>