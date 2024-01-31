CREATE DATABASE api;

-- Tabla para INSTITUTOS
CREATE TABLE institutos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    localidad VARCHAR(255) NOT NULL,
    telefono INT NOT NULL
);

insert into institutos values(null,'IES Claudio Moyano','Zamora',980154785);
insert into institutos values(null,'IES La Vaguada','Zamora',980653298);
insert into institutos values(null,'IES Los Sauces','Benavente',980789654);
insert into institutos values(null,'IES Maria de Molina','Zamora',980524136);