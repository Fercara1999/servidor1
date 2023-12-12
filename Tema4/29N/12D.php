<?php

// En /etc/php/8.1/apache2/php.ini, buscar pdo

// Actualizar con apt-get upgrade y luego apt-get update
// sudo apt-get install postgresql postgresql-contrib

// Hay que iniciar sesion con el usuario que tenga postgresql
// Entramos con el usuario postgres: sudo -i -u postgres

// Entramos en la consola de postgresql con psql

// create database prueba
// Para conectarnos a la base de datos prueba: \c prueba

// sudo nano /etc/postgresql/14/main/postgresql.conf
// Dentro de ese archivo, descomentamos la linea 'listen_addresses' y ponemos donde ahora está localhost, *

// Creación de un usuario, en el archivo /etc/postgresql/14/main/pg_hba.conf
// host     all     all     0.0.0.0/0   scram-sha-256

// Desde el usuario postgres, nos conectamos a psql
// create user fernando with password 'fernando';
// grant all privileges on all tables in schema public to fernando;

// sudo apt-get install php-pgsql
// En /etc/php/8.1/apache2/php.ini, descomentamos: extension=pdo_pgsql
// Reiniciamos los servicios postgresql y apache2

// Nos metemos con : psql -U fernando -d prueba -h 192.168.7.202 -W (pide contrasela)

// creamos una tabla con: create table tiempo (id serial primary key, descripcion varchar(100), grados int);
// insert into tiempo (descripcion, grados) values ('Hace un dia lluvioso con un poco de aire',14);

require ('./confBD.php');

$DSN = 'pgsql:host='.IP.';dbname=prueba';

try {
    $con = new PDO($DSN,USER,PASSWORD);
    $sql = "select * from tiempo";

    $resultado = $con->query($sql);

    while ($row = $resultado ->fetch(PDO::FETCH_BOTH)) {
        echo "El tiempo es: $row[1] y hace $row[2] grados<br>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}finally{
    unset($con);
}

try {
    $con = new PDO($DSN,USER,PASSWORD);
    $sql = "insert into tiempo (descripcion, grados) values (?,?)";
    $stmt = $con ->prepare($sql);
    // $stmt->execute(array('Hace niebla',5));

} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $con = new PDO($DSN,USER,PASSWORD);
    $sql = "insert into tiempo (descripcion, grados) values (:desc,:grad)";
    $stmt = $con ->prepare($sql);
    $nieve = "Está nevando";
    $grados = 5;
    $stmt->bindParam(':desc',$nieve);
    $stmt->bindParam(':grad', $grados);
    // $stmt->execute();

} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $con = new PDO($DSN,USER,PASSWORD);
    $sql = "select * from tiempo where grados < 6";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $stmt->bindColumn(2,$descripcion);
    $stmt->bindColumn(3,$grados);
    
    while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
        echo "El tiempo es: $descripcion  y hace $grados grados<br>";
    }
    
    $resultado = $con->query($sql);

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>