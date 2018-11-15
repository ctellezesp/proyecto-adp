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

insert into CRITERIO(nombre, tipo, valor) values
	('Duracion (meses)','Cuantitativo', 'menor'),
	('VPN','Cuantitativo', 'mayor'),
	('Periodo de recuperacion','Cuantitativo', 'menor'),
	('Riesgo','Cualitativo', 'bajo'),
	('Generacion de tecnologia propietaria','Cualitativo', 'moderado');

create table PROYECTO(
	ID int auto_increment,
	descripcion varchar(50),
	costo int,
	nombre varchar(50),
	primary key (ID)
);

create table CRITERIO_DE_PROYECTO(
	CID int,
	PID int,
	valor int,
	primary key (CID, PID),
	foreign key(CID) references CRITERIO(ID),
	foreign key(PID) references PROYECTO(ID)
);

create table MATRIZ(
	id int auto_increment,
	pid int,
	cid int,
	valor int,
	primary key(ID),
	foreign key(CID) references CRITERIO(ID),
	foreign key(PID) references PROYECTO(ID)
);

