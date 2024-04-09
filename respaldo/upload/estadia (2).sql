drop database if exists estadia;
CREATE DATABASE estadia;
Use estadia;

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `nombreAdmin` varchar(45) NOT NULL,
  `apellidoPA` varchar(45) NOT NULL,
  `apellidoMA` varchar(45) DEFAULT NULL,
  `fechaNaciA` date NOT NULL,
  `generoA` varchar(5) NOT NULL,
  `correoA` varchar(45) NOT NULL,
  `contraseñaA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `nombreAdmin`, `apellidoPA`, `apellidoMA`, `fechaNaciA`, `generoA`, `correoA`, `contraseñaA`) VALUES
(1, 'Sandra', 'León', 'Sosa', '1989-08-31', 'F', 'lsandra@upemor.edu.mx', 'SL12345*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_material`
--

CREATE TABLE `asignar_material` (
  `idAsignarMaterial` int(11) NOT NULL,
  `nombreM` int(45) NOT NULL,
  `descripciónM` varchar(100) NOT NULL,
  `fechaCompartido` date NOT NULL,
  `estiloAprendizaje` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `idcuestionario` int(11) NOT NULL,
  `cantPreguntas` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_satisfacion`
--

CREATE TABLE `encuesta_satisfacion` (
  `idEncuesta` int(11) NOT NULL,
  `cant_preguntas` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidoPaterno` varchar(45) NOT NULL,
  `apellidoMaterno` varchar(45) DEFAULT NULL,
  `fechaNaci` date NOT NULL,
  `genero` varchar(5) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `fechaNaci`, `genero`, `correo`, `contraseña`) VALUES
(1, 'Jose  ', 'Bartolo ', 'Flores', '2000-08-31', 'M', 'joseFlores@upemor.edu.mx', 'BFJOSE'),
(2, 'Alberto', 'Garduño', 'Mora', '2003-02-09', 'M', 'albertos@upemor.edu.mx', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_didactico`
--

CREATE TABLE `material_didactico` (
  `idMaterial` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripción` varchar(100) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `materia_asosiada` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `idnovedades` int(11) NOT NULL,
  `tituloNov` varchar(45) NOT NULL,
  `descripciónNov` varchar(45) NOT NULL,
  `fechaPub` date NOT NULL,
  `categoria_etiqueta` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

CREATE TABLE `opcion` (
  `idop` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `descripción_op` varchar(180) NOT NULL,
  `categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `opcion`
--

INSERT INTO `opcion` (`idop`, `idPregunta`, `descripción_op`, `categoria`) VALUES
(1, 1, 'jose ', 'visual'),
(2, 1, 'ara', 'auditivo'),
(3, 1, 'nani', 'kinestesico'),
(4, 2, 'san carlos ', 'visual'),
(5, 2, 'yautepec', 'auditivo'),
(6, 2, 'cuernavaca ', 'kinestesico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idpreguntas` int(11) NOT NULL,
  `descripción_p` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idpreguntas`, `descripción_p`) VALUES
(1, 'como te llamas'),
(2, 'donde vives ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `generoP` varchar(5) NOT NULL,
  `correoP` varchar(45) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `nombre`, `apellidoP`, `apellidoM`, `fechaNacimiento`, `generoP`, `correoP`, `contraseña`) VALUES
(1, 'jose ', 'bartolo', '', '1998-11-18', 'M', 'baf@gmail.com', '123456B*'),
(4, 'Jose Alberto', 'Martinez', 'Galicia', '1980-12-12', 'M', 'jose@gmail.com', 'JM12345*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL,
  `nivel_satisfaccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtest`
--

CREATE TABLE `rtest` (
  `idRtest` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `categoria` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rtest`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `idTest` int(11) NOT NULL,
  `puntaje_Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `asignar_material`
--
ALTER TABLE `asignar_material`
  ADD PRIMARY KEY (`idAsignarMaterial`);

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`idcuestionario`);

--
-- Indices de la tabla `encuesta_satisfacion`
--
ALTER TABLE `encuesta_satisfacion`
  ADD PRIMARY KEY (`idEncuesta`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`);

--
-- Indices de la tabla `material_didactico`
--
ALTER TABLE `material_didactico`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`idnovedades`);

--
-- Indices de la tabla `opcion`
--
ALTER TABLE `opcion`
  ADD PRIMARY KEY (`idop`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idpreguntas`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idRespuesta`);

--
-- Indices de la tabla `rtest`
--
ALTER TABLE `rtest`
  ADD PRIMARY KEY (`idRtest`);

--
-- Indices de la tabla `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`idTest`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asignar_material`
--
ALTER TABLE `asignar_material`
  MODIFY `idAsignarMaterial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `encuesta_satisfacion`
--
ALTER TABLE `encuesta_satisfacion`
  MODIFY `idEncuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material_didactico`
--
ALTER TABLE `material_didactico`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opcion`
--
ALTER TABLE `opcion`
  MODIFY `idop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idpreguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rtest`
--
ALTER TABLE `rtest`
  MODIFY `idRtest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
