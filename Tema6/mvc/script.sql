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

insert into Cita values(1,'traumatologo',
'Tengo la rodilla hinchada', '2024-02-25',true,1);

insert into Cita values(2,'oftalmologo',
'Tengo el ojo rojo', '2024-06-25',true,1);

create table paciente(

)