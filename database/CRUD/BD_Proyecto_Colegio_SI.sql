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


CREATE TABLE niveles
(
	idnivel              INT AUTO_INCREMENT,
	nivel                VARCHAR(30) NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idnivel)
	
);

INSERT niveles VALUES(null,'INCIAL','1');
INSERT niveles VALUES(null,'PRIMARIA','1');
INSERT niveles VALUES(null,'SECUNDARIA','1');


 
CREATE TABLE profesores
(
	idprofesor           INT AUTO_INCREMENT ,
	profesor             VARCHAR(50) NOT NULL,
	codigoprofesor       CHAR(18) NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idprofesor)
);

CREATE TABLE periodos
(
	idperiodo            INT AUTO_INCREMENT ,
	periodo              VARCHAR(50) NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idperiodo)
);

insert periodos values(null,'2017',1);
insert periodos values(null,'2018',1);
insert periodos values(null,'2019',1);
insert periodos values(null,'2020',1);


CREATE TABLE departamentos
(
	iddepartamento       INT AUTO_INCREMENT ,
	departamento         VARCHAR(50) NULL,
	idpais               INT NOT NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (iddepartamento),
	FOREIGN KEY (idpais) REFERENCES paises(idpais)
);


  
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

INSERT  grados VALUES(null,'PRIMER INICIAL',1,1);
INSERT  grados VALUES(null,'SEGUNDO INICIAL',1,1);
INSERT  grados VALUES(null,'TERCER INICIAL',1,1);
INSERT  grados VALUES(null,'CUARTO INICIAL',1,1);
INSERT  grados VALUES(null,'QUITNO INICIAL',1,1);


INSERT  grados VALUES(null,'PRIMERO DE PRIMARIA',2,1);
INSERT  grados VALUES(null,'SEGUNDO DE PRIMARIA',2,1);
INSERT  grados VALUES(null,'TERCERO DE PRIMARIA',2,1);
INSERT  grados VALUES(null,'CUARTO DE PRIMARIA',2,1);

INSERT  grados VALUES(null,'3 AÑOS',3,1);
INSERT  grados VALUES(null,'4 AÑOS',3,1);
INSERT  grados VALUES(null,'5 AÑOS',3,1);


CREATE TABLE secciones
(
	idseccion            INT AUTO_INCREMENT ,
	seccion              CHAR(1) NOT NULL,
	estado               CHAR(1) NOT NULL,
	idgrado              INT NOT NULL,
	PRIMARY KEY (idseccion),
	FOREIGN KEY (idgrado) REFERENCES grados(idgrado)
);

INSERT  secciones VALUES(null,'A',1,1);
INSERT  secciones VALUES(null,'B',1,1);
INSERT  secciones VALUES(null,'C',1,2);
INSERT  secciones VALUES(null,'D',1,2);
INSERT  secciones VALUES(null,'E',1,3);
INSERT  secciones VALUES(null,'F',1,3);
INSERT  secciones VALUES(null,'C',1,4);
INSERT  secciones VALUES(null,'D',1,4);
INSERT  secciones VALUES(null,'A',1,5);
INSERT  secciones VALUES(null,'D',1,5);

INSERT  secciones VALUES(null,'D',1,6);
INSERT  secciones VALUES(null,'A',1,6);
INSERT  secciones VALUES(null,'C',1,7);
INSERT  secciones VALUES(null,'D',1,7);
INSERT  secciones VALUES(null,'F',1,8);
INSERT  secciones VALUES(null,'E',1,8);
INSERT  secciones VALUES(null,'B',1,9);
INSERT  secciones VALUES(null,'A',1,9);

INSERT  secciones VALUES(null,'D',1,10);
INSERT  secciones VALUES(null,'E',1,11);
INSERT  secciones VALUES(null,'F',1,12);


CREATE TABLE cursos
(
	idgrado              INT NOT NULL,
	idcurso              INT AUTO_INCREMENT ,
	curso                VARCHAR(50) NOT NULL,
	estado               CHAR(1) NOT NULL,
	codigocurso          CHAR(2) NOT NULL,
	PRIMARY KEY (idcurso),
	FOREIGN KEY (idgrado) REFERENCES grados(idgrado)
);

CREATE TABLE capacidades
(
	idcurso              INT NOT NULL,
	idcapacidad          INT AUTO_INCREMENT ,
	capacidad            VARCHAR(50) NOT NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idcapacidad),
	FOREIGN KEY (idcurso) REFERENCES cursos(idcurso)
);


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

 
CREATE TABLE detalle_catedra
(
	idcurso              INT NOT NULL,
	idprofesor           INT NOT NULL,
	PRIMARY KEY (idcurso,idprofesor),
	FOREIGN KEY (idcurso) REFERENCES cursos(idcurso),
    FOREIGN KEY (idprofesor) REFERENCES profesores(idprofesor)
);
 
CREATE TABLE notas
(
	idmatricula          INT NOT NULL,
	idcapacidad          INT NOT NULL,
	idnota               INT AUTO_INCREMENT,
	nota1                FLOAT NOT NULL,
	nota2                FLOAT NOT NULL,
	nota3                FLOAT NOT NULL,
	promedio             INT NOT NULL,
	estado               CHAR(1) NOT NULL,
	PRIMARY KEY (idnota),
	FOREIGN KEY (idmatricula) REFERENCES matriculas(idmatricula),
	FOREIGN KEY (idcapacidad) REFERENCES capacidades(idcapacidad)
);
 
 
