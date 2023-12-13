-- Crear la base de datos
CREATE DATABASE libreria;

-- Seleccionar la base de datos
-- \c libreria;

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

INSERT INTO libros VALUES
(9788412580001,'El Resplandor','Stephen King','Editorial A','1980-01-28',15.99),
(9788412580002,'It','Stephen King','Editorial B','1986-09-15',19.99),
(9788412580003,'Cementerio de Animales','Stephen King','Editorial C','1983-11-14',12.99),
(9788412580004,'Carrie','Stephen King','Editorial A','1974-04-05',10.99),
(9788412580005,'La Torre Oscura','Stephen King','Editorial B','1982-06-10',25.99),
(9788412580006,'Misery','Stephen King','Editorial C','1987-06-08',18.99),
(9788412580007,'Cadena de Favores','Stephen King','Editorial A','1998-05-15',21.99),
(9788412580008,'22/11/63','Stephen King','Editorial B','2011-11-08',23.99),
(9788412580009,'El Misterio de Salems Lot','Stephen King','Editorial C','1975-10-17',14.99),
(9788412580010,'Doctor Sueño','Stephen King','Editorial A','2013-09-24',20.99),
(9788412580011,'La Zona Muerta','Stephen King','Editorial B','1979-08-30',17.99),
(9788412580012,'El Talismán','Stephen King','Editorial C','1984-11-08',22.99),
(9788412580013,'Apocalipsis','Stephen King','Editorial A','1978-09-01',27.99),
(9788412580014,'La Cúpula','Stephen King','Editorial B','2009-11-10',29.99),
(9788412580015,'Maleficio','Stephen King','Editorial C','1984-01-22',16.99),
(9788412580016,'El Juego de Gerald','Stephen King','Editorial A','1992-05-12',19.99),
(9788412580017,'El Viento por la Cerradura','Stephen King','Editorial B','2012-04-24',14.99),
(9788412580018,'Cell','Stephen King','Editorial C','2006-01-24',18.99),
(9788412580019,'Insomnia','Stephen King','Editorial A','1994-05-15',23.99),
(9788412580020,'La Chica que Amaba a Tom Gordon','Stephen King','Editorial B','1999-04-06',13.99);
