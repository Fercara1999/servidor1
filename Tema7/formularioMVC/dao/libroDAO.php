<?
// require("./dao/factoryBD.php");

class LibroDAO{


    public static function inserta(){
        $sql = "INSERT INTO libro(isbn,titulo,autor,editorial,fechaLanzamiento,numeroPaginas) VALUES (?,?,?,?,?,?)";
        $parametros = array($_REQUEST['isbn'],$_REQUEST['titulo'],$_REQUEST['autor'],$_REQUEST['editorial'],$_REQUEST['fechaLanzamiento'],$_REQUEST['numeroPaginas']);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function findAll(){
        $sql = "SELECT * FROM libro WHERE activo = 1";
        $parametros = [];
        $result = FactoryBD::realizaConsulta($sql,$parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
        
    }
}

?>