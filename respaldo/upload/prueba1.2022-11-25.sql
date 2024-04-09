drop database if exists prueba1;
CREATE DATABASE prueba1;
Use prueba1;

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `NombreA` varchar(45) NOT NULL,
  `ApellidoPA` varchar(45) NOT NULL,
  `ApellidoMA` varchar(45) NOT NULL,
  `FeNacA` date NOT NULL,
  `CedulaA` varchar(15) NOT NULL,
  `contraseñaA` varchar(15) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


INSERT INTO administrador VALUES
("1","jose","bartolo","flores","1998-11-18","prueba","*1998"),
("2","nay","garcia","","2022-11-18","nani","nani"),
("3","Alan ","Brito","","1997-02-04","201205","2001"),
("4","jose","Bartolo","Flores","1998-11-18","161616","2005");




CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `FechaCita` date NOT NULL,
  `Costo` float NOT NULL,
  `Diagnostico` varchar(200) NOT NULL,
  `CedulaD` varchar(15) NOT NULL,
  `Nsspac` varchar(10) NOT NULL,
  PRIMARY KEY (`idCita`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


INSERT INTO cita VALUES
("1","2022-11-29","200","Dolor constante y aumenta repentinamente, aunque lleve tratamiento","1625","1230984133");




CREATE TABLE `doctor` (
  `idDoctor` int(11) NOT NULL AUTO_INCREMENT,
  `NombreD` varchar(45) NOT NULL,
  `ApellidoPD` varchar(45) NOT NULL,
  `ApellidoMD` varchar(45) NOT NULL,
  `FeNacD` date NOT NULL,
  `CedulaD` varchar(45) NOT NULL,
  `ContraseñaD` varchar(15) NOT NULL,
  PRIMARY KEY (`idDoctor`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;


INSERT INTO doctor VALUES
("1","naye","garcia","flores ","2022-10-05","nani","1998"),
("2","alberto ","garcia","flores ","2022-11-03","1215","1999"),
("3","jose","Bartolo","Flores","2001-01-03","1625","2005");




CREATE TABLE `enfermera` (
  `idEnfermera` int(11) NOT NULL AUTO_INCREMENT,
  `NombreE` varchar(45) NOT NULL,
  `ApellidoPE` varchar(45) NOT NULL,
  `ApellidoME` varchar(45) NOT NULL,
  `FeNacE` date NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Contraseña` varchar(15) NOT NULL,
  PRIMARY KEY (`idEnfermera`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;


INSERT INTO enfermera VALUES
("1","nay","garcia","flores ","2022-10-07","nani","1515"),
("2","jose","garduño","Flores","2022-09-29","201205","2000");




CREATE TABLE `familiar` (
  `idFamiliar` int(11) NOT NULL AUTO_INCREMENT,
  `NombreF` varchar(15) NOT NULL,
  `ApellidoPF` varchar(15) NOT NULL,
  `ApellidoMF` varchar(15) NOT NULL,
  `FeNacF` date NOT NULL,
  `parentesco` varchar(25) NOT NULL,
  `NssP` varchar(10) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  PRIMARY KEY (`idFamiliar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


INSERT INTO familiar VALUES
("1","rodrigo","lopez","perez","1992-11-04","cuñada ","1230984133","7351252842"),
("2","jose","bartolo","","1998-11-18","hermano","2000445233","7351909488");




CREATE TABLE `medicamento` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `NombreM` varchar(45) NOT NULL,
  `periodo` varchar(45) NOT NULL,
  `NSS` varchar(45) NOT NULL,
  PRIMARY KEY (`idMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


INSERT INTO medicamento VALUES
("1","loratadina compuesta ","8 horas","20004452903"),
("2","aspirina","2 horas","516516516"),
("3","Amoxicilina","6 horas","20564052903");




CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `NombreP` varchar(45) NOT NULL,
  `ApellidoPP` varchar(45) NOT NULL,
  `ApellidoMP` varchar(45) NOT NULL,
  `FeNacP` date NOT NULL,
  `FeIng` date NOT NULL,
  `NSS` varchar(10) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Altura` int(11) NOT NULL,
  `Alergias` varchar(100) NOT NULL,
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


INSERT INTO paciente VALUES
("1","Alejandro Rafael","Garcia","Rojas","2002-06-13","2022-06-14","1230984133","88","172","Polen, Abejas, Polvo"),
("2","pepe","nava ","pancreasia","2022-08-02","2022-09-15","2000445233","70","170","penisilina");


