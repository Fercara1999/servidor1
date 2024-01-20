create table Cita (
    id int primary key auto_increment,
    especialista varchar(25) not null,
    motivo varchar(200) not null,
    fecha date,
    paciente varchar(15),
    activo boolean default true
);

alter table Cita
add constraint paciente_fk
foreign key (paciente)
references Usuario (codUsuario);

insert into Cita values(5,'traumatologo',
'Tengo la rodilla hinchada', '2024-02-25',6,true);

insert into Cita values(3,'oftalmologo',
'Tengo el ojo rojo', '2024-06-25',9,true);

insert into Cita values(4,'oftalmologo',
'Tengo el ojo verde', '2024-06-25',9,true);

create table paciente(

)