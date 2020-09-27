drop database if exists DBproyectocolegio;
create database DBproyectocolegio;
use DBproyectocolegio;


CREATE TABLE users (
  id int(11) AUTO_INCREMENT,
  name varchar(50) NULL,
  password varchar(255)  NULL,
  estado int(11)  NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (`id`, `name`, `password`, `estado`) VALUES (NULL, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1);

CREATE TABLE paises
(
	idpais               INT  AUTO_INCREMENT,
	pais                 VARCHAR(50) NOT NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idpais)
);


insert into paises values(null,'PERU','1');
insert into paises values(null,'BRAZIL','1');
insert into paises values(null,'ARGENTINA','1');
 
CREATE TABLE niveles
(
	idnivel              INT AUTO_INCREMENT ,
	nivel                VARCHAR(30) NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idnivel)
	
);

insert into niveles values(NULL,'PRIMARIA','1');
 
CREATE TABLE profesores
(
	idprofesor           INT AUTO_INCREMENT ,
	profesor             VARCHAR(50) NOT NULL,
	codigoprofesor       CHAR(18) NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idprofesor)
);

insert into profesores values(null,'SALAS PEREZ JOSE ','010101','1');
insert into profesores values(null,'SANCHEZ DIAZ JUAN ','020202','1');
insert into profesores values(null,'SALOMON CONTRERAS MANUEL ','030303','1');
insert into profesores values(null,'RODRIGUEZ PEREZ CARLOS ','040404','1');
insert into profesores values(null,'DIAZ SALAZAR PEDRO ','050505','1');
insert into profesores values(null,'GONZALES RODIGUEZ LUIS ','060606','1');

CREATE TABLE periodos
(
	idperiodo            INT AUTO_INCREMENT ,
	periodo              VARCHAR(50) NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idperiodo)
);


CREATE TABLE departamentos
(
	iddepartamento       INT AUTO_INCREMENT ,
	departamento         VARCHAR(50) NULL,
	idpais               INT NOT NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (iddepartamento),
	FOREIGN KEY (idpais) REFERENCES paises(idpais)
);

insert into departamentos values(null,'LIBERTAD','1','1');
insert into departamentos values(null,'BRAZILIA','2','1');
insert into departamentos values(null,'ARGENT','3','1');
  
CREATE TABLE provincias
(
	iddepartamento       INT NOT NULL,
	idprovincia          INT AUTO_INCREMENT ,
	provincia            VARCHAR(50) NULL,
	estado               CHAR(1) NOT NULL,
PRIMARY KEY (idprovincia),
FOREIGN KEY (iddepartamento) REFERENCES departamentos(iddepartamento)
);


CREATE TABLE distritos
(
	idprovincia          INT NOT NULL,
	iddistrito           INT AUTO_INCREMENT ,
	distrito             VARCHAR(50) NULL,
	estado               CHAR(1) NOT NULL,
    PRIMARY KEY (iddistrito),
	FOREIGN KEY (idprovincia) REFERENCES provincias(idprovincia)
);


CREATE TABLE alumnos
(
	iddistrito           INT  NOT NULL,
	idalumno             INT AUTO_INCREMENT ,
	codigoalumno         CHAR(10) NOT NULL,
	dni                  CHAR(8) NOT NULL,
	apellidos            VARCHAR(50) NOT NULL,
	nombres              VARCHAR(50) NOT NULL,
	sexo                 VARCHAR(50) NOT NULL,
	fechanacimiento      DATE NOT NULL,
	lenguamaterna        VARCHAR(50) NOT NULL,
	estadocivil          VARCHAR(50) NULL,
	religion             VARCHAR(50) NULL,
	colegioprocedencia   VARCHAR(50) NOT NULL,
	direccion            VARCHAR(50) NOT NULL,
	telefono             char(9) NULL,
	mediotransporte      VARCHAR(50) NOT NULL,
	tiempodemora         INT NOT NULL,
	materialdomicilio    VARCHAR(30) NULL,
	energiaelectrica     VARCHAR(50) NULL,
	aguapotable          VARCHAR(50) NULL,
	desague              VARCHAR(50) NULL,
	sshh                 VARCHAR(50) NULL,
	numerohabitaciones   INT NULL,
	numerohabitantes     INT NULL,
	situacion            VARCHAR(50) NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idalumno),
	FOREIGN KEY (iddistrito) REFERENCES distritos(iddistrito)
);

  
CREATE TABLE grados
(
	idgrado              INT AUTO_INCREMENT ,
	grado                VARCHAR(30) NOT NULL,
	idnivel              INT NOT NULL,
	estado               CHAR(1) NOT NULL,
    PRIMARY KEY (idgrado),
    FOREIGN KEY (idnivel) REFERENCES niveles(idnivel)
);

insert into grados values(NULL,'PRIMERO','1','1');
insert into grados values(NULL,'SEGUNDO','1','1');
insert into grados values(NULL,'TERCERO','1','1');

CREATE TABLE secciones
(
	idseccion            INT AUTO_INCREMENT ,
	seccion              CHAR(1) NOT NULL,
	idgrado              INT NOT NULL,
	PRIMARY KEY (idseccion),
	FOREIGN KEY (idgrado) REFERENCES grados(idgrado)
);

CREATE TABLE cursos
(
	idgrado              INT NOT NULL,
	idcurso              INT AUTO_INCREMENT ,
	curso                VARCHAR(50) NOT NULL,
	codigocurso          CHAR(2) NOT NULL,
	estado				 CHAR(1) NOT NULL,
	PRIMARY KEY (idcurso),
	FOREIGN KEY (idgrado) REFERENCES grados(idgrado)
);

