<?php

class FactoryBD{
    public static function RealizaConsulta($sql,$arrayParametros){
        try {
            $con = new PDO('mysql:host='.IP.';dbname='.BD,USER,PASSWORD);
            $stmt = $con->prepare($sql);
            $stmt->execute($arrayParametros);
        } catch (PDOException $e) {
            $stmt = null;
            echo $e->getMessage();
            unset($con);
        }
        return $stmt;
    }
}

?>