<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR18 - Fernando Calles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <style>
        html{
            margin: 20px;
        }
    </style>
</head>
<body>
<h1>PR18 - Fernando Calles</h1>
<form action="" method="post">
    Selecciona una ciudad: 
    <select name="ciudades" id="ciudades">
        <option value="0">Selecciona una opción</option>
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
    <input type="submit" id="enviar" name="enviar" value="Enviar" class="btn btn-primary">
</form>
<?php

if(isset($_REQUEST['enviar'])){
    if(!$_REQUEST['ciudades'] == '0'){
        $uri = "http://dataservice.accuweather.com/locations/v1/cities/search?q=".urlencode($_REQUEST['ciudades'].' es')."&apikey=GHDaGMa7RgFsfjUJz5g9Ep2z6MOfhirW&language=es-es";

        $contenido = file_get_contents($uri);

        echo "<pre>";
        if($contenido){
            $jsonContenido = json_decode($contenido,true);
            $claveCiudad = $jsonContenido[0]['Key'];
            echo "<h1>".$_REQUEST['ciudades']."</h1>";
            echo "La clave de la ciudad elegida es: " .$claveCiudad."<br>";
            echo "Longitud:".$jsonContenido[0]['GeoPosition']['Longitude']."<br>";
            echo "Latitud:".$jsonContenido[0]['GeoPosition']['Latitude']."<br>";
            echo "Altitud:".$jsonContenido[0]['GeoPosition']['Elevation']['Metric']['Value']."<br>";

            echo "<h1>Previsión meteorológica </h1>";

            $uri = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/".$claveCiudad."?apikey=GHDaGMa7RgFsfjUJz5g9Ep2z6MOfhirW&language=es-es";

            $contenido = file_get_contents($uri);

            if($contenido){
                $jsonContenido = json_decode($contenido,true);
                
                echo '<div class="accordion" id="accordionBasic">';
                echo '<div class="accordion-item">';
                echo '<h2 class="accordion-header" id="headingOne">';
                echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">';
                foreach ($jsonContenido['DailyForecasts'] as $key => $value) {

                    foreach ($value as $campo => $valor) {
                        if($campo == 'Date'){
                            echo $valor;
                            echo '      </button>';
                            echo '    </h2>';
                        }
                        if($campo == 'Temperature'){
                            echo "<td>" . round(((int)$valor["Minimum"]['Value'] - 32) * 5 / 9, 1) . "ºC</td>";
                            echo "<td>" . round(((int)$valor["Maximum"]['Value'] - 32) * 5 / 9, 1) . "ºC</td>";
                        }
                        if($campo == 'Day'){
                            echo "<td>".$valor['IconPhrase']."</td>";
                        }
                        if($campo == 'Night'){
                            echo "<td>".$valor['IconPhrase']."</td>";
                            if($valor['HasPrecipitation']){
                                echo "<td>Si</td>";
                            }else{
                                echo "<td>No</td>";
                            }
                        }

                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        }else{
            echo "No has seleccionado una opción válida";
        }
        echo "</pre>";

    }
}

?>
</body>
<?php
    require("./fragmentos/footer.php");
?>
</html>