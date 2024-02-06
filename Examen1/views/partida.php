<?php

    require("./consumirAPI/configurarAPI.php");
    require("./consumirAPI/curl.php");
    // $palabra = get('palabra');
    // print_r($palabra);

    // Palabra a adivinar
    $palabra = "tienda";

    echo $palabra[0];
    echo "<p>Palabra: $palabra</p>";
    $oculta = "";    

    // Escribimos asteriscos con la longitud de la palabra oculta
    for ($i=0; $i < strlen($palabra) ; $i++) { 
        $oculta .= "*";
    }

    // Si tenemos una nuevaOculta, la mostramos, sino la oculta
    if(isset($nuevaOculta)){
        echo "<p>Oculta: $nuevaOculta</p>";
    }else{
        echo "<p>Oculta: $oculta</p>";
    }

    // Formulario de envio del nuestro intento de acertar la palabra
    echo '<form action="" method="post">';
        echo '<input type="hidden" name="palabraOculta" id="palabraOculta" value="'.$palabra.'">';
        echo '<input type="hidden" name="intentos" id="intentos" value="'.$intentos.'">';
        echo '<input type="hidden" name="asteriscos" id="asteriscos" value="'.$oculta.'">';
        if(isset($nuevaOculta)){
            echo '<input type="hidden" name="asteriscosNueva" id="asteriscosNueva" value="'.$nuevaOculta.'">';
        }
        echo '<label for="letra"><input type="text" name="letra" id="letra"></label>';
        echo '<input type="submit" name="pruebaLetra" id="pruebaLetra" value="Prueba letra">';
    echo '</form>';



?>