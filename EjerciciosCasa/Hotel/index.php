<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" type="text/css" href="./estilos.css">
</head>
<body>
    <?php
        include("./validaciones.php");
    ?>
    <?php
        $errores = array();
        if(enviado()){
            if(textoVacio('nombre'))
                $errores['nombre'] = "Nombre vacio";
            if(textoVacio('apellidos'))
                $errores['apellidos'] = "Apellidos vacio";
            if(correoValido())
                $errores['correo'] = "Correo en formato no valido";
            if(fechaLlegada())
                $errores['fechallegada'] = "La fecha de llegada no es valida";
            if(fechaSalida())
                $errores['fechasalida'] = "La fecha de salida no es valida";
            if(nHabitaciones())
                $errores['numhabitaciones'] = "Has seleccionado un numero de habitaciones menor que cero";
            if(tipoHabitacion())
                $errores['tipohabitacion'] = "No has elegido el tipo de habitacion";

        }
    ?>
    <form action="" method="get" name="formReserva">
        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label><br>

        <p class="error"> <?php errores($errores,'nombre'); ?></p>
 
        <label for="apellidos">Apellidos: <input type="text" name="apellidos" id="apellidos"></label><br>

        <p class="error"> <?php errores($errores,'apellidos'); ?></p>
 
        <label for="correo">Correo electrónico: <input type="email" name="correo" id="correo"></label><br>

        <p class="error"> <?php errores($errores,'correo'); ?></p>
 
        <label for="fechallegada">Fecha de llegada <input type="date" name="fechallegada" id="fechallegada"></label><br>

        <p class="error"> <?php errores($errores,'fechallegada'); ?></p>

        <label for="fechasalida">Fecha de salida: <input type="date" name="fechasalida" id="fechasalida"></label><br>

        <p class="error"> <?php errores($errores,'fechasalida'); ?></p>

        <label for="numhabitaciones">Numero de habitaciones: <input type="number" name="numhabitaciones" id="numhabitaciones"></label><br>
        
        <p class="error"> <?php errores($errores,'numhabitaciones'); ?></p>

        Tipo de habitacion:
        <select name="tipohabitacion" id="tipohabitacion">
            <option value="0">Selecciona una opcion</option>
            <option value="individual">Individual</option>
            <option value="doble">Doble</option>
            <option value="suite">Suite</option>
        </select><br>

        <p class="error"> <?php errores($errores,'tipohabitacion'); ?></p>

        <label for="comentarios">Comentarios adicionales: <input type="text" name="comentarios" id="comentarios"></label><br>
        <input type="submit" name="Enviar" id="Enviar">
        <input type="reset" name="Borrar" id="Borrar">

    </form>
</body>
</html>