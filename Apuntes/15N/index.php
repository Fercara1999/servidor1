<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>15N</title>
</head>
<body>
    <?php
        $dom = new DOMDocument("1.0","utf-8");
        $raiz = $dom->appendChild($dom->createElement("instrumentos"));
        $instrumento = $dom->createElement("instrumento");
        $nombre =  $dom->createElement("nombre","guitarra");
        $familia = $dom->createElement("familia","cuerda");
        $antiguedad = $dom->createElement("antiguedad","5 años");
        $raiz ->appendChild($instrumento);
        $instrumento->appendChild($nombre);
        $instrumento->appendChild($familia);
        $instrumento->appendChild($antiguedad);
        $instrumento->setAttribute('id','1');

        $instrumento = $raiz->appendChild($dom->createElement('instrumento'));
        $instrumento->appendChild($dom->createElement('nombre','violin'));
        $instrumento->appendChild($dom->createElement('familia','cuerda'));
        $instrumento->setAttribute('id','2');

        $dom -> formatOutput = true;
        $dom->save('instrumentos.xml');
        
        $dom->load('instrumentos.xml');

        echo "<pre>";
        print_r($dom);

        foreach ($dom->childNodes as $instrumentos) {
            foreach ($instrumentos->childNodes as $instrumento) {
                //dom element
                if($instrumento->nodeType == 1) {
                    echo "\n".$instrumento->getAttribute('id');
                    $nodo = $instrumento->firstChild;
                    do{
                        if($nodo->nodeType ==1){
                            echo "\n".$nodo -> tagName.":".$nodo->nodeValue;
                        }
                    }while($nodo = $nodo->nextSibling);
                    // echo "\nNombre: " .$instrumento->firstChild->nodeValue;
                    // echo "\nNombre2: " .$instrumento->firstChild->firstChild->data;
                }
            }
        }
        echo "nuevo\n";
        $instrumentoLista = $dom->getElementsByTagName("instrumento");
        foreach ($instrumentoLista as $value) {
            $a = $value->getElementsByTagName('nombre');
            echo $a->item(0)->tagName .":".$a->item(0)->nodeValue."\n";
            $a = $value->getElementsByTagName('familia');
            echo $a->item(0)->tagName .":".$a->item(0)->nodeValue."\n";
            // foreach ($value as $nodos) {
            //     echo $nodos[1];
            // }
        }

        // para descargar lo que estamos haciendo
        echo "<a href='./enlace.php'>Descargar</a>";

    ?>
</body>
</html>