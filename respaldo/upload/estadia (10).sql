drop database if exists estadia;
CREATE DATABASE estadia;
Use estadia;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2024 a las 08:26:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estadia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

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
(1, 'Sandra', 'León', 'Sosa', '1989-08-31', 'F', 'rojas.naghelly@gmail.com', 'dd9835fd9f9764d48ea5bbeb47b83b65');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_material`
--

CREATE TABLE `asignar_material` (
  `idAsignarMaterial` int(11) NOT NULL,
  `nombreM` varchar(120) NOT NULL,
  `descripciónM` varchar(100) NOT NULL,
  `estiloAprendizaje` varchar(35) NOT NULL,
  `idMaterial` int(11) NOT NULL,
  `idEst` int(11) NOT NULL,
  `materiaA` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignar_material`
--

INSERT INTO `asignar_material` (`idAsignarMaterial`, `nombreM`, `descripciónM`, `estiloAprendizaje`, `idMaterial`, `idEst`, `materiaA`) VALUES
(4, 'Configure-basic-router-settings - -physical-mode_es-XL.docx', 'Guía de comandos para router', 'visual', 1, 1, 'Interconexión de Redes'),
(5, 'EP4-Juicio Crítico.pdf', 'Ejercicios de ejemplo', 'visual', 3, 1, 'Habilidades Gerenciales');

--
-- Disparadores `asignar_material`
--

CREATE TRIGGER `tr_asignar_material_insert` AFTER INSERT ON `asignar_material` FOR EACH ROW BEGIN
    DECLARE v_nombre VARCHAR(120);
    DECLARE v_idUsuario INT;
    
    -- Obtener el nombre de la categoría y el idUsuario
    SELECT NEW.categoria, NEW.idUsuario INTO v_nombre, v_idUsuario;
    
    -- Insertar un nuevo registro en la tabla notificaciones
    INSERT INTO notificaciones (descripcion, nombre, idEst, estado)
    VALUES ('Se registraron sus resultados, su estilo es', v_nombre, v_idUsuario, 'sin revisar');
END



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `idEncuesta` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`idEncuesta`, `descripcion`) VALUES
(1, '¿Comó te sentiste utilizando el sistema?'),
(2, 'Califica tu satisfacción respecto a nuestro material educativo compartido'),
(3, '¿Comó te sientes al respecto de tus resultados en el test de estilo de aprendizaje?'),
(4, 'Consideras adecuado el uso de colores en la interfaz grafica');

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
  `contraseña` varchar(100) NOT NULL,
  `grupo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `fechaNaci`, `genero`, `correo`, `contraseña`, `grupo`) VALUES
(1, 'Esteban', 'Garcia', 'Molina', '1998-08-31', 'M', 'estebanG@gmail.com', '8d21b1d7ca20a946473d3e07f3f2dad9', 'a'),
(2, 'Diana', 'Arellano', 'Arellanes', '2002-09-01', 'F', 'dianaA@gmail.com', 'f752e3652f81c8ad93c421f2d94e2ed7', 'a'),
(3, 'Paola', 'Herrera', '', '2002-05-03', 'F', 'paolaH@gmail.com', '56793dc467047cd8a675788303d1a6d5', 'a'),
(4, 'Carmen', 'Santos', 'Villegas', '1998-03-02', 'F', 'carmenS@gmail.com', '34e782da3e5681c139c51bce54782e94', 'a'),
(5, 'Julio', 'Batida ', 'Toledano', '2002-07-14', 'M', 'julioB@gmail.com', 'cf936f610d3006a1367db5f5d5d3920a', 'a'),
(6, 'Juan', 'Pantoja', 'Coria', '2002-09-05', 'M', 'juanP@gmail.com', 'af7f662ddae9e3e46cf240d91d3cedca', 'a'),
(7, 'Carlos', 'Mendez', 'Torres', '2007-09-23', 'M', 'carlosM@gmail.com', '4882c9bb624dcdda26cebc8a1b2d62c0', 'a'),
(8, 'Alberto', 'Toledo', 'Rosas', '1998-02-01', 'M', 'albertoT@gmail.com', '974f58dc1296081820923ba376023b48', 'b'),
(9, 'Cesar', 'Cardoso', 'Pineda', '2000-09-12', 'M', 'cesarC@gmail.com', '4545d4f33dacfb21a52a339344c5f60c', 'b'),
(10, 'Jocelyn', 'Flores', 'Martinéz', '2000-09-13', 'F', 'jocelynF@gmail.com', 'e974397315a783d6d89f2c6e23873798', 'b'),
(11, 'Mariana', 'Ramos', 'Juárez', '2000-09-14', 'F', 'marianaR@gmail.com', 'f638f4f984414cfab28b065bf818ba93', 'b'),
(12, 'Ketzal', 'Galicia', 'Mejía', '2000-09-15', 'F', 'ketzalG@gmail.com', 'f5d07470b735f86c18f93465db3a6936', 'b'),
(13, 'Fernanda', 'Colin', 'Rojas', '2000-09-20', 'F', 'fernandaC@gmail.com', 'b9f4477ef296ef5d41b690d3a9f80053', 'c'),
(14, 'Javier', 'Solano', 'Mejía', '2000-09-21', 'M', 'javierS@gmail.com', 'df0f6a5fcd0b109d238cea8210a4531d', 'c'),
(15, 'Rafael', 'Arellano', 'Castilla', '2000-09-22', 'M', 'rafaelA@gmail.com', '2233932658120156bf2734bdbb580d5a', 'c'),
(16, 'Pablo', 'Camacho', 'Zalazar', '2000-09-23', 'M', 'pabloC@gmail.com', 'c829dc887a24d9f0274912a7dc7b8d59', 'c'),
(17, 'Pedro', 'Beltrán', '', '2000-09-24', 'M', 'pedroB@gmail.com', 'cc6b1cbc51ade132201ee7eca16ed545', 'c'),
(18, 'Carla', 'Galicia', 'Villa', '2000-10-04', 'F', 'carlaG@gmail.com', '42e6145a5ecb66069fd07ed4e4b0b768', 'd'),
(19, 'Yesenia', 'Pastor', 'Villa', '2000-10-05', 'F', 'yeseniaP@gmail.com', '805f67e197b6dd865912caff7a00ca96', 'd'),
(20, 'Michelle', 'Coria', 'Colin', '2000-10-06', 'F', 'michelleC@gmail.com', 'd47bed5e89c7b7cd047e72fcd773cc9b', 'd'),
(21, 'Citlali', 'Hernández', 'Garcia', '2000-10-07', 'F', 'citlaliH@gmail.com', '2eb4b87dff181ff1201051676daba379', 'd'),
(22, 'Araceli', 'Blaz', '', '2000-10-08', 'F', 'araceliB@gmail.com', '409acd50b459e2ebe0c8e2529602c916', 'd'),
(23, 'Jonathan', 'Cruz', '', '2000-10-11', 'M', 'jonathanC@gmail.com', '9572796c647fbf748cb845a978e61e55', 'e'),
(24, 'Abril', 'Pacheco', 'Ayala', '2000-10-12', 'F', 'abrilP@gmail.com', 'ebb1477b9deee24883d48fc2ab6f60db', 'e'),
(25, 'Camila', 'Lesso', 'Campusano', '2000-10-13', 'F', 'camilaL@gmail.com', '2dc46f56112b89558bb2c40825f632e1', 'e'),
(26, 'Valentín ', 'Rojas', 'Mendoza', '2000-10-14', 'M', 'valentinR@gmail.com', '4c6f9e8e76bd45cfd21528d9987c6610', 'e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_didactico`
--

