<?php

// Pasos para la instalación de un servidor mysql

// 1. Instalación de mysql-server

// sudo apt-get install mysql-server
// Si sale mensaje del kernel, clic en 'ok' y reiniciamos todos los servicios, no siempre sale

// Podemos entrar con sudo mysql -v

// 2. Le cambiamos la contraseña a root con: mysqladmin -u root password fernando

// 3. Después de entrar, creamos un usuario con:
    // create user 'fernando'@'%' identified by 'fernando';
// Con el % entramos desde todas las direcciones

// 4. Podemos ver los usuarios creados con:
// select host, user from user;

// 5 Accedemos a un usuario con:
// FORMA DE ACCESO -> mysql -h 192.168.7.202 -u fernando -p
// Nos pedirá la contraseña del usuario y entramos al usuario

// 6. Le damos todos los permisos al usuario que acabamos de crear:
// grant all privileges on *.* to 'fernando'@'%' with grant option;

// 7. Comprobamos que con show databases no solo vemos las tablas con metadatos
// sino también las tablas mysql y sys

require("./confBD.php");

// 8. Para realizar la conexion desde el programa, hay que instalar
// apt-get install php-mysql
// una vez instalado, hay que reiniciar apache

// Probar errores para conocer numeros a tratar posteriormente

try {
    $con = mysqli_connect(IP,USER,PASSWORD,'prueba');
        echo "Conectado";
        // $rborra = 'miguel\',20);drop table alumnos';
        // CONSULTAS PREPARADAS: verifican que los datos que se insertan, son del tipo que deben ser
        $rnombre = 'Manuel';
        $redad = 30;
        // Con null también o el campo de la columna tamien autoincrementa
        $sql = "insert into alumnos(nombre,edad) values('".$rnombre."',".$redad.")";
        $sqlprepa = "insert into alumnos(nombre,edad) values(?,?)";
        $stmt = mysqli_prepare($con,$sqlprepa);
        mysqli_stmt_bind_param($stmt,'si',$rnombre,$redad);
        mysqli_stmt_execute($stmt);

        if(!mysqli_query($con,$sql))
            echo mysqli_errno($con);
    mysqli_close($con);
// }
} catch (\Throwable $th) {
    switch ($th->getCode()){
        case 1062:
                echo "Ha introducido una clave primaria repetida";
                break;
        default:
                echo $th->getMessage();
                break;
    }
    // echo mysqli_connect_errno();
    // echo mysqli_connect_error();
    echo "Error de los datos de conexion";
    // mysqli_close($con) para cerrar la conexion
    mysqli_close($con);
}

// Creacion de una tabla


?>