insert into cursos values('1',NULL,'MATEMATICA','MA','1');
insert into cursos values('1',NULL,'COMUNICACION','CO','1');
insert into cursos values('2',NULL,'MATEMATICA','MA','1');
insert into cursos values('2',NULL,'COMUNICACION','CO','1');
insert into cursos values('2',NULL,'CIENCIA Y AMBIENTE','CA','1');
insert into cursos values('3',NULL,'ARTE','AR','1');

CREATE TABLE capacidades
(
	idcurso              INT NOT NULL,
	idcapacidad          INT AUTO_INCREMENT ,
	capacidad            VARCHAR(50) NOT NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idcapacidad),
	FOREIGN KEY (idcurso) REFERENCES cursos(idcurso)
);

insert into capacidades values('1',NULL,'RAZONAMIENTO','1');
insert into capacidades values('1',NULL,'ANALISIS DE PROBLEMAS','1');
insert into capacidades values('1',NULL,'RESOLUCION DE PROBLEMAS','1');
insert into capacidades values('2',NULL,'COMPRENCION LECTORA','1');
insert into capacidades values('2',NULL,'ANALISIS DE TEXTOS','1');
insert into capacidades values('2',NULL,'CREACION DE TEXTOS','1');
insert into capacidades values('3',NULL,'RAZONAMIENTO','1');
insert into capacidades values('3',NULL,'ANALISIS DE PROBLEMAS','1');
insert into capacidades values('3',NULL,'RESOLUCION DE PROBLEMAS','1');
insert into capacidades values('4',NULL,'COMPRENCION LECTORA','1');
insert into capacidades values('4',NULL,'ANALISIS DE TEXTOS','1');
insert into capacidades values('4',NULL,'CREACION DE TEXTOS','1');
insert into capacidades values('5',NULL,'CUIDADO DEL AMBIENTE','1');
insert into capacidades values('5',NULL,'SOLUCIONES PARA EL AMBIENTE','1');
insert into capacidades values('5',NULL,'COMPROMISO CON EL AMBIENTE','1');
insert into capacidades values('6',NULL,'DESARROLLO DE HABILIDADES ARTISTICAS','1');
insert into capacidades values('6',NULL,'APRECIAXION DEL ARTE','1');
insert into capacidades values('6',NULL,'COMPROMISO CON EL ARTE','1');

CREATE TABLE matriculas
(
	idalumno             INT NOT NULL,
	idperiodo            INT NOT NULL,
	idmatricula          INT AUTO_INCREMENT ,
	fecha                DATE NOT NULL,
	idseccion            INT NOT NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idmatricula),
	FOREIGN KEY (idalumno) REFERENCES alumnos(idalumno),
	FOREIGN KEY (idperiodo) REFERENCES periodos(idperiodo),
	FOREIGN KEY (idseccion) REFERENCES secciones(idseccion)
);

insert into matriculas values('1','4',null,'2020/02/15','1','1');
insert into matriculas values('2','4',null,'2020/02/20','3','1');
insert into matriculas values('3','4',null,'2020/02/24','1','1');

CREATE TABLE detalle_catedra
(
	idcurso              INT NOT NULL,
	idprofesor           INT NOT NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idcurso,idprofesor),
	FOREIGN KEY (idcurso) REFERENCES cursos(idcurso),
    FOREIGN KEY (idprofesor) REFERENCES profesores(idprofesor)
);
 
insert into detalle_catedra values('1','1','1');
insert into detalle_catedra values('2','2','1');
insert into detalle_catedra values('3','3','1');
insert into detalle_catedra values('4','4','1');
insert into detalle_catedra values('5','5','1');
insert into detalle_catedra values('6','6','1');


CREATE TABLE notas
(
	idmatricula          INT NOT NULL,
	idcapacidad          INT NOT NULL,
	idnota               INT AUTO_INCREMENT ,
	nota1                FLOAT NOT NULL,
	nota2                FLOAT NOT NULL,
	nota3                FLOAT NOT NULL,
	promedio             INT NOT NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idnota),
	FOREIGN KEY (idmatricula) REFERENCES matriculas(idmatricula),
	FOREIGN KEY (idcapacidad) REFERENCES capacidades(idcapacidad)
);
 
 insert into notas values( '1','1',null,14,16,13,14,'1');
 insert into notas values( '1','2',null,15,16,14,15,'1');
 insert into notas values( '1','3',null,12,16,15,14,'1');
 insert into notas values( '1','4',null,11,12,13,12,'1');
 insert into notas values( '1','5',null,12,13,14,13,'1');
 insert into notas values( '1','6',null,10,11,12,11,'1');
 insert into notas values( '1','7',null,09,10,13,11,'1');
 insert into notas values( '1','8',null,14,08,13,12,'1');
 insert into notas values( '1','9',null,15,16,05,12,'1');
 insert into notas values( '1','10',null,14,16,13,14,'1');
 insert into notas values( '1','11',null,15,16,14,15,'1');
 insert into notas values( '1','12',null,12,16,15,14,'1');
 insert into notas values( '1','13',null,11,12,13,12,'1');
 insert into notas values( '1','14',null,12,13,14,13,'1');
 insert into notas values( '1','15',null,10,11,12,11,'1');
 insert into notas values( '1','16'null,09,10,13,11,'1');
 insert into notas values( '1','17',null,14,08,13,12,'1');
 insert into notas values( '1','18',null,15,16,05,12,'1');