CREATE TABLE `material_didactico` (
  `idMaterial` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descripción` varchar(100) NOT NULL,
  `fechaPublicacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `materia_asosiada` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material_didactico`
--

INSERT INTO `material_didactico` (`idMaterial`, `tipo`, `titulo`, `descripción`, `fechaPublicacion`, `materia_asosiada`, `categoria`) VALUES
(1, 'doc', 'Configure-basic-router-settings - -physical-mode_es-XL.docx', 'Guía de comandos para router', '2024-04-05 13:03:50', 'Interconexión de Redes', 'visual'),
(2, 'pptx', 'Mantenimiento y redes de computadoras.pptx', 'Material de apoyo', '2024-04-05 13:05:14', 'Interconexión de Redes', 'kinestesico'),
(3, 'pdf', 'EP4-Juicio Crítico.pdf', 'Ejercicios de ejemplo', '2024-04-05 13:06:08', 'Habilidades Gerenciales', 'visual'),
(4, 'pdf', 'Equidad de género_EP4.pdf', 'Ejemplo de reporte ', '2024-04-05 13:07:21', 'Habilidades Gerenciales', 'visual'),
(5, 'pdf', 'Métodos de organización de la información_ fichas de trabajo. EP4.pdf', 'Guía para fichas de trabajo ', '2024-04-05 13:08:29', 'Matemáticas para Ingeniería II', 'visual'),
(6, 'doc', 'Implement-a-small-network_es-XL.docx', 'Ejercicio práctico ', '2024-04-05 13:09:23', 'Administración de Base de Datos', 'kinestesico'),
(7, 'doc', 'Sistemas operativos.docx', 'Reporte sobre los sistemas operativos ', '2024-04-05 13:10:02', 'Sistemas Operativos', 'visual'),
(8, 'pptx', 'Presentacion de proyecto.pptx', 'Ejemplo del diseño de una presentacion', '2024-04-05 13:12:02', 'Administración de Base de Datos', 'visual'),
(9, 'pptx', 'Técnicas de visualización.pptx', 'Actividad practica', '2024-04-05 13:12:49', 'Programación Orientada a Objetos', 'kinestesico'),
(10, 'link', 'https://youtu.be/fsuroRYmagw?si=wLq70Yh9lIBR3MQd', 'Funcionamiento de los sistemas operativos', '2024-04-05 13:14:10', 'Sistemas Operativos', 'auditivo'),
(11, 'link', 'https://youtu.be/vkSVsem1WDc?si=-tsR4Ii9OeAV8zGu', 'Que son las bases de datos ', '2024-04-05 13:14:48', 'Administración de Base de Datos', 'auditivo'),
(12, 'link', 'https://youtu.be/Eer7_NojC9Y?si=XVmokTU0jfFVHRe-', 'Algebra de funciones', '2024-04-05 13:15:22', 'Matemáticas para Ingeniería II', 'auditivo'),
(13, 'link', 'https://www.onlinegdb.com/', 'Compilador en linea', '2024-04-05 13:17:43', 'Programación Orientada a Objetos', 'kinestesico'),
(14, 'link', 'https://www.youtube.com/wa', 'Definición de los objetos en POO', '2024-04-05 13:18:55', 'Programación Orientada a Objetos', 'visual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `idNotificaciones` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `idEst` int(11) NOT NULL,
  `estado` varchar(11) NOT NULL,
  `idMaterial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`idNotificaciones`, `descripcion`, `nombre`, `idEst`, `estado`, `idMaterial`) VALUES
(1, 'Se registraron sus resultados, su estilo es', 'Visual', 1, 'revisado', NULL),
(2, 'Se registraron sus resultados, su estilo es', 'Visual', 2, 'revisado', NULL),
(3, 'Se registraron sus resultados, su estilo es', 'Kinestésico', 3, 'revisado', NULL),
(4, 'Se registraron sus resultados, su estilo es', 'Visual', 4, 'revisado', NULL),
(5, 'Se registraron sus resultados, su estilo es', 'Kinestésico', 5, 'sin revisar', NULL),
(6, 'Se registraron sus resultados, su estilo es', 'Visual', 6, 'sin revisar', NULL),
(7, 'Se registraron sus resultados, su estilo es', 'Kinestésico', 7, 'sin revisar', NULL),
(8, 'Se registraron sus resultados, su estilo es', 'Visual', 8, 'sin revisar', NULL),
(9, 'Se registraron sus resultados, su estilo es', 'Visual', 9, 'sin revisar', NULL),
(10, 'Se registraron sus resultados, su estilo es', 'Kinestésico', 10, 'sin revisar', NULL),
(11, 'Se registraron sus resultados, su estilo es', 'Visual', 11, 'sin revisar', NULL),
(12, 'Se registraron sus resultados, su estilo es', 'Auditivo', 12, 'sin revisar', NULL),
(13, 'Se registraron sus resultados, su estilo es', 'Visual', 13, 'sin revisar', NULL),
(14, 'Se registraron sus resultados, su estilo es', 'Auditivo', 14, 'sin revisar', NULL),
(15, 'Se registraron sus resultados, su estilo es', 'Auditivo', 15, 'sin revisar', NULL),
(16, 'Se registraron sus resultados, su estilo es', 'Visual', 16, 'sin revisar', NULL),
(17, 'Se registraron sus resultados, su estilo es', 'Kinestésico', 17, 'sin revisar', NULL),
(18, 'Se registraron sus resultados, su estilo es', 'Visual', 18, 'sin revisar', NULL),
(19, 'Se registraron sus resultados, su estilo es', 'Auditivo', 19, 'sin revisar', NULL),
(20, 'Se registraron sus resultados, su estilo es', 'Visual', 20, 'sin revisar', NULL),
(21, 'Se registraron sus resultados, su estilo es', 'Visual', 22, 'sin revisar', NULL),
(22, 'Se registraron sus resultados, su estilo es', 'Auditivo', 23, 'sin revisar', NULL),
(23, 'Se registraron sus resultados, su estilo es', 'Visual', 24, 'sin revisar', NULL),
(24, 'Se registraron sus resultados, su estilo es', 'Visual', 25, 'sin revisar', NULL),
(25, 'Se registraron sus resultados, su estilo es', 'Visual', 26, 'sin revisar', NULL),
(29, 'material nuevo compartido', 'Configure-basic-router-settings - -physical-mode_es-XL.docx', 1, 'revisado', 1),
(30, 'material nuevo compartido', 'EP4-Juicio Crítico.pdf', 1, 'revisado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `idnovedades` int(11) NOT NULL,
  `tituloNov` varchar(45) NOT NULL,
  `descripciónNov` varchar(100) NOT NULL,
  `fechaPub` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`idnovedades`, `tituloNov`, `descripciónNov`, `fechaPub`) VALUES
