DROP DATABASE IF EXISTS seleccion_proyectos;
create DATABASE seleccion_proyectos;
USE seleccion_proyectos;

create table CRITERIO(
	ID int auto_increment,
	nombre varchar(90),
	tipo varchar(45),
	ponderacion int,
	valor varchar(45),
	primary key (ID)
);

create table PROYECTO(
	ID int auto_increment,
	descripcion varchar(50),
	costo int,
	primary key (ID)
);

create table CRITERIO_DE_PROYECTO(
	CID int,
	PID int,
	primary key (CID, PID),
	foreign key(CID) references CRITERIO(ID),
	foreign key(PID) references PROYECTO(ID)
);