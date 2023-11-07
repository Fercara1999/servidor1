<?php

    $idioma = $_GET['idioma'];

    $idiomaesp = "Hola en español";
    $idiomaing = "Hola en ingles";
    $idiomafra = "Hola en frances";
    $idiomaita = "Hola en italiano";
    $idiomapor = "Hola en portugues";

    $idiomaescribir = "idioma".$idioma;

    echo $$idiomaescribir;

?>