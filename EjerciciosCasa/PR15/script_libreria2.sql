CREATE DATABASE IF NOT EXISTS libreria2;

CREATE USER libreria2 IDENTIFIED BY 'libreria2';

-- Seleccionar la base de datos
USE libreria2;

GRANT ALL on libreria2.* to libreria2;

-- Crear la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    fechaNacimiento DATE NOT NULL
);