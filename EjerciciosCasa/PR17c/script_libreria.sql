DROP DATABASE IF EXISTS libreria;

CREATE DATABASE IF NOT EXISTS libreria;

USE libreria;

GRANT ALL on libreria.* to libreria;

CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    fechaNacimiento DATE NOT NULL,
    rol ENUM('cliente', 'moderador', 'administrador') DEFAULT 'cliente',
    borrado BOOLEAN DEFAULT false
);

CREATE TABLE IF NOT EXISTS libros (
    ISBN VARCHAR(13) PRIMARY KEY,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    editorial VARCHAR(255),
    genero ENUM('aventuras', 'ficcion', 'policiaco', 'terror', 'misterio', 'romantica', 'humor', 'poesia', 'mitologia', 'teatro', 'cuento', 'no_ficcion','comic'),
    anioPublicacion INT,
    sinopsis TEXT,
    rutaPortada VARCHAR(255),
    precio DECIMAL(10, 2),
    unidades INT,
    borrado BOOLEAN DEFAULT false
);

CREATE TABLE IF NOT EXISTS albaranes (
    codigoAlbaran INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fechaAlbaran DATE NOT NULL,
    ISBN_libro VARCHAR(13) NOT NULL,
    cantidadIncremento INT NOT NULL,
    id_usuario SMALLINT UNSIGNED,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (ISBN_libro) REFERENCES libros(ISBN),
    borrado BOOLEAN DEFAULT false
);

CREATE TABLE IF NOT EXISTS pedidos (
    idPedido INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_usuario SMALLINT UNSIGNED,
    fechaPedido DATE NOT NULL,
    ISBN VARCHAR(13) NOT NULL,
    cantidad INT NOT NULL,
    precioTotal DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (ISBN) REFERENCES libros(ISBN),
    borrado BOOLEAN DEFAULT false
);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788401032424','Juego de tronos','George R R Martin','Plaza y Janes','aventuras',2023,'La primera parte de la saga Canción de fuego y hielo','https://www.penguinlibros.com/es/3087609-thickbox_default/juego-de-tronos-cancion-de-hielo-y-fuego-1.jpg',29.99,100,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788401032431','Choque de Reyes','George R R Martin','Plaza y Janes','aventuras',2023,'La segunda parte de la saga Canción de fuego y hielo','https://www.penguinlibros.com/es/3087584-thickbox_default/choque-de-reyes-cancion-de-hielo-y-fuego-2.jpg',29.39,100,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788401032448','Tormenta de Espadas','George R R Martin','Plaza y Janes','aventuras',2023,'La tercera parte de la saga Canción de fuego y hielo','https://www.penguinlibros.com/es/3087586-thickbox_default/tormenta-de-espadas-cancion-de-hielo-y-fuego-3.jpg',29.39,100,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788401032455','Festín de cuervos','George R R Martin','Plaza y Janes','aventuras',2023,'La cuarta parte de la saga Canción de fuego y hielo','https://www.penguinlibros.com/es/3087611-thickbox_default/festin-de-cuervos-cancion-de-hielo-y-fuego-4.jpg',26.90,100,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788401032456','Danza de dragones','George R R Martin','Plaza y Janes','aventuras',2023,'La quinta parte de la saga Canción de fuego y hielo','https://www.penguinlibros.com/es/3087588-thickbox_default/danza-de-dragones-cancion-de-hielo-y-fuego-5.jpg',29.39,100,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788401031113','Holly','Stephen King','Plaza y Janes','misterio',2022,'La nueva novela del Rey del Terror recuerda a joyas como Misery','https://www.penguinlibros.com/es/2988970-thickbox_default/holly-edicion-en-espanol.jpg',23.90,100,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788445016473','Buenos presagios','Neil Gaiman','Minotauro','misterio',2023,'Una novela imprescindible de Pratchett y Gaiman','https://proassetspdlcom.cdnstatics2.com/usuaris/libros/thumbs/18a2ccfb-cf99-439c-a0a4-946c8c0badd6/d_1200_1200/portada_buenos-presagios-ilustrado-por-paul-kidby_terry-pratchett_202310251208.webp',30,100,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788418037818','Trenza del mar Esmeralda','Brandon Sanderson','Nova','aventuras',2022,'Vuelve al universo del Cosmere con una aventura divertida y cautivadora que encantará a los fans de La princesa prometida','https://www.penguinlibros.com/es/2741810-thickbox_default/trenza-del-mar-esmeralda-novela-secreta-1.jpg',26.90,100,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788466675680','Todo vuelve','Juan Gómez-Jurado','Ediciones B','policiaco',2023,'Tras el enorme éxito de REINA ROJA y TODO ARDE, continúa la saga que ha conquistado al mundo','https://www.penguinlibros.com/es/2838115-thickbox_default/todo-vuelve-todo-arde-2.jpg',22.90,50,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788419466242','Poeta en Nueva York','Federico García Lorca','Lunwerg','poesia',2023,'Una de las creaciones líricas más significativas del siglo XX reinterpretada a través de la inconfundible mirada de uno de nuestros ilustradores contemporáneos más importantes y originales','https://proassetspdlcom.cdnstatics2.com/usuaris/libros/thumbs/8ab0224e-f9ee-496a-b3ff-2957e8a5ea55/d_1200_1200/portada_poeta-en-nueva-york_federico-garcia-lorca_202211041424.webp',24.00,40,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788418225710','Watchmen','Alan Moore','ECC','comic',2020,'Posiblemente la mejor historia de superhéroes de todos los tiempos, galardonada con premios tan prestigiosos como los Kirby, los Eisner, los Harvey e incluso el Hugo','https://content.eccediciones.com//productos/7992/cubierta_watchmen_4ed.jpg',35.00,10,false);

INSERT INTO libros (ISBN,titulo,autor,editorial,genero,anioPublicacion,sinopsis,rutaPortada,precio,unidades,borrado) 
VALUES ('9788467065923','Los renglones torcidos de Dios','Torcuato Luca De Tena','Austral','ficcion',2022,'Los renglones torcidos de Dios es una novela honesta sobre la locura, que sigue manteniendo intacta su vigencia. Luca de Tena, autor también de Edad prohibida, quiso internarse en un sanatorio antes de escribirla','https://proassetspdlcom.cdnstatics2.com/usuaris/libros/thumbs/a26be2d7-0f79-4c0f-b0a8-0cba0527a341/d_1200_1200/portada_los-renglones-torcidos-de-dios_torcuato-luca-de-tena_202204121052.webp',13.95,20,false);

INSERT INTO usuarios (usuario, contrasena, correo, fechaNacimiento, rol)
VALUES ('moderador', sha1('moderador'), 'moderador@libreria.com', '1990-01-01', 'moderador');

INSERT INTO usuarios (usuario, contrasena, correo, fechaNacimiento, rol)
VALUES ('administrador', sha1('administrador'), 'administrador@libreria.com', '1990-01-03', 'administrador');

INSERT INTO usuarios (usuario, contrasena, correo, fechaNacimiento, rol)
VALUES ('cliente', sha1('cliente'), 'cliente@libreria.com', '1990-01-05', 'cliente');
