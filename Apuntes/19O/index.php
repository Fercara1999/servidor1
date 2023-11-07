<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>19O</title>
    <link rel="stylesheet" type="text/css" href="./estilo.css">
    <link rel="stylesheet" type="text/css" href="./../../css/estilos.css">
</head>
<body>
    <?php
    include("../../fragmentos/header.html");
    include("../../funcionesUtiles.php");
    include("./validaciones.php");
    ?>
        <?php
            $errores = array();
            // Si esta todo bien
            if(enviado() && validaFormulario($errores)){
                echo "<pre";
                print_r($_REQUEST);
            }else{
        ?>

        <!-- Envia datos del usuario/cliente al servidor 
        Action: indica donde se quieren enviar los datos. Si no se le da un fichero, llama a la pagina actual
        Method: como se envian los datos (get va en la URL y post oculto en la cabecera)
        Name: para PHP no es obligario, para JS es conveniente
        Enctype: para poder enviar ficheros -->

        <!-- Todo lo que esté en input, textarea y select, se envia -->
        <form action="procesa.php" method="get" name="formulario1" enctype="multipart/form-data">
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" placeholder="nombre" value=<?php recuerda('nombre'); ?>></label>
        <p class="error">
            <?php errores($errores,'nombre'); ?>
        </p>
        <label for="apellido">Apellido: <input type="text" name="apellido" id="apellido" placeholder="apellido" value=<?php recuerda('apellido'); ?>> </label>
        <p class="error">
            <?php errores($errores,'apellido'); ?>
        </p>

        <!-- Para que sea uno u otro, deben tener el mismo nombre
        Value: lo necesitamos para determinar lo que queremos que se mande
        Si queremos que envie más de una opcion, debemos poner el name seguido de [] -->

        <label for="hombre">Hombre<input <?php recuerdaRadio('genero','hombre') ?> type="radio" name="genero" id="hombre" value="hombre"></label>
        <label for="mujer">Mujer<input <?php recuerdaRadio('genero','mujer') ?> type="radio" name="genero" id="mujer" value="mujer"></label>
        <p class="error">
            <?php errores($errores,'genero'); ?>
        </p>
        <p>Aficiones (Elige al menos una opcion):</p>
        <label for="ch1">Montar a caballo<input 
        <?php recuerdaCheck('aficion','jinete'); ?>
        type="checkbox" name="aficion[]" id="ch1" value="jinete"></label>
        <label for="ch2">Jugar al futbol<input <?php recuerdaCheck('aficion','futbolista'); ?> type="checkbox" name="aficion[]" id="ch2" value="futbolista"></label>
        <label for="ch3">Nadar<input <?php recuerdaCheck('aficion','nadador'); ?> type="checkbox" name="aficion[]" id="ch3" value="nadador"></label>
        <p class="error">
            <?php errores($errores,'aficion'); ?>
        </p>
        
        <br>
        <!-- Fomato de fecha: AAAA-mm-dd -->
        <label for="fecha_n">Fecha nacimiento <input type="datetime-local" name="fecha_n" id="fecha_n"  value=<?php recuerda('fecha_n'); ?>></label>
        <p class="error">
            <?php errores($errores,'fecha_n'); ?>
        </p>
        <br>
        Equipos Baloncesto
        <select name="equipos" id="">
            <option value="0">Seleccione una opcion</option>
            <option <?php recuerdaSelect('equipos','lakers') ?> value="lakers">Lakers</option>
            <option <?php recuerdaSelect('equipos','celtics') ?> value="celtics">Celtics</option>
            <option <?php recuerdaSelect('equipos','bulls') ?> value="bulls">Bulls</option>
        </select>
        <p class="error">
            <?php errores($errores,'equipos'); ?>
        </p>
        <br>
        <!-- Los ficheros los recibe el servidor en una carpeta temporal $_FILES -->
        <input type="file" name="fichero" id="fichero"><br>
        <p class="error">
            <?php errores($errores,'fichero'); ?>
        </p>
        <!-- Hidden: el usuario no lo ve en el navegador -->
        <input type="hidden" name="usuarioVIP" value="156">
        <!-- Verifica que se ha enviado desde el boton -->
        <input type="submit" value="Enviar" name="Enviar">
        <input type="submit" value="Borrar" name="Borrar">
    </form>

    <?php
            }
    ?>        


    <?php
    include("../../fragmentos/footer.php");
    ?>
</body>
</html>