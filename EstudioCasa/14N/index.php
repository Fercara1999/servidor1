<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros-XML</title>
</head>
<body>
    <?php

        $xml = new SimpleXMLElement("<libros></libros>");

        $libro1 = $xml->addChild('libro');
        $libro1->addAttribute('id','1');
        $libro1->addChild('titulo','Holly');
        $libro1->addChild('autor','Stephen King');
        $categorias = $libro1->addChild('categorias');
        $categorias -> addChild('categoria','misterio');
        $categorias -> addChild('categoria','ficcion');
        $categorias -> addChild('categoria','thriller');

        $libro2 = $xml->addChild('libro');
        $libro2->addAttribute('id','2');
        $libro2->addChild('titulo','Todo vuelve');
        $libro2->addChild('autor','Juan Gómez-Jurado');
        $categorias = $libro2->addChild('categorias');
        $categorias -> addChild('categoria','misterio');

        $libro3 = $xml->addChild('libro');
        $libro3->addAttribute('id','3');
        $libro3->addChild('titulo','Juego de tronos');
        $libro3->addChild('autor','George R R Martin');
        $categorias = $libro3->addChild('categorias');
        $categorias -> addChild('categoria','misterio');
        $categorias -> addChild('categoria','aventuras');

        $xml -> asXML("libros.xml");
        $libros = simplexml_load_file('libros.xml');

        echo "<table border ='1'><th>idLibro</th><th>Titulo</th><th>Autor</th><th>Categorias</th>";

            foreach($libros as $libro){
                echo "<tr>";
                echo "<td>".$libro['id']."</td>";
                echo "<td>";
                leerElementos($libro);
                echo "<td>";
                foreach ($libro as $key => $value) {
                    leerCategoria($value);
                }
                echo "</td>";
                echo "</tr>";
            }

        echo "</table";

        function leerElementos($elemento){
            foreach($elemento->children() as $a){
                echo "<td>";    
                echo $a;
                echo "</td>";
            }
        }

        function leerCategoria($elemento){
            foreach ($elemento->children() as  $a) {
                echo "<li>";
                echo $a;
                echo "</li>";
            }
        }


    ?>
</body>
</html>