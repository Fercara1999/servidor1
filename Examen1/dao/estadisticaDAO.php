<?php

// Clase para las estadisticasDAO
    class EstadisticaDAO{
     
        // Obtenemos el array de estadisticas
        public static function findAll(){
            // Muestra las estadísticas de todos los usuarios
            $sql = "SELECT * FROM estadisticas";
            $parametros = array();
    
            $result = FactoryBD::realizaConsulta($sql,$parametros);
            $arrayEstadisticas = array();
    
            while($estadisticaSTD = $result->fetchObject()){
                $estadistica = new Estadistica($estadisticaSTD->id_estadistica,
                $estadisticaSTD->id_usuario,
                $estadisticaSTD->id_palabra,
                $estadisticaSTD->resultado,
                $estadisticaSTD->intentos,
                $estadisticaSTD->fecha);
                array_push($arrayEstadisticas,$estadistica);
            }
    
            return $arrayEstadisticas;
        }

        // Insertamos una nueva estadística en la BD
        public static function insert(){
            $sql = "INSERT INTO estadisticas(id_usuario,id_palabra,resultado,intentos) VALUES (?,?,?,?)";
            $parametros = array($_SESSION['usuario']->id_usuario, $_REQUEST['palabra'], $resultado,$intentos);

            $result = FactoryBD::realizaConsulta($sql,$parametros);
            return true;
        }

        // Muestra las estadísticas del usuario que tiene la sesión iniciada
        public static function findbyIdUsuario(){
               
               $sql = "SELECT * FROM estadisticas WHERE id_usuario = ?";
               $parametros = array($_SESSION['usuario']->id_usuario);
       
               $result = FactoryBD::realizaConsulta($sql,$parametros);
               $arrayEstadisticas = array();
       
               while($estadisticaSTD = $result->fetchObject()){
                   $estadistica = new Estadistica($estadisticaSTD->id_estadistica,
                   $estadisticaSTD->id_usuario,
                   $estadisticaSTD->id_palabra,
                   $estadisticaSTD->resultado,
                   $estadisticaSTD->intentos,
                   $estadisticaSTD->fecha);
                   array_push($arrayEstadisticas,$estadistica);
               }
       
               return $arrayEstadisticas;
        }
        

    }

?>