<?php


class SorteoDAO{

    public static function insert($sorteo){
        $sql = "INSERT INTO Sorteos(numero1, numero2, numero3, numero4, numero5) VALUES (?,?,?,?,?)";
        $parametros = array($sorteo[0],$sorteo[1],$sorteo[2],$sorteo[3],$sorteo[4]);

        $result = self::realizaConsulta($sql,$parametros);

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function realizaConsulta($sql,$arrayParametros){
        try {
            $con = new PDO('mysql:host=192.168.1.141;dbname=examen1','fernando','fernando');
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