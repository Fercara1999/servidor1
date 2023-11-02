<?php 

// // 1º Ver si existe
// // 2º Lectura del fichero

// if(file_exists('fichero.txt')){
//     // echo "Existe";
//     if(!$fp = fopen("fichero.txt","r")){
//         echo "Ha habido un problema al abrir el fichero";
//     }else{
//         $leido = fread($fp,filesize('fichero.txt'));
//         echo $leido;
//         fclose($fp);
//     }

// }else{
//     echo "No existe";
// }


// // 3º Escribir el fichero, con w borra lo anterior

// // if(file_exists('fichero.txt')){
// //     // echo "Existe";
// //     if(!$fp = fopen("fichero.txt","w")){
// //         echo "Ha habido un problema al abrir el fichero";
// //     }else{
// //         $texto = "Escribiendo ...";
// //          if(!fwrite($fp,$texto,strlen($texto))){
// //             echo "Error al escribir";
// //             fclose($fp);
// //          }
// //     }

// // }else{
// //     echo "No existe";
// // }

// echo "<br>";

// // 4º Escribir el fichero, con a no borra lo anterior

// if(file_exists('fichero.txt')){
//     // echo "Existe";
//     if(!$fp = fopen("fichero.txt","a")){
//         echo "Ha habido un problema al abrir el fichero";
//     }else{
//         $texto = "Escribiendo ...";
//          if(!fwrite($fp,$texto,strlen($texto))){
//             echo "Error al escribir";
//             fclose($fp);
//          }
//     }

// }else{
//     echo "No existe";
// }

// 5º Escribir el fichero, usando la c

// if(file_exists('fichero.txt')){
//     // echo "Existe";
//     if(!$fp = fopen("fichero.txt","c")){
//         echo "Ha habido un problema al abrir el fichero";
//     }else{
//         $texto = "medio";
//         fseek($fp,28);
//         if(!fwrite($fp,$texto,strlen($texto))){
//                         echo "Error al escribir";
//                         fclose($fp);
//         }   
//     }

// }else{
//     echo "No existe";
// }

// 6º Lectura por lineas

// if(file_exists('fichero.txt')){
//     // echo "Existe";
//     if(!$fp = fopen("ficheroLineas.txt","r")){
//         echo "Ha habido un problema al abrir el fichero";
//     }else{
//         while($leido = fgets($fp,filesize('ficheroLineas.txt')))
//             echo $leido."<br>";
        
//         fclose($fp);
//     }   
// }else{
//     echo "No existe";
// }

// 7º Escribir fichero por lineas

// if(file_exists('fichero.txt')){
//     // echo "Existe";
//     if(!$fp = fopen("ficheroLineas.txt","r+")){
//         echo "Ha habido un problema al abrir el fichero";
//     }else{
//         $texto = "Entre lineas\n";
//         $leido = fgets($fp,filesize('ficheroLineas.txt'));
//         $salto = ftell($fp);
//         if(!fputs($fp,$texto,strlen($texto)))
//                 echo "Error al escribir";
//         fclose($fp);
//     }   
// }else{
//     echo "No existe";
// }

// Modificacion de un fichero secuencial
// crear un archivo temporal leer y modificar lo que haga falta
// borrar el archivo anterior y renombrar el temp con el nombre del anterior

$tmp = tempnam(".","tem.txt");
if(file_exists('fichero.txt')){
    // echo "Existe";
    if((!$fp = fopen("ficheroLineas.txt","r")) || (!$ft = fopen($tmp,"w"))){
        echo "Ha habido un problema al abrir el fichero";
    }else{
        $texto = "Linea nueva\n";
        $contador = 1;
        while($leido = fgets($fp,filesize('ficheroLineas.txt'))){
            fputs($ft,$leido,strlen($leido));
            if($contador == 1){
                fputs($ft,$texto,strlen($texto));
                fputs($ft,"\n",strlen('\n'));
                $contador++;
            }
        }
            
        fclose($fp);
        fclose($ft);
        unlink("ficheroLineas.txt");
        rename($tmp,"ficheroLineas.txt");
    }   
}else{
    echo "No existe";
}



?>