<?php

class CitaDAO{

    public static function findAll(){
        //return array con todos los usuarios
        $sql = "SELECT * FROM Cita WHERE activo = true";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayCitas = array();

        while($citaSTD = $result->fetchObject()){
            $cita = new Cita($citaSTD->id,
            $citaSTD->especialista,
            $citaSTD->motivo,
            $citaSTD->fecha,
            $citaSTD->paciente,
            $citaSTD->activo );
            array_push($arrayCitas,$cita);
        }

        return $arrayCitas;
    }

    public static function findbyId($id){
        
        $sql = "SELECT * FROM  Cita WHERE id = ?";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($citaSTD = $result->fetchObject()){
            $cita = new Cita($citaSTD->id,
            $citaSTD->especialista,
            $citaSTD->motivo,
            $citaSTD->fecha,
            $citaSTD->paciente,
            $citaSTD->activo);
            return $cita;
        }else{
        }
    }

    public static function insert($cita){
        $sql = "INSERT INTO Cita(especialista,motivo,fecha,paciente,activo) VALUES(?,?,?,?,?)";
        $parametros = array($cita->especialista,
        $cita->motivo,
        $cita->fecha,
        $cita->paciente,
        $cita->activo);
        // unset($parametros['perfil']);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function update($cita){
        $sql = 'UPDATE Cita SET especialista = ?,
        motivo = ?,
        fecha = ?,
        paciente = ?,
        activo = ?
        WHERE id = ?';
        
        $parametros = array($cita->especialista,
        $cita->motivo,
        $cita->fecha,
        $cita->paciente,
        $cita->activo,
        $cita->id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function delete($cita){
        $sql = "UPDATE Cita SET activo = false WHERE id = ?";

        $parametros = array($cita->id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function buscarPorPaciente($paciente){
        $sql = "SELECT * FROM  Cita WHERE paciente = ? AND activo = 1  AND fecha > now() ORDER BY fecha";
        $parametros = array($paciente->codUsuario);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayCitas = array();

        while($citaSTD = $result->fetchObject()){
            $cita = new Cita($citaSTD->id,
            $citaSTD->especialista,
            $citaSTD->motivo,
            $citaSTD->fecha,
            $citaSTD->paciente,
            $citaSTD->activo);
            array_push($arrayCitas,$cita);
        }

        return $arrayCitas;

    }

    public static function buscarPorPacienteH($paciente){
        $sql = "SELECT * FROM  Cita WHERE paciente = ? AND activo = 1  AND fecha < now() ORDER BY fecha desc";
        $parametros = array($paciente->codUsuario);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayCitas = array();

        while($citaSTD = $result->fetchObject()){
            $cita = new Cita($citaSTD->id,
            $citaSTD->especialista,
            $citaSTD->motivo,
            $citaSTD->fecha,
            $citaSTD->paciente,
            $citaSTD->activo);
            array_push($arrayCitas,$cita);
        }

        return $arrayCitas;

    }
}

?>