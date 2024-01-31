-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS apiCine;
USE apiCine;

-- Crear la tabla peliculas
CREATE TABLE IF NOT EXISTS peliculas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    director VARCHAR(255) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    activo BOOLEAN NOT NULL
);

-- Insertar datos reales de películas
INSERT INTO peliculas (titulo, director, genero, activo) VALUES
('Titanic', 'James Cameron', 'Romance', true),
('The Shawshank Redemption', 'Frank Darabont', 'Drama', true),
('Inception', 'Christopher Nolan', 'Ciencia Ficción', true),
('The Godfather', 'Francis Ford Coppola', 'Crimen', true),
('La La Land', 'Damien Chazelle', 'Romance', true);
