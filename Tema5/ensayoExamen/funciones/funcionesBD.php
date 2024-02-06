<?php

require("confBD.php");

function findAll(){
    try {
        $DSN = 'mysql:host='.IP.';dbname='.BD;
        $con = new PDO($DSN,USER,PASS);
        $sql = "select * from productos";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $array_productos = array();
        while($producto = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($array_productos,$producto);
        }
        return $array_productos;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

function findById($id){
    try {
        $DSN = 'mysql:host='.IP.';dbname='.BD;
        $con = new PDO($DSN,USER,PASS);
        $sql = "select * from productos where id_producto = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($id));
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $producto;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

?>