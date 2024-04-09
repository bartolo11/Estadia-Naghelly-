drop database if exists estadia;
CREATE DATABASE estadia;
Use estadia;

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAdmin` varchar(45) NOT NULL,
  `apellidoPA` varchar(45) NOT NULL,
  `apellidoMA` varchar(45) DEFAULT NULL,
  `fechaNaciA` date NOT NULL,
  `generoA` varchar(5) NOT NULL,
  `correoA` varchar(45) NOT NULL,
  `contraseñaA` varchar(100) NOT NULL,
  PRIMARY KEY (`idAdministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO administrador VALUES
("1","Sandra","León","Sosa","1989-08-31","F","lsandra@upemor.edu.mx","SL12345*");




CREATE TABLE `asignar_material` (
  `idAsignarMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `nombreM` int(45) NOT NULL,
  `descripciónM` varchar(100) NOT NULL,
  `fechaCompartido` date NOT NULL,
  `estiloAprendizaje` varchar(35) NOT NULL,
  PRIMARY KEY (`idAsignarMaterial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `cuestionario` (
  `idcuestionario` int(11) NOT NULL,
  `cantPreguntas` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idcuestionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `encuesta_satisfacion` (
  `idEncuesta` int(11) NOT NULL AUTO_INCREMENT,
  `cant_preguntas` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  PRIMARY KEY (`idEncuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidoPaterno` varchar(45) NOT NULL,
  `apellidoMaterno` varchar(45) DEFAULT NULL,
  `fechaNaci` date NOT NULL,
  `genero` varchar(5) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  PRIMARY KEY (`idEstudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO estudiante VALUES
("1","Jose  ","Bartolo ","Flores","2000-08-31","M","joseFlores@upemor.edu.mx","BFJOSE"),
("2","Alberto","Garduño","Mora","2003-02-09","M","albertos@upemor.edu.mx","hola");




CREATE TABLE `material_didactico` (
  `idMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripción` varchar(100) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `materia_asosiada` varchar(45) NOT NULL,
  PRIMARY KEY (`idMaterial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `novedades` (
  `idnovedades` int(11) NOT NULL,
  `tituloNov` varchar(45) NOT NULL,
  `descripciónNov` varchar(45) NOT NULL,
  `fechaPub` date NOT NULL,
  `categoria_etiqueta` varchar(25) NOT NULL,
  PRIMARY KEY (`idnovedades`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `pregunta` (
  `idpreguntas` int(11) NOT NULL,
  `descripción_p` varchar(100) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  PRIMARY KEY (`idpreguntas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `generoP` varchar(5) NOT NULL,
  `correoP` varchar(45) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  PRIMARY KEY (`idProfesor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO profesor VALUES
("1","jose ","bartolo","","1998-11-18","M","baf@gmail.com","123456B*"),
("4","Jose Alberto","Martinez","Galicia","1980-12-12","M","jose@gmail.com","JM12345*");




CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL,
  `nivel_satisfaccion` int(11) NOT NULL,
  PRIMARY KEY (`idRespuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `test` (
  `idTest` int(11) NOT NULL,
  `puntaje_Total` int(11) NOT NULL,
  PRIMARY KEY (`idTest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




