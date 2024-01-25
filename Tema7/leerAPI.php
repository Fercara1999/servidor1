<?php

    $uri = "http://dataservice.accuweather.com/forecasts/v1/daily/1day/303121?apikey=sS7zGFWL7YpTnaMeTLiFkAqITnaIsdGE&language=es-es";

    $contenido = file_get_contents($uri);
// echo $contenido;
    echo "<pre>";
    if($contenido){
        $jsonContenido = json_decode($contenido,true);
        // print_r($jsonContenido);
        $temperatura = ((int)$jsonContenido['DailyForecasts'][0]['Temperature']['Minimum']['Value']-32)*5/9;
        echo "La temperatura mínima es: " . $temperatura;
    }
    echo "</pre>";





?>