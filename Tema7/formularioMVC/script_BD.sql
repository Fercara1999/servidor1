-- Crear la base de datos si no existe
DROP DATABASE IF EXISTS formulariomvc;
CREATE DATABASE IF NOT EXISTS formulariomvc;

-- Seleccionar la base de datos
USE formulariomvc;

-- Crear la tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    perfil ENUM('user', 'admin') NOT NULL,
    activo BOOLEAN NOT NULL DEFAULT true
);


-- Insertar algunos usuarios de ejemplo
INSERT INTO usuarios (usuario, password, perfil, activo) VALUES
    ('usuario1', 'contrasena1', 'admin', true),
    ('usuario2', 'contrasena2', 'user', true),
    ('usuario3', 'contrasena3', 'user', false);

