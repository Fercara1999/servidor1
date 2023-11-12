<?php

function enviado(){
    if(isset($_REQUEST["Enviar"])){
        anadeLibro();
        return true;
    }else
        return false;
}

function anadeLibro(){
    if($fp = fopen("./libros.csv","a+")){

        $campos = [];
        $campos[0] = $_GET['titulo'];
        $campos[1] = $_GET['autor'];
        $campos[2] = $_GET['editorial'];
        $campos[3] = $_GET['fechaPub'];
        $campos[4] = $_GET['precio'].'€';
 
        // $texto = $titulo.";".$autor.";".$editorial.";".$fecha.";". $precio;

        fputcsv($fp,$campos,";");


       fclose($fp);

    }else{
        echo "Error al abrir el archivo";
    }
}

function verDatos(){

    if($fp = fopen("./libros.csv","a+")){
        echo "<table border='1'>";
            while(($datos = fgetcsv($fp, 1000, ";")) !== false){
                echo "<tr>";
                for($i = 0 ; $i < count($datos) ; $i++){
                    echo "<td>".$datos[$i]."</td>";
                }
                echo "</tr>";
            }
        echo "</table>";
    }
}

?>