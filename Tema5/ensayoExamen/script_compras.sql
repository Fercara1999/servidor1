-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS tienda_compras;
USE tienda_compras;

-- Crear la tabla de productos
CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

-- Insertar algunos productos
INSERT INTO productos (nombre, precio) VALUES ('Camiseta', 25.99);
INSERT INTO productos (nombre, precio) VALUES ('Pantalón', 39.99);
INSERT INTO productos (nombre, precio) VALUES ('Zapatos', 49.99);
INSERT INTO productos (nombre, precio) VALUES ('Gorra', 12.99);
INSERT INTO productos (nombre, precio) VALUES ('Bufanda', 19.99);

-- Crear la tabla de compras
-- CREATE TABLE compras (
--     id_compra INT AUTO_INCREMENT PRIMARY KEY,
--     id_producto INT,
--     fecha_compra DATE,
--     cantidad INT,
--     FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
-- );

-- -- Insertar algunas compras
-- INSERT INTO compras (id_producto, fecha_compra, cantidad) VALUES (1, '2024-02-06', 2);
-- INSERT INTO compras (id_producto, fecha_compra, cantidad) VALUES (2, '2024-02-07', 1);
-- INSERT INTO compras (id_producto, fecha_compra, cantidad) VALUES (3, '2024-02-08', 3);
-- INSERT INTO compras (id_producto, fecha_compra, cantidad) VALUES (4, '2024-02-08', 2);
-- INSERT INTO compras (id_producto, fecha_compra, cantidad) VALUES (5, '2024-02-09', 1);