(1, 'Realiza test', 'Realiza tu test para identificar tu estilo de aprendizaje', '2024-04-02'),
(2, 'Nuevo Taller ', 'Taller de Excel básico para reforzar conocimientos', '2024-04-02'),
(3, 'Intercambio de libros', 'Acude a UD2', '2024-04-03');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `nombre`, `apellidoP`, `apellidoM`, `fechaNacimiento`, `generoP`, `correoP`, `contraseña`) VALUES
(1, 'Juan Paulo', 'Sánchez', 'Hernández', '1990-03-07', 'M', 'juanpauloS@gmail.com', 'df0f6a5fcd0b109d238cea8210a4531d'),
(2, 'Sandra Elizabeth', 'León ', 'Sosa', '1985-12-04', 'F', 'sandraL@gmail.com', 'ee995611322d41f705da6ac2fd1f68a4'),
(3, 'Lorenzo Antonio', 'Cardoso', 'Contreras', '1985-04-12', 'M', 'lorenzoC@gmail.com', '9cb91c6294f58bbad3331dc387b6eae6'),
(4, 'Sergio Alfredo', 'Goméz', 'Verona', '1980-07-15', 'M', 'sergioA@gmail.com', 'aba2c102f6f9bd6c04d0afc6f392453c'),
(5, 'Marilú', 'Servantes', 'Salgado', '1987-05-23', 'F', 'mariluS@gmail.com', 'a6b44460db262be7774496f648159e6e'),
(6, 'Daniel', 'Goméz', 'Tellez', '1974-04-27', 'M', 'danielG@gmail.com', '2709929e3edc7ab3d3823eaa388e2514'),
(7, 'Jose de Jesus', 'Bartolo', 'Flores', '1998-11-18', 'M', 'bfjo201205@upemor.edu.mx', 'cf936f610d3006a1367db5f5d5d3920a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL,
  `nivelS` varchar(25) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idRespuesta`, `nivelS`, `idUsuario`, `idPregunta`) VALUES
(1, 'Neutral', 1, 1),
(2, 'Muy satisfecho', 1, 2),
(3, 'Totalmente satisfecho', 1, 3),
(4, 'Totalmente satisfecho', 1, 4),
(5, 'Muy satisfecho', 2, 1),
(6, 'Muy satisfecho', 2, 2),
(7, 'Muy satisfecho', 2, 3),
(8, 'Muy satisfecho', 2, 4),
(9, 'Totalmente satisfecho', 3, 1),
(10, 'Totalmente satisfecho', 3, 2),
(11, 'Totalmente satisfecho', 3, 3),
(12, 'Totalmente satisfecho', 3, 4),
(13, 'Nada Satisfecho', 4, 1),
(14, 'Poco satisfecho', 4, 2),
(15, 'Poco satisfecho', 4, 3),
(16, 'Neutral', 4, 4),
(17, 'Poco satisfecho', 5, 1),
(18, 'Nada Satisfecho', 5, 2),
(19, 'Nada Satisfecho', 5, 3),
(20, 'Nada Satisfecho', 5, 4),
(21, 'Totalmente satisfecho', 6, 1),
(22, 'Poco satisfecho', 6, 2),
(23, 'Poco satisfecho', 6, 3),
(24, 'Poco satisfecho', 6, 4),
(25, 'Totalmente satisfecho', 7, 1),
(26, 'Poco satisfecho', 7, 2),
(27, 'Poco satisfecho', 7, 3),
(28, 'Neutral', 7, 4),
(29, 'Poco satisfecho', 8, 1),
(30, 'Neutral', 8, 2),
(31, 'Muy satisfecho', 8, 3),
(32, 'Totalmente satisfecho', 8, 4),
(33, 'Nada Satisfecho', 9, 1),
(34, 'Muy satisfecho', 9, 2),
(35, 'Poco satisfecho', 9, 3),
(36, 'Nada Satisfecho', 9, 4),
(37, 'Poco satisfecho', 10, 1),
(38, 'Poco satisfecho', 10, 2),
(39, 'Neutral', 10, 3),
(40, 'Neutral', 10, 4),
(41, 'Nada Satisfecho', 11, 1),
(42, 'Nada Satisfecho', 11, 2),
(43, 'Nada Satisfecho', 11, 3),
(44, 'Nada Satisfecho', 11, 4),
(45, 'Poco satisfecho', 12, 1),
(46, 'Poco satisfecho', 12, 2),
(47, 'Poco satisfecho', 12, 3),
(48, 'Poco satisfecho', 12, 4),
(49, 'Neutral', 13, 1),
(50, 'Neutral', 13, 2),
(51, 'Neutral', 13, 3),
(52, 'Neutral', 13, 4),
(53, 'Muy satisfecho', 14, 1),
(54, 'Muy satisfecho', 14, 2),
(55, 'Muy satisfecho', 14, 3),
(56, 'Muy satisfecho', 14, 4),
(57, 'Totalmente satisfecho', 15, 1),
(58, 'Totalmente satisfecho', 15, 2),
(59, 'Totalmente satisfecho', 15, 3),
(60, 'Totalmente satisfecho', 15, 4),
(61, 'Nada Satisfecho', 16, 1),
(62, 'Poco satisfecho', 16, 2),
(63, 'Totalmente satisfecho', 16, 3),
(64, 'Totalmente satisfecho', 16, 4),
(65, 'Totalmente satisfecho', 17, 1),
(66, 'Totalmente satisfecho', 17, 2),
(67, 'Totalmente satisfecho', 17, 3),
(68, 'Totalmente satisfecho', 17, 4),
(69, 'Totalmente satisfecho', 18, 1),
(70, 'Totalmente satisfecho', 18, 2),
(71, 'Totalmente satisfecho', 18, 3),
(72, 'Totalmente satisfecho', 18, 4),
(73, 'Totalmente satisfecho', 19, 1),
(74, 'Totalmente satisfecho', 19, 2),
(75, 'Totalmente satisfecho', 19, 3),
(76, 'Totalmente satisfecho', 19, 4),
(77, 'Totalmente satisfecho', 20, 1),
(78, 'Totalmente satisfecho', 20, 2),
(79, 'Totalmente satisfecho', 20, 3),
(80, 'Totalmente satisfecho', 20, 4),
(81, 'Totalmente satisfecho', 22, 1),
(82, 'Totalmente satisfecho', 22, 2),
(83, 'Totalmente satisfecho', 22, 3),
(84, 'Totalmente satisfecho', 22, 4),
(85, 'Muy satisfecho', 23, 1),
(86, 'Muy satisfecho', 23, 2),
(87, 'Muy satisfecho', 23, 3),
(88, 'Muy satisfecho', 23, 4),
(89, 'Totalmente satisfecho', 24, 1),
(90, 'Totalmente satisfecho', 24, 2),
(91, 'Totalmente satisfecho', 24, 3),
(92, 'Totalmente satisfecho', 24, 4),
(93, 'Totalmente satisfecho', 25, 1),
(94, 'Totalmente satisfecho', 25, 2),
(95, 'Totalmente satisfecho', 25, 3),
(96, 'Totalmente satisfecho', 25, 4),
(97, 'Totalmente satisfecho', 26, 1),
(98, 'Totalmente satisfecho', 26, 2),
(99, 'Totalmente satisfecho', 26, 3),
(100, 'Totalmente satisfecho', 26, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtest`
--

CREATE TABLE `rtest` (
  `idRtest` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `categoria` varchar(12) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `grupo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rtest`
--

INSERT INTO `rtest` (`idRtest`, `idUsuario`, `categoria`, `idPregunta`, `grupo`) VALUES
(1, 1, 'Visual', 1, 'a'),
(2, 1, 'Visual', 2, 'a'),
(3, 1, 'Visual', 3, 'a'),
(4, 1, 'Visual', 4, 'a'),
(5, 1, 'Visual', 5, 'a'),
(6, 1, 'Visual', 6, 'a'),
(7, 1, 'Visual', 7, 'a'),
(8, 1, 'Auditivo', 8, 'a'),
(9, 1, 'Visual', 9, 'a'),
(10, 1, 'Auditivo', 10, 'a'),
(11, 1, 'Visual', 11, 'a'),
(12, 1, 'Kinestésico', 12, 'a'),
(13, 1, 'Kinestésico', 13, 'a'),
(14, 1, 'Auditivo', 14, 'a'),
(15, 1, 'Kinestésico', 15, 'a'),
(16, 1, 'Kinestésico', 16, 'a'),
(17, 1, 'Kinestésico', 17, 'a'),
(18, 1, 'Visual', 18, 'a'),
(19, 1, 'Visual', 19, 'a'),
(20, 1, 'Visual', 20, 'a'),
(21, 1, 'Kinestésico', 21, 'a'),
(22, 1, 'Auditivo', 22, 'a'),
(23, 1, 'Visual', 23, 'a'),
(24, 1, 'Visual', 24, 'a'),
(25, 2, 'Visual', 1, 'a'),
(26, 2, 'Auditivo', 2, 'a'),
(27, 2, 'Visual', 3, 'a'),
(28, 2, 'Visual', 4, 'a'),
(29, 2, 'Visual', 5, 'a'),
(30, 2, 'Visual', 6, 'a'),
(31, 2, 'Visual', 7, 'a'),
(32, 2, 'Visual', 8, 'a'),
(33, 2, 'Visual', 9, 'a'),
(34, 2, 'Visual', 10, 'a'),
(35, 2, 'Visual', 11, 'a'),
(36, 2, 'Visual', 12, 'a'),
(37, 2, 'Auditivo', 13, 'a'),
(38, 2, 'Visual', 14, 'a'),
(39, 2, 'Auditivo', 15, 'a'),
(40, 2, 'Auditivo', 16, 'a'),
(41, 2, 'Kinestésico', 17, 'a'),
(42, 2, 'Visual', 18, 'a'),
(43, 2, 'Visual', 19, 'a'),
(44, 2, 'Kinestésico', 20, 'a'),
(45, 2, 'Kinestésico', 21, 'a'),
(46, 2, 'Visual', 22, 'a'),
(47, 2, 'Visual', 23, 'a'),
(48, 2, 'Kinestésico', 24, 'a'),
(49, 3, 'Auditivo', 1, 'a'),
(50, 3, 'Auditivo', 2, 'a'),
(51, 3, 'Auditivo', 3, 'a'),
(52, 3, 'Kinestésico', 4, 'a'),
(53, 3, 'Kinestésico', 5, 'a'),
(54, 3, 'Kinestésico', 6, 'a'),
(55, 3, 'Kinestésico', 7, 'a'),
(56, 3, 'Visual', 8, 'a'),
(57, 3, 'Visual', 9, 'a'),
(58, 3, 'Kinestésico', 10, 'a'),
(59, 3, 'Kinestésico', 11, 'a'),
(60, 3, 'Kinestésico', 12, 'a'),
(61, 3, 'Kinestésico', 13, 'a'),
(62, 3, 'Visual', 14, 'a'),
(63, 3, 'Auditivo', 15, 'a'),
(64, 3, 'Visual', 16, 'a'),
(65, 3, 'Visual', 17, 'a'),
(66, 3, 'Auditivo', 18, 'a'),
(67, 3, 'Visual', 19, 'a'),
(68, 3, 'Kinestésico', 20, 'a'),
(69, 3, 'Kinestésico', 21, 'a'),
(70, 3, 'Visual', 22, 'a'),
(71, 3, 'Kinestésico', 23, 'a'),
(72, 3, 'Auditivo', 24, 'a'),
(73, 4, 'Visual', 1, 'a'),
(74, 4, 'Visual', 2, 'a'),
(75, 4, 'Auditivo', 3, 'a'),
(76, 4, 'Visual', 4, 'a'),
(77, 4, 'Auditivo', 5, 'a'),
(78, 4, 'Visual', 6, 'a'),
(79, 4, 'Visual', 7, 'a'),
(80, 4, 'Visual', 8, 'a'),
(81, 4, 'Visual', 9, 'a'),
(82, 4, 'Auditivo', 10, 'a'),
(83, 4, 'Visual', 11, 'a'),
(84, 4, 'Kinestésico', 12, 'a'),
(85, 4, 'Kinestésico', 13, 'a'),
(86, 4, 'Auditivo', 14, 'a'),
(87, 4, 'Auditivo', 15, 'a'),
(88, 4, 'Kinestésico', 16, 'a'),
(89, 4, 'Kinestésico', 17, 'a'),
(90, 4, 'Kinestésico', 18, 'a'),
(91, 4, 'Kinestésico', 19, 'a'),
(92, 4, 'Auditivo', 20, 'a'),
(93, 4, 'Visual', 21, 'a'),
(94, 4, 'Visual', 22, 'a'),
(95, 4, 'Auditivo', 23, 'a'),
(96, 4, 'Kinestésico', 24, 'a'),
(97, 5, 'Visual', 1, 'a'),
(98, 5, 'Visual', 2, 'a'),
(99, 5, 'Auditivo', 3, 'a'),
(100, 5, 'Visual', 4, 'a'),
(101, 5, 'Auditivo', 5, 'a'),
(102, 5, 'Kinestésico', 6, 'a'),
(103, 5, 'Visual', 7, 'a'),
(104, 5, 'Visual', 8, 'a'),
(105, 5, 'Visual', 9, 'a'),
(106, 5, 'Auditivo', 10, 'a'),
(107, 5, 'Auditivo', 11, 'a'),
(108, 5, 'Kinestésico', 12, 'a'),
(109, 5, 'Auditivo', 13, 'a'),
(110, 5, 'Kinestésico', 14, 'a'),
(111, 5, 'Kinestésico', 15, 'a'),
(112, 5, 'Auditivo', 16, 'a'),
(113, 5, 'Kinestésico', 17, 'a'),
(114, 5, 'Kinestésico', 18, 'a'),
(115, 5, 'Kinestésico', 19, 'a'),
(116, 5, 'Visual', 20, 'a'),
(117, 5, 'Kinestésico', 21, 'a'),
(118, 5, 'Kinestésico', 22, 'a'),
(119, 5, 'Visual', 23, 'a'),
(120, 5, 'Kinestésico', 24, 'a'),
(121, 6, 'Visual', 1, 'a'),
(122, 6, 'Visual', 2, 'a'),
(123, 6, 'Visual', 3, 'a'),
(124, 6, 'Visual', 4, 'a'),
(125, 6, 'Visual', 5, 'a'),
(126, 6, 'Visual', 6, 'a'),
(127, 6, 'Visual', 7, 'a'),
(128, 6, 'Auditivo', 8, 'a'),
(129, 6, 'Kinestésico', 9, 'a'),
(130, 6, 'Visual', 10, 'a'),
(131, 6, 'Auditivo', 11, 'a'),
(132, 6, 'Auditivo', 12, 'a'),
(133, 6, 'Kinestésico', 13, 'a'),
(134, 6, 'Kinestésico', 14, 'a'),
(135, 6, 'Kinestésico', 15, 'a'),
(136, 6, 'Kinestésico', 16, 'a'),
(137, 6, 'Kinestésico', 17, 'a'),
(138, 6, 'Visual', 18, 'a'),
(139, 6, 'Auditivo', 19, 'a'),
(140, 6, 'Kinestésico', 20, 'a'),
(141, 6, 'Kinestésico', 21, 'a'),
(142, 6, 'Kinestésico', 22, 'a'),
(143, 6, 'Kinestésico', 23, 'a'),
(144, 6, 'Visual', 24, 'a'),
(145, 7, 'Kinestésico', 1, 'a'),
(146, 7, 'Kinestésico', 2, 'a'),
(147, 7, 'Kinestésico', 3, 'a'),
(148, 7, 'Kinestésico', 4, 'a'),
(149, 7, 'Kinestésico', 5, 'a'),
(150, 7, 'Kinestésico', 6, 'a'),
(151, 7, 'Visual', 7, 'a'),
(152, 7, 'Auditivo', 8, 'a'),
(153, 7, 'Kinestésico', 9, 'a'),
(154, 7, 'Visual', 10, 'a'),
(155, 7, 'Auditivo', 11, 'a'),
(156, 7, 'Kinestésico', 12, 'a'),
(157, 7, 'Kinestésico', 13, 'a'),
(158, 7, 'Visual', 14, 'a'),
(159, 7, 'Visual', 15, 'a'),
(160, 7, 'Auditivo', 16, 'a'),
(161, 7, 'Auditivo', 17, 'a'),
(162, 7, 'Kinestésico', 18, 'a'),
(163, 7, 'Kinestésico', 19, 'a'),
(164, 7, 'Visual', 20, 'a'),
(165, 7, 'Auditivo', 21, 'a'),
(166, 7, 'Visual', 22, 'a'),
(167, 7, 'Kinestésico', 23, 'a'),
(168, 7, 'Kinestésico', 24, 'a'),
(169, 8, 'Visual', 1, 'b'),
(170, 8, 'Visual', 2, 'b'),
(171, 8, 'Auditivo', 3, 'b'),
(172, 8, 'Visual', 4, 'b'),
(173, 8, 'Visual', 5, 'b'),
(174, 8, 'Visual', 6, 'b'),
(175, 8, 'Auditivo', 7, 'b'),
(176, 8, 'Kinestésico', 8, 'b'),
(177, 8, 'Visual', 9, 'b'),
(178, 8, 'Auditivo', 10, 'b'),
(179, 8, 'Kinestésico', 11, 'b'),
(180, 8, 'Visual', 12, 'b'),
(181, 8, 'Auditivo', 13, 'b'),
(182, 8, 'Kinestésico', 14, 'b'),
(183, 8, 'Visual', 15, 'b'),
(184, 8, 'Auditivo', 16, 'b'),
(185, 8, 'Kinestésico', 17, 'b'),
(186, 8, 'Visual', 18, 'b'),
(187, 8, 'Kinestésico', 19, 'b'),
(188, 8, 'Auditivo', 20, 'b'),
(189, 8, 'Visual', 21, 'b'),
(190, 8, 'Auditivo', 22, 'b'),
(191, 8, 'Kinestésico', 23, 'b'),
(192, 8, 'Visual', 24, 'b'),
(193, 9, 'Auditivo', 1, 'b'),
(194, 9, 'Auditivo', 2, 'b'),
(195, 9, 'Auditivo', 3, 'b'),
(196, 9, 'Auditivo', 4, 'b'),
(197, 9, 'Visual', 5, 'b'),
(198, 9, 'Visual', 6, 'b'),
(199, 9, 'Auditivo', 7, 'b'),
(200, 9, 'Kinestésico', 8, 'b'),
(201, 9, 'Kinestésico', 9, 'b'),
(202, 9, 'Visual', 10, 'b'),
(203, 9, 'Auditivo', 11, 'b'),
(204, 9, 'Auditivo', 12, 'b'),
(205, 9, 'Kinestésico', 13, 'b'),
(206, 9, 'Visual', 14, 'b'),
(207, 9, 'Auditivo', 15, 'b'),
(208, 9, 'Visual', 16, 'b'),
(209, 9, 'Kinestésico', 17, 'b'),
(210, 9, 'Visual', 18, 'b'),
(211, 9, 'Visual', 19, 'b'),
(212, 9, 'Kinestésico', 20, 'b'),
(213, 9, 'Visual', 21, 'b'),
(214, 9, 'Visual', 22, 'b'),
(215, 9, 'Auditivo', 23, 'b'),
(216, 9, 'Visual', 24, 'b'),
(217, 10, 'Kinestésico', 1, 'b'),
(218, 10, 'Kinestésico', 2, 'b'),
(219, 10, 'Kinestésico', 3, 'b'),
(220, 10, 'Kinestésico', 4, 'b'),
(221, 10, 'Kinestésico', 5, 'b'),
(222, 10, 'Kinestésico', 6, 'b'),
(223, 10, 'Visual', 7, 'b'),
(224, 10, 'Auditivo', 8, 'b'),
(225, 10, 'Kinestésico', 9, 'b'),
(226, 10, 'Visual', 10, 'b'),
(227, 10, 'Auditivo', 11, 'b'),
(228, 10, 'Kinestésico', 12, 'b'),
(229, 10, 'Visual', 13, 'b'),
(230, 10, 'Auditivo', 14, 'b'),
(231, 10, 'Kinestésico', 15, 'b'),
(232, 10, 'Visual', 16, 'b'),
(233, 10, 'Auditivo', 17, 'b'),
(234, 10, 'Kinestésico', 18, 'b'),
(235, 10, 'Visual', 19, 'b'),
(236, 10, 'Visual', 20, 'b'),
(237, 10, 'Auditivo', 21, 'b'),
(238, 10, 'Kinestésico', 22, 'b'),
(239, 10, 'Kinestésico', 23, 'b'),
(240, 10, 'Auditivo', 24, 'b'),
(241, 11, 'Visual', 1, 'b'),
(242, 11, 'Visual', 2, 'b'),
(243, 11, 'Visual', 3, 'b'),
(244, 11, 'Visual', 4, 'b'),
(245, 11, 'Visual', 5, 'b'),
(246, 11, 'Visual', 6, 'b'),
(247, 11, 'Auditivo', 7, 'b'),
(248, 11, 'Kinestésico', 8, 'b'),
(249, 11, 'Auditivo', 9, 'b'),
(250, 11, 'Visual', 10, 'b'),
(251, 11, 'Visual', 11, 'b'),
(252, 11, 'Visual', 12, 'b'),
(253, 11, 'Auditivo', 13, 'b'),
(254, 11, 'Auditivo', 14, 'b'),
(255, 11, 'Kinestésico', 15, 'b'),
(256, 11, 'Visual', 16, 'b'),
(257, 11, 'Kinestésico', 17, 'b'),
(258, 11, 'Visual', 18, 'b'),
(259, 11, 'Kinestésico', 19, 'b'),
(260, 11, 'Visual', 20, 'b'),
(261, 11, 'Visual', 21, 'b'),
(262, 11, 'Visual', 22, 'b'),
(263, 11, 'Visual', 23, 'b'),
(264, 11, 'Visual', 24, 'b'),
(265, 12, 'Auditivo', 1, 'b'),
(266, 12, 'Auditivo', 2, 'b'),
(267, 12, 'Auditivo', 3, 'b'),
(268, 12, 'Auditivo', 4, 'b'),
(269, 12, 'Auditivo', 5, 'b'),
(270, 12, 'Auditivo', 6, 'b'),
(271, 12, 'Auditivo', 7, 'b'),
(272, 12, 'Visual', 8, 'b'),
(273, 12, 'Auditivo', 9, 'b'),
(274, 12, 'Kinestésico', 10, 'b'),
(275, 12, 'Visual', 11, 'b'),
(276, 12, 'Auditivo', 12, 'b'),
(277, 12, 'Kinestésico', 13, 'b'),
(278, 12, 'Auditivo', 14, 'b'),
(279, 12, 'Kinestésico', 15, 'b'),
(280, 12, 'Visual', 16, 'b'),
(281, 12, 'Visual', 17, 'b'),
(282, 12, 'Visual', 18, 'b'),
(283, 12, 'Kinestésico', 19, 'b'),
(284, 12, 'Kinestésico', 20, 'b'),
(285, 12, 'Visual', 21, 'b'),
(286, 12, 'Visual', 22, 'b'),
(287, 12, 'Auditivo', 23, 'b'),
(288, 12, 'Kinestésico', 24, 'b'),
(289, 13, 'Visual', 1, 'c'),
(290, 13, 'Visual', 2, 'c'),
(291, 13, 'Visual', 3, 'c'),
(292, 13, 'Visual', 4, 'c'),
(293, 13, 'Kinestésico', 5, 'c'),
(294, 13, 'Auditivo', 6, 'c'),
(295, 13, 'Kinestésico', 7, 'c'),
(296, 13, 'Auditivo', 8, 'c'),
(297, 13, 'Kinestésico', 9, 'c'),
(298, 13, 'Kinestésico', 10, 'c'),
(299, 13, 'Visual', 11, 'c'),
(300, 13, 'Visual', 12, 'c'),
(301, 13, 'Auditivo', 13, 'c'),
(302, 13, 'Kinestésico', 14, 'c'),
(303, 13, 'Kinestésico', 15, 'c'),
(304, 13, 'Auditivo', 16, 'c'),
(305, 13, 'Visual', 17, 'c'),
(306, 13, 'Visual', 18, 'c'),
(307, 13, 'Visual', 19, 'c'),
(308, 13, 'Auditivo', 20, 'c'),
(309, 13, 'Kinestésico', 21, 'c'),
(310, 13, 'Visual', 22, 'c'),
(311, 13, 'Visual', 23, 'c'),
(312, 13, 'Visual', 24, 'c'),
(313, 14, 'Visual', 1, 'c'),
(314, 14, 'Visual', 2, 'c'),
(315, 14, 'Auditivo', 3, 'c'),
(316, 14, 'Auditivo', 4, 'c'),
(317, 14, 'Kinestésico', 5, 'c'),
(318, 14, 'Visual', 6, 'c'),
(319, 14, 'Kinestésico', 7, 'c'),
(320, 14, 'Kinestésico', 8, 'c'),
(321, 14, 'Kinestésico', 9, 'c'),
(322, 14, 'Kinestésico', 10, 'c'),
(323, 14, 'Auditivo', 11, 'c'),
(324, 14, 'Auditivo', 12, 'c'),
(325, 14, 'Auditivo', 13, 'c'),
(326, 14, 'Auditivo', 14, 'c'),
(327, 14, 'Auditivo', 15, 'c'),
(328, 14, 'Auditivo', 16, 'c'),
(329, 14, 'Auditivo', 17, 'c'),
(330, 14, 'Auditivo', 18, 'c'),
(331, 14, 'Auditivo', 19, 'c'),
(332, 14, 'Auditivo', 20, 'c'),
(333, 14, 'Auditivo', 21, 'c'),
(334, 14, 'Auditivo', 22, 'c'),
(335, 14, 'Auditivo', 23, 'c'),
(336, 14, 'Auditivo', 24, 'c'),
(337, 15, 'Visual', 1, 'c'),
(338, 15, 'Visual', 2, 'c'),
(339, 15, 'Kinestésico', 3, 'c'),
(340, 15, 'Auditivo', 4, 'c'),
(341, 15, 'Auditivo', 5, 'c'),
(342, 15, 'Visual', 6, 'c'),
(343, 15, 'Visual', 7, 'c'),
(344, 15, 'Auditivo', 8, 'c'),
(345, 15, 'Kinestésico', 9, 'c'),
(346, 15, 'Visual', 10, 'c'),
(347, 15, 'Auditivo', 11, 'c'),
(348, 15, 'Auditivo', 12, 'c'),
(349, 15, 'Auditivo', 13, 'c'),
(350, 15, 'Kinestésico', 14, 'c'),
(351, 15, 'Auditivo', 15, 'c'),
(352, 15, 'Auditivo', 16, 'c'),
(353, 15, 'Visual', 17, 'c'),
(354, 15, 'Visual', 18, 'c'),
(355, 15, 'Visual', 19, 'c'),
(356, 15, 'Auditivo', 20, 'c'),
(357, 15, 'Auditivo', 21, 'c'),
(358, 15, 'Kinestésico', 22, 'c'),
(359, 15, 'Kinestésico', 23, 'c'),
(360, 15, 'Visual', 24, 'c'),
(361, 16, 'Visual', 1, 'c'),
(362, 16, 'Auditivo', 2, 'c'),
(363, 16, 'Kinestésico', 3, 'c'),
(364, 16, 'Kinestésico', 4, 'c'),
(365, 16, 'Visual', 5, 'c'),
(366, 16, 'Visual', 6, 'c'),
(367, 16, 'Visual', 7, 'c'),
(368, 16, 'Visual', 8, 'c'),
(369, 16, 'Visual', 9, 'c'),
(370, 16, 'Visual', 10, 'c'),
(371, 16, 'Visual', 11, 'c'),
(372, 16, 'Visual', 12, 'c'),
(373, 16, 'Auditivo', 13, 'c'),
(374, 16, 'Auditivo', 14, 'c'),
(375, 16, 'Kinestésico', 15, 'c'),
(376, 16, 'Visual', 16, 'c'),
(377, 16, 'Visual', 17, 'c'),
(378, 16, 'Visual', 18, 'c'),
(379, 16, 'Visual', 19, 'c'),
(380, 16, 'Auditivo', 20, 'c'),
(381, 16, 'Kinestésico', 21, 'c'),
(382, 16, 'Visual', 22, 'c'),
(383, 16, 'Visual', 23, 'c'),
(384, 16, 'Visual', 24, 'c'),
(385, 17, 'Visual', 1, 'c'),
(386, 17, 'Kinestésico', 2, 'c'),
(387, 17, 'Kinestésico', 3, 'c'),
(388, 17, 'Kinestésico', 4, 'c'),
(389, 17, 'Kinestésico', 5, 'c'),
(390, 17, 'Kinestésico', 6, 'c'),
(391, 17, 'Kinestésico', 7, 'c'),
(392, 17, 'Kinestésico', 8, 'c'),
(393, 17, 'Kinestésico', 9, 'c'),
(394, 17, 'Kinestésico', 10, 'c'),
(395, 17, 'Auditivo', 11, 'c'),
(396, 17, 'Visual', 12, 'c'),
(397, 17, 'Kinestésico', 13, 'c'),
(398, 17, 'Kinestésico', 14, 'c'),
(399, 17, 'Visual', 15, 'c'),
(400, 17, 'Auditivo', 16, 'c'),
(401, 17, 'Visual', 17, 'c'),
(402, 17, 'Auditivo', 18, 'c'),
(403, 17, 'Kinestésico', 19, 'c'),
(404, 17, 'Kinestésico', 20, 'c'),
(405, 17, 'Kinestésico', 21, 'c'),
(406, 17, 'Visual', 22, 'c'),
(407, 17, 'Visual', 23, 'c'),
(408, 17, 'Kinestésico', 24, 'c'),
(409, 18, 'Visual', 1, 'd'),
(410, 18, 'Auditivo', 2, 'd'),
(411, 18, 'Visual', 3, 'd'),
(412, 18, 'Visual', 4, 'd'),
(413, 18, 'Visual', 5, 'd'),
(414, 18, 'Auditivo', 6, 'd'),
(415, 18, 'Visual', 7, 'd'),
(416, 18, 'Visual', 8, 'd'),
(417, 18, 'Auditivo', 9, 'd'),
(418, 18, 'Kinestésico', 10, 'd'),
(419, 18, 'Visual', 11, 'd'),
(420, 18, 'Kinestésico', 12, 'd'),
(421, 18, 'Kinestésico', 13, 'd'),
(422, 18, 'Kinestésico', 14, 'd'),
(423, 18, 'Visual', 15, 'd'),
(424, 18, 'Visual', 16, 'd'),
(425, 18, 'Visual', 17, 'd'),
(426, 18, 'Auditivo', 18, 'd'),
(427, 18, 'Visual', 19, 'd'),
(428, 18, 'Auditivo', 20, 'd'),
(429, 18, 'Visual', 21, 'd'),
(430, 18, 'Visual', 22, 'd'),
(431, 18, 'Visual', 23, 'd'),
(432, 18, 'Visual', 24, 'd'),
(433, 19, 'Auditivo', 1, 'd'),
(434, 19, 'Auditivo', 2, 'd'),
(435, 19, 'Auditivo', 3, 'd'),
(436, 19, 'Auditivo', 4, 'd'),
(437, 19, 'Auditivo', 5, 'd'),
(438, 19, 'Auditivo', 6, 'd'),
(439, 19, 'Auditivo', 7, 'd'),
(440, 19, 'Auditivo', 8, 'd'),
(441, 19, 'Auditivo', 9, 'd'),
(442, 19, 'Kinestésico', 10, 'd'),
(443, 19, 'Auditivo', 11, 'd'),
(444, 19, 'Auditivo', 12, 'd'),
(445, 19, 'Auditivo', 13, 'd'),
(446, 19, 'Visual', 14, 'd'),
(447, 19, 'Visual', 15, 'd'),
(448, 19, 'Auditivo', 16, 'd'),
(449, 19, 'Kinestésico', 17, 'd'),
(450, 19, 'Auditivo', 18, 'd'),
(451, 19, 'Auditivo', 19, 'd'),
(452, 19, 'Auditivo', 20, 'd'),
(453, 19, 'Visual', 21, 'd'),
(454, 19, 'Auditivo', 22, 'd'),
(455, 19, 'Auditivo', 23, 'd'),
(456, 19, 'Auditivo', 24, 'd'),
(457, 20, 'Visual', 1, 'd'),
(458, 20, 'Visual', 2, 'd'),
(459, 20, 'Visual', 3, 'd'),
(460, 20, 'Kinestésico', 4, 'd'),
(461, 20, 'Visual', 5, 'd'),
(462, 20, 'Visual', 6, 'd'),
(463, 20, 'Visual', 7, 'd'),
(464, 20, 'Auditivo', 8, 'd'),
(465, 20, 'Visual', 9, 'd'),
(466, 20, 'Kinestésico', 10, 'd'),
(467, 20, 'Kinestésico', 11, 'd'),
(468, 20, 'Auditivo', 12, 'd'),
(469, 20, 'Visual', 13, 'd'),
(470, 20, 'Visual', 14, 'd'),
(471, 20, 'Visual', 15, 'd'),
(472, 20, 'Kinestésico', 16, 'd'),
(473, 20, 'Auditivo', 17, 'd'),
(474, 20, 'Auditivo', 18, 'd'),
(475, 20, 'Kinestésico', 19, 'd'),
(476, 20, 'Auditivo', 20, 'd'),
(477, 20, 'Kinestésico', 21, 'd'),
(478, 20, 'Visual', 22, 'd'),
(479, 20, 'Visual', 23, 'd'),
(480, 20, 'Visual', 24, 'd'),
(481, 22, 'Visual', 1, 'd'),
(482, 22, 'Visual', 2, 'd'),
(483, 22, 'Auditivo', 3, 'd'),
(484, 22, 'Visual', 4, 'd'),
(485, 22, 'Visual', 5, 'd'),
(486, 22, 'Visual', 6, 'd'),
(487, 22, 'Kinestésico', 7, 'd'),
(488, 22, 'Visual', 8, 'd'),
(489, 22, 'Visual', 9, 'd'),
(490, 22, 'Visual', 10, 'd'),
(491, 22, 'Visual', 11, 'd'),
(492, 22, 'Visual', 12, 'd'),
(493, 22, 'Visual', 13, 'd'),
(494, 22, 'Visual', 14, 'd'),
(495, 22, 'Visual', 15, 'd'),
(496, 22, 'Visual', 16, 'd'),
(497, 22, 'Auditivo', 17, 'd'),
(498, 22, 'Visual', 18, 'd'),
(499, 22, 'Auditivo', 19, 'd'),
(500, 22, 'Visual', 20, 'd'),
(501, 22, 'Visual', 21, 'd'),
(502, 22, 'Visual', 22, 'd'),
(503, 22, 'Visual', 23, 'd'),
(504, 22, 'Visual', 24, 'd'),
(505, 23, 'Auditivo', 1, 'e'),
(506, 23, 'Auditivo', 2, 'e'),
(507, 23, 'Auditivo', 3, 'e'),
(508, 23, 'Auditivo', 4, 'e'),
(509, 23, 'Auditivo', 5, 'e'),
(510, 23, 'Auditivo', 6, 'e'),
(511, 23, 'Auditivo', 7, 'e'),
(512, 23, 'Visual', 8, 'e'),
(513, 23, 'Kinestésico', 9, 'e'),
(514, 23, 'Kinestésico', 10, 'e'),
(515, 23, 'Visual', 11, 'e'),
(516, 23, 'Visual', 12, 'e'),
(517, 23, 'Visual', 13, 'e'),
(518, 23, 'Auditivo', 14, 'e'),
(519, 23, 'Auditivo', 15, 'e'),
(520, 23, 'Auditivo', 16, 'e'),
(521, 23, 'Auditivo', 17, 'e'),
(522, 23, 'Auditivo', 18, 'e'),
(523, 23, 'Auditivo', 19, 'e'),
(524, 23, 'Auditivo', 20, 'e'),
(525, 23, 'Auditivo', 21, 'e'),
(526, 23, 'Auditivo', 22, 'e'),
(527, 23, 'Visual', 23, 'e'),
(528, 23, 'Kinestésico', 24, 'e'),
(529, 24, 'Visual', 1, 'e'),
(530, 24, 'Visual', 2, 'e'),
(531, 24, 'Visual', 3, 'e'),
(532, 24, 'Visual', 4, 'e'),
(533, 24, 'Visual', 5, 'e'),
(534, 24, 'Visual', 6, 'e'),
(535, 24, 'Kinestésico', 7, 'e'),
(536, 24, 'Visual', 8, 'e'),
(537, 24, 'Visual', 9, 'e'),
(538, 24, 'Visual', 10, 'e'),
(539, 24, 'Visual', 11, 'e'),
(540, 24, 'Visual', 12, 'e'),
(541, 24, 'Visual', 13, 'e'),
(542, 24, 'Visual', 14, 'e'),
(543, 24, 'Visual', 15, 'e'),
(544, 24, 'Visual', 16, 'e'),
(545, 24, 'Visual', 17, 'e'),
(546, 24, 'Visual', 18, 'e'),
(547, 24, 'Visual', 19, 'e'),
(548, 24, 'Auditivo', 20, 'e'),
(549, 24, 'Kinestésico', 21, 'e'),
(550, 24, 'Auditivo', 22, 'e'),
(551, 24, 'Auditivo', 23, 'e'),
(552, 24, 'Kinestésico', 24, 'e'),
(553, 25, 'Auditivo', 1, 'e'),
(554, 25, 'Auditivo', 2, 'e'),
(555, 25, 'Visual', 3, 'e'),
(556, 25, 'Visual', 4, 'e'),
(557, 25, 'Visual', 5, 'e'),
(558, 25, 'Visual', 6, 'e'),
(559, 25, 'Visual', 7, 'e'),
(560, 25, 'Visual', 8, 'e'),
(561, 25, 'Visual', 9, 'e'),
(562, 25, 'Auditivo', 10, 'e'),
(563, 25, 'Visual', 11, 'e'),
(564, 25, 'Visual', 12, 'e'),
(565, 25, 'Visual', 13, 'e'),
(566, 25, 'Visual', 14, 'e'),
(567, 25, 'Kinestésico', 15, 'e'),
(568, 25, 'Auditivo', 16, 'e'),
(569, 25, 'Visual', 17, 'e'),
(570, 25, 'Visual', 18, 'e'),
(571, 25, 'Visual', 19, 'e'),
(572, 25, 'Auditivo', 20, 'e'),
(573, 25, 'Kinestésico', 21, 'e'),
(574, 25, 'Auditivo', 22, 'e'),
(575, 25, 'Auditivo', 23, 'e'),
(576, 25, 'Auditivo', 24, 'e'),
(577, 26, 'Auditivo', 1, 'e'),
(578, 26, 'Visual', 2, 'e'),
(579, 26, 'Visual', 3, 'e'),
(580, 26, 'Visual', 4, 'e'),
(581, 26, 'Visual', 5, 'e'),
(582, 26, 'Visual', 6, 'e'),
(583, 26, 'Auditivo', 7, 'e'),
(584, 26, 'Auditivo', 8, 'e'),
(585, 26, 'Kinestésico', 9, 'e'),
(586, 26, 'Visual', 10, 'e'),
(587, 26, 'Visual', 11, 'e'),
(588, 26, 'Visual', 12, 'e'),
(589, 26, 'Visual', 13, 'e'),
(590, 26, 'Visual', 14, 'e'),
(591, 26, 'Visual', 15, 'e'),
(592, 26, 'Visual', 16, 'e'),
(593, 26, 'Visual', 17, 'e'),
(594, 26, 'Visual', 18, 'e'),
(595, 26, 'Visual', 19, 'e'),
(596, 26, 'Visual', 20, 'e'),
(597, 26, 'Visual', 21, 'e'),
(598, 26, 'Auditivo', 22, 'e'),
(599, 26, 'Kinestésico', 23, 'e'),
(600, 26, 'Kinestésico', 24, 'e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_categorias`
--

CREATE TABLE `tabla_categorias` (
  `idcategoria` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `grupo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_categorias`
--

INSERT INTO `tabla_categorias` (`idcategoria`, `idUsuario`, `categoria`, `grupo`) VALUES
(1, 1, 'Visual', 'a'),
(2, 2, 'Visual', 'a'),
(3, 3, 'Kinestésico', 'a'),
(4, 4, 'Visual', 'a'),
(5, 5, 'Kinestésico', 'a'),
(6, 6, 'Visual', 'a'),
(7, 7, 'Kinestésico', 'a'),
(8, 8, 'Visual', 'b'),
(9, 9, 'Visual', 'b'),
(10, 10, 'Kinestésico', 'b'),
(11, 11, 'Visual', 'b'),
(12, 12, 'Auditivo', 'b'),
(13, 13, 'Visual', 'c'),
(14, 14, 'Auditivo', 'c'),
(15, 15, 'Auditivo', 'c'),
(16, 16, 'Visual', 'c'),
(17, 17, 'Kinestésico', 'c'),
(18, 18, 'Visual', 'd'),
(19, 19, 'Auditivo', 'd'),
(20, 20, 'Visual', 'd'),
(21, 22, 'Visual', 'd'),
(22, 23, 'Auditivo', 'e'),
(23, 24, 'Visual', 'e'),
(24, 25, 'Visual', 'e'),
(25, 26, 'Visual', 'e');

--
-- Disparadores `tabla_categorias`
--
DELIMITER $$
CREATE TRIGGER `after_insert_categoria` AFTER INSERT ON `tabla_categorias` FOR EACH ROW BEGIN
    DECLARE v_nombre VARCHAR(120);
    DECLARE v_idUsuario INT;
    
    -- Obtener el nombre de la categoría y el idUsuario
    SELECT NEW.categoria, NEW.idUsuario INTO v_nombre, v_idUsuario;
    
    -- Insertar un nuevo registro en la tabla notificaciones
    INSERT INTO notificaciones (descripcion, nombre, idEst, estado)
    VALUES ('Se registraron sus resultados, su estilo es', v_nombre, v_idUsuario, 'sin revisar');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_categoria` AFTER UPDATE ON `tabla_categorias` FOR EACH ROW BEGIN
    -- Actualizar la tabla notificaciones
    UPDATE notificaciones 
    SET estado = 'sin revisar', -- Actualiza el estado a 'sin revisar'
        nombre = NEW.categoria -- Actualiza el nombre con la nueva categoría de tabla_categorias
    WHERE descripcion = 'Se registraron sus resultados, su estilo es' -- Condición de la descripción
    AND idEst = NEW.idUsuario; -- Condición de idEst igual al nuevo idUsuario de tabla_categorias
END
$$
DELIMITER ;

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
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
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
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`idNotificaciones`);

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
-- Indices de la tabla `tabla_categorias`
--
ALTER TABLE `tabla_categorias`
  ADD PRIMARY KEY (`idcategoria`);

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
  MODIFY `idAsignarMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `idEncuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `material_didactico`
--
ALTER TABLE `material_didactico`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `idNotificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `idnovedades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `rtest`
--
ALTER TABLE `rtest`
  MODIFY `idRtest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT de la tabla `tabla_categorias`
--
ALTER TABLE `tabla_categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
