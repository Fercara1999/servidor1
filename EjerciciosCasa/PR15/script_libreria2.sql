DROP DATABASE IF EXISTS libreria2;

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
    fechaNacimiento DATE NOT NULL,
    borrado BOOLEAN DEFAULT false
);

CREATE TABLE libros (
    ISBN VARCHAR(13) PRIMARY KEY,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    editorial VARCHAR(255),
    genero ENUM('aventuras', 'ciencia_ficcion', 'policiaco', 'terror', 'misterio', 'romantica', 'humor', 'poesia', 'mitologia', 'teatro', 'cuento', 'no_ficcion'),
    anioPublicacion INT,
    sinopsis TEXT,
    rutaPortada VARCHAR(255),
    precio DECIMAL(10, 2),
    unidades INT,
    borrado BOOLEAN DEFAULT false
);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('1234567890123','Juego de tronos','George R R Martin','Plaza y Janes','aventuras',2023,'Sinopsis del libro...','./imagenes/juegodetronos.webp',29.99,100,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('1234567890124','Choque de Reyes','George R R Martin','Plaza y Janes','aventuras',2023,'La novela río más espectacular jamás escrita','./imagenes/choquedereyes.jpg',29.39,100,false);