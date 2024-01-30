-- Crear la base de datos (si no existe)
CREATE DATABASE IF NOT EXISTS api;
USE api;

-- Tabla para Multimedia
CREATE TABLE institutos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    localidad VARCHAR(255) NOT NULL,
    telefono INT NOT NULL
);

-- Tabla para Pelicula con Foreign Key
CREATE TABLE Pelicula (
    multimedia_id INT PRIMARY KEY,
    genero VARCHAR(50) NOT NULL,
    director VARCHAR(100) NOT NULL,
    activo BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (multimedia_id) REFERENCES Multimedia(multimedia_id)
);

-- Tabla para Serie con Foreign Key
CREATE TABLE Serie (
    multimedia_id INT PRIMARY KEY,
    temporadas INT NOT NULL,
    episodios_por_temporada INT NOT NULL,
    activo BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (multimedia_id) REFERENCES Multimedia(multimedia_id)
);

-- Insertar Datos de Ejemplo
INSERT INTO Multimedia (titulo, duracion) VALUES
    ('Interstellar', 169),
    ('Inception', 148),
    ('Breaking Bad', 0);

INSERT INTO Pelicula (multimedia_id, genero, director) VALUES
    (1, 'Ciencia Ficción', 'Christopher Nolan'),
    (2, 'Ciencia Ficción', 'Christopher Nolan');

INSERT INTO Serie (multimedia_id, temporadas, episodios_por_temporada) VALUES
    (3, 5, 10);

-- Mostrar las tablas
SHOW TABLES;

-- Mostrar la estructura de Multimedia
DESCRIBE Multimedia;

-- Mostrar la estructura de Pelicula
DESCRIBE Pelicula;

-- Mostrar la estructura de Serie
DESCRIBE Serie;
