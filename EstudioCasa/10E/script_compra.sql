-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS compra;

CREATE USER compra IDENTIFIED BY 'compra';

-- Seleccionar la base de datos
USE compra;

GRANT ALL on compra.* TO compra;

-- Crear la tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    categoria VARCHAR(50),
    precio DECIMAL(10, 2),
    cantidad INT
);

-- Insertar 20 productos de ejemplo
INSERT INTO productos (nombre, categoria, precio, cantidad) VALUES
    ('Leche', 'Lácteos', 2.50, 1),
    ('Pan', 'Panadería', 1.50, 2),
    ('Manzanas', 'Frutas', 3.00, 5),
    ('Detergente', 'Limpieza', 4.75, 1),
    ('Arroz', 'Cereales', 2.00, 3),
    ('Huevos', 'Lácteos', 1.80, 12),
    ('Pollo', 'Carnes', 5.50, 2),
    ('Papel Higiénico', 'Artículos de hogar', 3.25, 6),
    ('Café', 'Bebidas', 5.00, 1),
    ('Tomates', 'Verduras', 2.20, 4),
    ('Pasta', 'Cereales', 1.75, 3),
    ('Jabón de manos', 'Limpieza', 1.50, 2),
    ('Queso', 'Lácteos', 4.00, 1),
    ('Cereal de desayuno', 'Cereales', 3.50, 2),
    ('Aceite de oliva', 'Aceites', 6.00, 1),
    ('Pescado', 'Carnes', 7.50, 1),
    ('Pimientos', 'Verduras', 2.75, 3),
    ('Galletas', 'Snacks', 2.25, 2),
    ('Agua embotellada', 'Bebidas', 1.00, 6),
    ('Yogur', 'Lácteos', 1.25, 4);

-- Mostrar la estructura de la tabla
DESCRIBE productos;