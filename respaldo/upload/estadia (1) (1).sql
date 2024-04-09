
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `idcuestionario` int(11) NOT NULL,
  `cantPreguntas` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_satisfacion`
--

CREATE TABLE `encuesta_satisfacion` (
  `idEncuesta` int(11) NOT NULL,
  `cant_preguntas` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

CREATE TABLE `opcion` (
  `idop` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `descripción_op` varchar(180) NOT NULL,
  `categoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `opcion`
--

INSERT INTO `opcion` (`idop`, `idPregunta`, `descripción_op`, `categoria`) VALUES
(1, 1, 'Examen escrito', 'Visual'),
(2, 1, 'Examen oral', 'Auditivo'),
(3, 1, 'Examen de opción múltiple', 'Kinestésico'),
(4, 2, 'Memorizo lo que veo y recuerdo la imagen (por ejemplo, la página del libro)', 'Visual'),
(5, 2, 'Memorizo mejor si repito lo estudiado rítmicamente y recuerdo paso a paso', 'Auditivo'),
(6, 2, 'Memorizo a base de pasear y mirar, y recuerdo una idea general mejor que los detalles', 'Kinestésico'),
(7, 3, 'Leyendo el libro o la pizarra.', 'Visual'),
(8, 3, 'Escuchando al profesor.', 'Auditivo'),
(9, 3, 'Me aburro y espero a que me den algo para hacer.', 'Kinestésico'),
(10, 4, 'Mis cuadernos y libretas están ordenados y bien presentados, me molestan los tachones y las correcciones.', 'Visual'),
(11, 4, 'Prefiero escuchar chistes que leer cómics.', 'Auditivo'),
(12, 4, 'Me gusta tocar las cosas y tiendo a acercarme mucho a la gente cuando hablo con alguien.', 'Kinestésico'),
(13, 5, 'Ver películas.', 'Visual'),
(14, 5, 'Escuchar música.', 'Auditivo'),
(15, 5, 'Bailar.', 'Kinestésico'),
(16, 6, 'Escribiéndolo varias veces.', 'Visual'),
(17, 6, 'Repitiendo en voz alta.', 'Auditivo'),
(18, 6, 'Relacionándolo con algo, a poder ser divertido.', 'Kinestésico'),
(19, 7, 'Las busco mirando.', 'Visual'),
(20, 7, 'Sacudo la bolsa para oír el ruido.', 'Auditivo'),
(21, 7, 'Las busco con la mano, pero sin mirar.', 'Kinestésico'),
(22, 8, 'Me cuesta recordar las instrucciones orales, pero no hay problema si me las dan por escrito.', 'Visual'),
(23, 8, 'Recuerdo con facilidad las palabras exactas de lo que me han dicho.', 'Auditivo'),
(24, 8, 'Me pongo en movimiento antes de que acaben de hablar y explicar lo que hay que hacer.', 'Kinestésico'),
(25, 9, 'Uno con una hermosa vista al océano.', 'Visual'),
(26, 9, 'Uno en el que se escuchen las olas del mar.', 'Auditivo'),
(27, 9, 'Uno en el que se sienta un clima agradable.', 'Kinestésico'),
(28, 10, 'Editor de una revista.', 'Visual'),
(29, 10, 'Locutor de una emisora de radio.', 'Auditivo'),
(30, 10, 'Director de un club deportivo.', 'Kinestésico'),
(31, 11, 'A un espectáculo de magia.', 'Visual'),
(32, 11, 'A un concierto de música.', 'Auditivo'),
(33, 11, 'A una muestra gastronómica.', 'Kinestésico'),
(34, 12, 'Viajar y conocer el mundo.', 'Visual'),
(35, 12, 'Adquirir un estudio de grabación.', 'Auditivo'),
(36, 12, 'Comprar una casa.', 'Kinestésico'),
(37, 13, 'Me den el material escrito y con fotos, diagramas.', 'Visual'),
(38, 13, 'Se organicen debates y que haya diálogo.', 'Auditivo'),
(39, 13, 'Se organicen actividades en que los alumnos tengan que hacer cosas y puedan moverse.', 'Kinestésico'),
(40, 14, 'Intelectual.', 'Visual'),
(41, 14, 'Sociable.', 'Auditivo'),
(42, 14, 'Atlético.', 'Kinestésico'),
(43, 15, 'Algunos buenos libros.', 'Visual'),
(44, 15, 'Un radio portátil.', 'Auditivo'),
(45, 15, 'Golosinas y comida enlatada.', 'Kinestésico'),
(46, 16, 'El movimiento.', 'Visual'),
(47, 16, 'El ruido.', 'Auditivo'),
(48, 16, 'Las explicaciones demasiado largas.', 'Kinestésico'),
(49, 17, 'Noticias sobre el mundo y la actualidad.', 'Visual'),
(50, 17, 'Programas de entretenimiento.', 'Auditivo'),
(51, 17, 'Reportajes de descubrimientos y lugares.', 'Kinestésico'),
(52, 18, 'Ir al cine.', 'Visual'),
(53, 18, 'Ir a un concierto.', 'Auditivo'),
(54, 18, 'Quedarme en casa.', 'Kinestésico'),
(55, 19, 'Por su aspecto.', 'Visual'),
(56, 19, 'Por la sinceridad en su voz.', 'Auditivo'),
(57, 19, 'Por la forma de estrecharte la mano.', 'Kinestésico'),
(58, 20, 'Viendo algo juntos.', 'Visual'),
(59, 20, 'Conversando.', 'Auditivo'),
(60, 20, 'Paseando o haciendo deporte.', 'Kinestésico'),
(61, 21, 'Con gusto y conjuntada.', 'Visual'),
(62, 21, 'Informal.', 'Auditivo'),
(63, 21, 'Discreta pero correcta.', 'Kinestésico'),
(64, 22, 'Un gran pintor.', 'Visual'),
(65, 22, 'Un gran músico.', 'Auditivo'),
(66, 22, 'Un gran médico.', 'Kinestésico'),
(67, 23, 'Que esté limpia y ordenada.', 'Visual'),
(68, 23, 'Que sea silenciosa.', 'Auditivo'),
(69, 23, 'Que sea confortable.', 'Kinestésico'),
(70, 24, 'Conocer lugares nuevos.', 'Visual'),
(71, 24, 'Conocer personas y hacer nuevos amigos.', 'Auditivo'),
(72, 24, 'Aprender sobre otras costumbres.', 'Kinestésico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idpreguntas` int(11) NOT NULL,
  `descripción_p` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idpreguntas`, `descripción_p`) VALUES
(1, '¿Qué tipo de examen realizas con mayor facilidad?'),
(2, 'Cuando tienes que aprender algo de memoria…'),
(3, 'Cuando estás en clase y el profesor explica algo que está escrito en la pizarra o en tu libro, te es más fácil seguir las explicaciones…'),
(4, 'Marca la frase con las que te identifiques más.'),
(5, '¿Cuál de las siguientes actividades disfrutas más?'),
(6, '¿De qué manera te resulta más fácil aprender algo?'),
(7, 'Cuando no encuentras las llaves en una bolsa, ¿qué haces para encontrarlas más rápidamente?'),
(8, 'Cuando te dan instrucciones…'),
(9, '¿Cuál de estos ambientes te atrae más?'),
(10, 'Si te ofrecieran uno de los siguientes empleos, ¿cuál elegirías?'),
(11, '¿A qué tipo de evento preferirías asistir?'),
(12, 'Si tuvieras mucho dinero ahora mismo, ¿qué harías?'),
(13, 'En clase lo que más te gusta para aprender es que…'),
(14, 'Principalmente, ¿cómo te consideras?'),
(15, 'Si tuvieras que quedarte en una isla desierta, ¿qué preferirías llevar contigo?'),
(16, '¿Qué cosas te distraen más en clase?'),
(17, '¿Qué programas de televisión prefieres ver?'),
(18, '¿Qué prefieres hacer en tu tarde libre?'),
(19, '¿De qué manera te formas una opinión de otras personas?'),
(20, '¿Cómo prefieres pasar el tiempo con tu mejor amigo/a?'),
(21, '¿Cómo definirías tu forma de vestir?'),
(22, 'Si pudieras elegir ¿qué preferirías ser?'),
(23, '¿Qué es lo que más te gusta de una habitación?'),
(24, '¿Qué es lo que más te gusta de viajar?');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `idTest` int(11) NOT NULL,
  `puntaje_Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `idop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idpreguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
