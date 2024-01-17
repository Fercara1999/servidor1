-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS Biblioteca;

-- Seleccionar la base de datos
USE Biblioteca;

-- Crear la tabla de libros
CREATE TABLE IF NOT EXISTS Libros (
    isbn VARCHAR(13) PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    editorial VARCHAR(100),
    fechaLanzamiento DATE,
    activo BOOLEAN DEFAULT true NOT NULL
);
