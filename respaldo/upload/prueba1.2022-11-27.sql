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
("1","Alejandro","Garcia","Rojas","1998-11-18","12340","12345"),
("2","Mariana","Escamilla","Alvares","1998-12-18","56780","54MEA"),
("3","Carolina","Castro","Romero","1988-04-28","98760","78CCR"),
("4","Juan","Nuñez","Potenciano","1997-02-15","54320","89JNP"),
("5","Cesar","Santos","Villegas","1997-02-15","54320","15CSV");




CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `FechaCita` date NOT NULL,
  `Costo` float NOT NULL,
  `Diagnostico` varchar(200) NOT NULL,
  `CedulaD` varchar(15) NOT NULL,
  `Nsspac` varchar(10) NOT NULL,
  PRIMARY KEY (`idCita`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


INSERT INTO cita VALUES
("1","2020-03-15","400","Alergias y dolores en el higado","159005","7002453567"),
("2","2021-10-26","250","Infección en higadograso","269235","9308453462"),
("3","2020-11-07","100","Quiste en el intestino","797410","2002453364"),
("4","2021-04-28","550","Insuficiencia renal crónica","289015","7056953569"),
("5","2021-03-19","600","Enfermedad pulmonar obstructiva crónica","159455","1042483560");




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
("1","Lucia","Rosas","Juárez","1990-03-15","159005","LR03"),
("2","Jessica","Ferreira","Garcia","1992-10-26","269235","JF10"),
("3","Antonio","Ramires","Lopéz","1997-11-07","797410","AR11"),
("4","Carlos","Palacios","Contreras","1989-04-28","289015","CP04"),
("5","Matias","Molina","Pastor","1998-03-19","159455","MM03");




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
("1","Laura","Torres","Juárez","1991-08-25","250005","LT08"),
("2","Ximena","Hernández","Montes","1989-11-26","269123","XH11"),
("3","Camilo","Lima","Ramos","1997-05-03","322110","CL05"),
("4","Emilio","Galicia","Contreras","1999-07-30","211005","EG07"),
("5","Merida","Lopéz","Méndez","1998-08-20","209555","ML08");




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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


INSERT INTO familiar VALUES
("1","Guadaupe","Solano","Fernandez","1981-09-12","Hermana","7002453567","7774523450"),
("2","Roberto","Benites","Polanco","1977-12-16","Padre","9308453462","7345609871"),
("3","Ambar","Gutierrez","Colin","1992-10-04","Prima","2002453364","7356696292"),
("4","Mariano","Sanchéz","Castro","1975-04-20","Padre","7056953569","7757782713"),
("5","Marcos","Torres","Zapata","1996-06-16","Hermano","1042483560","7348869134");




CREATE TABLE `medicamento` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `NombreM` varchar(45) NOT NULL,
  `periodo` varchar(45) NOT NULL,
  `NSS` varchar(45) NOT NULL,
  PRIMARY KEY (`idMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


INSERT INTO medicamento VALUES
("1","Metaforfina","8 hrs","7002453567"),
("2","aspirina","6 hrs","9308453462"),
("3","Amoxicilina","12 hrs","2002453364"),
("4","aspirina","6 hrs","7056953569"),
("5","aspirina","10 hrs","1042483560");




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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


INSERT INTO paciente VALUES
("1","Javier","Solano","Fernandez","1988-07-03","2020-03-23","2700245356","63","152","Epitelios de animales"),
("2","Samantha","Benites","Rivas","1990-11-07","2021-01-05","9308453462","67","154","Polen"),
("3","Fabiola","Colin","Barrera","1982-01-10","2020-02-01","2002453364","68","156","Ninguna"),
("4","Israel","Sanchéz","Posadas","1977-08-09","2021-06-19","7056953569","70","158","Ninguna"),
("5","Omar","Torres","Zapata","1983-12-15","2020-07-19","1042483560","72","162","Latex");


