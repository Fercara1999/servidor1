<?php

class FactoryBD{
    public static function realizaConsula($sql,$arrayParametros){
        try {
            $con = new PDO('mysql:host='.IP.';dbname='.BD,USER,PASSWORD);
            $stmt = $con->prepare($sql);
            $stmt->execute($arrayParametros);
        } catch (\Throwable $th) {
            $stmt = null;
            echo $th->getMessage();
            unset($con);
        }
        return $stmt;
    }
}

?>