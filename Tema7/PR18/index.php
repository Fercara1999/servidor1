<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR18 - Fernando Calles</title>
</head>
<body>
<form action="" method="post">
    Selecciona una ciudad: 
    <select name="ciudades" id="ciudades">
        <option value="0">Selecciona una opcion</option>
        <option value="Avila">Ávila</option>
        <option value="Burgos">Burgos</option>
        <option value="Leon">León</option>
        <option value="Palencia">Palencia</option>
        <option value="Salamanca">Salamanca</option>
        <option value="Segovia">Segovia</option>
        <option value="Soria">Soria</option>
        <option value="Valladolid">Valladolid</option>
        <option value="Zamora">Zamora</option>
    </select>
    <input type="submit" id="enviar" name="enviar" value="Enviar">
</form>
<?php

if(isset($_REQUEST['enviar'])){
    if(!$_REQUEST['ciudades'] == '0'){
        $uri = "http://dataservice.accuweather.com/locations/v1/cities/search?q=".urlencode($_REQUEST['ciudades'].' es')."&apikey=sS7zGFWL7YpTnaMeTLiFkAqITnaIsdGE&language=es-es";

        $contenido = file_get_contents($uri);

        echo "<pre>";
        if($contenido){
            $jsonContenido = json_decode($contenido,true);
            $claveCiudad = $jsonContenido[0]['Key'];
            echo "La clave de la ciudad elegida es: " .$claveCiudad."<br>";
            echo "Longitud:".$jsonContenido[0]['GeoPosition']['Longitude']."<br>";
            echo "Latitud:".$jsonContenido[0]['GeoPosition']['Latitude']."<br>";
            echo "Altitud:".$jsonContenido[0]['GeoPosition']['Elevation']['Metric']['Value']."<br>";

            echo "<h1>Previsión meteorológica </h1>";

            $uri = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/".$claveCiudad."?apikey=sS7zGFWL7YpTnaMeTLiFkAqITnaIsdGE&language=es-es";

            $contenido = file_get_contents($uri);

            if($contenido){
                $jsonContenido = json_decode($contenido,true);
                
                foreach ($jsonContenido['DailyForecasts'] as $key => $value) {
                    foreach ($value as $campo => $valor) {
                        if($campo == 'Date'){
                            echo "Previsión para el día: " .$valor;
                        }
                        if($campo == 'Temperature'){
                            echo "<br>Minimas: ".((int)$valor['Minimum']['Value']-32)*5/9;
                            echo "<br>Máximas: ".((int)$valor['Maximum']['Value']-32)*5/9;
                        }
                    }
                }
            }
        }
        echo "</pre>";

    }
}

?>



</body>
</html>