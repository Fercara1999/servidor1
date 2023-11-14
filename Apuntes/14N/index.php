<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-XML</title>
</head>
<body>
    <?php

// php -v para ver la version de PHP
// para instalar xml: sudo apt-get install php-xml
// luego reiniciar el apache
// descargar formateador para XML, ya que cuenta también los espacios en blanco


    // Lectura de un XML sabiendo el nombre de las etiquetas a recorrer
    // if (file_exists('fichero.xml')) {
    //     $xml = simplexml_load_file('fichero.xml');
    //     echo "<pre>";
    //     print_r($xml);

    //     foreach ($xml as $elemento) {
    //         echo "El coche con el ID ". $elemento['id']."<br>";
    //         echo "La marca es: " .$elemento -> marca."<br>";
    //         echo "El modelo es: " .$elemento -> modelo."<br>";
    //     }
    // } else {
    //     exit('Error abriendo fichero.xml.');
    // }

    // Lectura de un XML sin saber el nombre de las etiquetas a recorrer

    // if (file_exists('fichero.xml')) {
    //     $xml = simplexml_load_file('fichero.xml');
    //     echo "<pre>";
    //     // print_r($xml);

    //     foreach ($xml as $elemento) {
    //         leerElemento($elemento);
    //     }
    // } else {
    //     exit('Error abriendo fichero.xml.');
    // }

    // function leerElemento($elemento){
    //     foreach ($elemento->children() as $a){
    //         echo $a;
    //     }
    //     echo "<br><br>";
    //     // echo $elemento->children()[0];
    //     // echo $elemento->children()[1];
    //     // echo $elemento->children()->count();
    // }

    // Para crear un XML con Simple XML

    $xml = new SimpleXMLElement("<juegos></juegos>");
    // Hay que darle permisos a la carpeta antes y se guarda en un fichero
    $juego1 = $xml->addChild('juego');
    // Añade los atributod id y disponible al juego
    $juego1 -> addAttribute('id','1');
    $juego1 -> addAttribute('disponible','no');
    // Crea un hijo que será el nombre con el valor FIFA
    $juego1->addChild('nombre','FIFA');
    // Crea el elemento para que se guarden varios valores
    $dispositivos = $juego1->addChild('dispositivos');
    // Crea varios elementos dispositivos para el mismo juego
    $dispositivos-> addChild('dispositivo','XBOX');
    $dispositivos-> addChild('dispositivo','PS5');

    $juego2 =  $xml->addChild('juego');
    $juego2 -> addAttribute('id','2');
    $juego2 -> addAttribute('disponible','si');
    $juego2 ->addChild('nombre','GTA');
    $dispositivos = $juego2->addChild('dispositivos');
    $dispositivos-> addChild('dispositivo','XBOX');

    $juego2 =  $xml->addChild('juego');
    $juego2 -> addAttribute('id','3');
    $juego2 -> addAttribute('disponible','si');
    $juego2 ->addChild('nombre','Tetrix');
    $dispositivos = $juego2->addChild('dispositivos');
    $dispositivos-> addChild('dispositivo','PC');
    $dispositivos-> addChild('dispositivo','PS5');
    $dispositivos-> addChild('dispositivo','XBOX');

    $xml->asXML('juegos.xml');
    $juegos = simplexml_load_file('juegos.xml');

    muestraTabla();
    cambiaDisponible(1);
    cambiaDisponible(2);
    cambiaDisponible(3);
    muestraTabla();

    // Escribe los hijos de cada elemento
    function leerElemento($elemento){
        foreach ($elemento->children() as $a){
            echo $a;
        }
    }

    // Crea en formato lista los elementos en este caso de dispositivos
    function leerElementos($elemento){
        foreach ($elemento->children() as $a){
            echo "<li>";
            echo $a;
            echo "</li>";
        }
    }

    // Cambia el estado de disponible a un videojuego según el ID que pasemos como parametro
    function cambiaDisponible($id){
        $juegos = simplexml_load_file('juegos.xml');
        foreach ($juegos as $elemento) {
            if($elemento['id'] == $id){
                if($elemento['disponible'] == 'si'){
                    // Tambien se puede con $elemento[0]['disponible']
                    $elemento['disponible'] = 'no';
                }else{
                    $elemento['disponible'] = 'si';
                }
                // Para que no siga iterando
                break;
            }
        }

        //Necesario para sobreescribir
        $juegos->asXML('juegos.xml');
    }

    // Escribe la tabla en la página para que la podamos visualizar
    function muestraTabla(){
        $juegos = simplexml_load_file('juegos.xml');
        echo "<table border='1'><th>idJuego</th><th>Disponible</th><th>Nombre</th><th>Dispositivos</th>";
        foreach ($juegos as $elemento) {
        echo "<tr>";
        echo "<td>";
            echo $elemento['id'];
        echo "</td>";
        echo "<td>";
            echo $elemento['disponible'];
        echo "</td>";
        echo "<td>";
                leerElemento($elemento);
         echo "</td>";
         echo "<td>";
        foreach($elemento as $campos => $valor){
            leerElementos($valor);
        }
        echo "</td>";
        echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>