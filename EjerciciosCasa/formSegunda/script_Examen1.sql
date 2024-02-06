-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS examen1;

-- Seleccionar la base de datos
USE examen1;

-- Crear la tabla Usuario
CREATE TABLE IF NOT EXISTS Usuario (
    codUsuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    numeroAccesos INT NOT NULL,
    perfil ENUM('user', 'admin') NOT NULL,
    activo BOOLEAN NOT NULL
);

-- Crear la tabla Apuesta
CREATE TABLE IF NOT EXISTS Apuesta (
    id_apuesta INT AUTO_INCREMENT PRIMARY KEY,
    codUsuario INT,
    numero1 INT NOT NULL,
    numero2 INT NOT NULL,
    numero3 INT NOT NULL,
    numero4 INT NOT NULL,
    numero5 INT NOT NULL,
    fecha_apuesta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    activo TINYINT(1) DEFAULT 1,
    FOREIGN KEY (codUsuario) REFERENCES Usuario(codUsuario)
);

CREATE TABLE IF NOT EXISTS Sorteos (
    id_sorteo INT PRIMARY KEY AUTO_INCREMENT,
    numero1 INT NOT NULL,
    numero2 INT NOT NULL,
    numero3 INT NOT NULL,
    numero4 INT NOT NULL,
    numero5 INT NOT NULL,
    fecha_sorteo TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

