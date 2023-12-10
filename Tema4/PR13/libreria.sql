-- Crear la base de datos
CREATE DATABASE libreria;

-- Seleccionar la base de datos
USE libreria;

-- Crear la tabla libros
CREATE TABLE IF NOT EXISTS libros (
    isbn BIGINT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    editorial VARCHAR(255) NOT NULL,
    fecha_lanzamiento DATE NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

-- Inserción de datos
INSERT INTO libros values(9788412579658,'Holly','Stephen King','Plaza & Janes','2023-09-19',23.90);
INSERT INTO libros values(9788412579657,'Juego de tronos','George Martin','Plaza & Janes','2023-09-18',26.90);
INSERT INTO libros values(9788412574658,'Todo Vuelve','Juan Gomez Jurado','Ediciones B','2023-09-17',29.90);