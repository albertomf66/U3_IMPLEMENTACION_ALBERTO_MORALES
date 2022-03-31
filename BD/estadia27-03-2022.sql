-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2022 a las 08:26:36
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

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
-- Estructura de tabla para la tabla `actividadclaseprofesor`
--

CREATE TABLE `actividadclaseprofesor` (
  `idActividadClaseProfesor` int(11) NOT NULL,
  `idActividades` int(11) NOT NULL,
  `codigoclase` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estatusactividad` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `actividadclaseprofesor`
--

INSERT INTO `actividadclaseprofesor` (`idActividadClaseProfesor`, `idActividades`, `codigoclase`, `estatusactividad`) VALUES
(1, 1, 'LULtHs', 'Activa'),
(3, 3, 'LULtHs', 'Activa'),
(4, 4, 'LULtHs', 'Activa'),
(5, 5, 'LULtHs', 'Activa'),
(6, 6, 'iz0g9r', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadentregar`
--

CREATE TABLE `actividadentregar` (
  `idActividadEntregada` int(11) NOT NULL,
  `EstatusActividad` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Calificacion` float NOT NULL,
  `FechaEntregada` date NOT NULL,
  `HoraEntregada` time NOT NULL,
  `idActividadClaseProfesor` int(11) NOT NULL,
  `matricula_alumno` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `actividadentregar`
--

INSERT INTO `actividadentregar` (`idActividadEntregada`, `EstatusActividad`, `Calificacion`, `FechaEntregada`, `HoraEntregada`, `idActividadClaseProfesor`, `matricula_alumno`) VALUES
(1, 'Activo', 8, '2022-03-15', '24:47:58', 6, 'mfao160981');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idActividades` int(11) NOT NULL,
  `nombre_actividad` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion_actividad` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `tipo_evidencia` varchar(2) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tipo_actividad` tinyint(2) NOT NULL,
  `FechaEntrega` date NOT NULL,
  `HoraEntrega` time NOT NULL,
  `FechaCreacion` date NOT NULL,
  `HoraCreacion` time NOT NULL,
  `ArchivoActividad` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idActividades`, `nombre_actividad`, `descripcion_actividad`, `tipo_evidencia`, `Tipo_actividad`, `FechaEntrega`, `HoraEntrega`, `FechaCreacion`, `HoraCreacion`, `ArchivoActividad`) VALUES
(1, 'Actividad Dinamica Prueba', 'Actividad Dinamica', 'DM', 2, '2022-03-16', '00:53:00', '2022-03-14', '00:54:00', ''),
(2, 'Simple', 'qweqwe', 'EP', 1, '2022-03-16', '01:00:00', '2022-03-14', '01:00:00', 0x2e2e2f416374697669646164657343617267616461732f31364275727269746f46696e616c2e6a7067),
(3, 'QWQEQW', 'asasd', 'ED', 1, '2022-03-16', '01:00:00', '2022-03-14', '01:00:00', 0x2e2e2f416374697669646164657343617267616461732f3137426f6e6f732e786c7378),
(4, 'Clase Dinamica Dos', 'Actividad Dinamica', 'DM', 2, '2022-03-15', '06:30:00', '2022-03-14', '06:30:00', ''),
(5, 'Actividad Prueba Dinamica', 'Actividad Dinamica', 'DM', 2, '2022-03-17', '09:13:00', '2022-03-14', '09:13:00', ''),
(6, 'Prueba Actvidad Dos ', 'Actividad Dinamica', 'DM', 2, '2022-03-16', '09:17:00', '2022-03-14', '09:17:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `matricula_administrador` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_administrador` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `paterno_administrador` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `materno_administrador` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo_administrador` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `psw_administrador` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto_administrador` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`matricula_administrador`, `nombre_administrador`, `paterno_administrador`, `materno_administrador`, `correo_administrador`, `psw_administrador`, `foto_administrador`) VALUES
('root', 'Alberto ', 'Morales ', 'Flores', 'root@correo.com', '1234', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula_alumno` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_alumno` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `paterno_alumno` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `materno_alumno` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo_alumno` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `psw_alumno` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto_alumno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula_alumno`, `nombre_alumno`, `paterno_alumno`, `materno_alumno`, `correo_alumno`, `psw_alumno`, `foto_alumno`) VALUES
('mfao160981', 'Alberto', 'Morales', 'Flores', 'mfao160981@upemor.edu.mx', '1234', 2),
('MMHO175281', 'Mario ', 'Martinez', 'Hernandez', 'MMHO175281@upemor.edu.mx', '123', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claseprofesor`
--

CREATE TABLE `claseprofesor` (
  `codigoclase` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `matricula_profesor` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NombreClase` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `claseprofesor`
--

INSERT INTO `claseprofesor` (`codigoclase`, `Descripcion`, `matricula_profesor`, `NombreClase`) VALUES
('iz0g9r', 'Peubas ', 'bigo160819 ', 'Prueba Actividad DInamica'),
('LDoxA6', 'asdasdsa', 'bigo160819 ', 'Clase Nueva Dos'),
('LULtHs', 'Clase Prueba', 'bigo160819 ', 'Clase Prueba'),
('NKHp9D', 'Sin Descripcion', 'bigo160819 ', 'Matemáticas '),
('oBEeaM', 'asdad', 'bigo160819 ', 'Clase Notif tres'),
('OVDvgT', 'Hola', 'bigo160819 ', 'Nueva Clase'),
('rJ16pU', 'asdadasd', 'bigo160819 ', 'Clase Notif dos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_alumno_profesor`
--

CREATE TABLE `clase_alumno_profesor` (
  `idClase_Alumno_Profesor` int(11) NOT NULL,
  `matricula_alumno` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigoclase` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CantidadAlumnos` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clase_alumno_profesor`
--

INSERT INTO `clase_alumno_profesor` (`idClase_Alumno_Profesor`, `matricula_alumno`, `codigoclase`, `CantidadAlumnos`) VALUES
(1, 'mfao160981', 'NKHp9D', 0),
(2, 'mfao160981', 'rJ16pU', 0),
(6, 'mfao160981', 'LULtHs', 0),
(7, 'mfao160981', 'iz0g9r', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigoregistro`
--

CREATE TABLE `codigoregistro` (
  `idcodigo` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `codigoregistro`
--

INSERT INTO `codigoregistro` (`idcodigo`, `usuario`) VALUES
('1234', 'Alumno'),
('12345', 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventosalumno`
--

CREATE TABLE `eventosalumno` (
  `idEventosActividad` int(11) NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `start` date NOT NULL,
  `importancia` int(11) NOT NULL,
  `matricula_alumno` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `color` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `control` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `eventosalumno`
--

INSERT INTO `eventosalumno` (`idEventosActividad`, `title`, `start`, `importancia`, `matricula_alumno`, `color`, `control`) VALUES
(2, 'EJEMPLO2', '2022-03-23', 3, 'mfao160981', '#a1f524', 0),
(3, 'evento', '2022-03-16', 3, 'mfao160981', '#000000', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventosprofesor`
--

CREATE TABLE `eventosprofesor` (
  `idEventosActividad` int(11) NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `start` date NOT NULL,
  `importancia` int(1) NOT NULL,
  `matricula_profesor` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `color` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `control` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `eventosprofesor`
--

INSERT INTO `eventosprofesor` (`idEventosActividad`, `title`, `start`, `importancia`, `matricula_profesor`, `color`, `control`) VALUES
(2, 'Prueba Actividad', '2022-03-07', 1, 'bigo160819', '#DF0000', 1),
(3, 'wqeqeqe', '2022-03-18', 1, 'bigo160819', '#DF0000', 1),
(4, 'Ejemplo Evento', '2022-03-08', 2, 'bigo160819', '#000000', 0),
(5, 'Ejemplo Actividad Evento', '2022-03-18', 1, 'bigo160819', '#DF0000', 1),
(11, 'Clase Dinamica', '2022-03-11', 1, 'bigo160819', '#DF0000', 1),
(12, 'Clase Dinamica 2', '2022-03-10', 1, 'bigo160819', '#DF0000', 1),
(13, 'Clase Dinamica Notif', '2022-03-10', 1, 'bigo160819', '#DF0000', 1),
(14, 'Actividad Simple para notif', '2022-03-11', 1, 'bigo160819', '#DF0000', 1),
(15, 'Actividad Prueba Notif', '2022-03-11', 1, 'bigo160819', '#DF0000', 1),
(16, 'Notif Prueba', '2022-03-11', 3, 'bigo160819', '#5b1f1f', 0),
(17, 'Clase Dinamica', '2022-03-15', 1, 'bigo160819', '#DF0000', 1),
(18, 'Clase Dinamica', '2022-03-16', 1, 'bigo160819', '#DF0000', 1),
(19, 'Clase Dinamica', '2022-03-16', 1, 'bigo160819', '#DF0000', 1),
(20, 'Clase Dinamica', '2022-03-15', 1, 'bigo160819', '#DF0000', 1),
(21, 'Act Prueba Pregunta', '2022-03-16', 1, 'bigo160819', '#DF0000', 1),
(22, 'Prueba Pregunta Dos', '2022-03-17', 1, 'bigo160819', '#DF0000', 1),
(23, 'Clase Dinamica', '2022-03-18', 1, 'bigo160819', '#DF0000', 1),
(24, 'Nuevo', '2022-03-15', 1, 'bigo160819', '#DF0000', 1),
(25, 'Nuevo ', '2022-03-16', 1, 'bigo160819', '#DF0000', 1),
(26, 'Lo que sea', '2022-03-18', 1, 'bigo160819', '#DF0000', 1),
(27, 'Prueba Final', '2022-03-16', 1, 'bigo160819', '#DF0000', 1),
(28, 'Prueba Final 2', '2022-03-17', 1, 'bigo160819', '#DF0000', 1),
(29, 'Actividad Dinamica Prueba', '2022-03-16', 1, 'bigo160819', '#DF0000', 1),
(30, 'Simple', '2022-03-16', 1, 'bigo160819', '#DF0000', 1),
(31, 'QWQEQW', '2022-03-16', 1, 'bigo160819', '#DF0000', 1),
(32, 'Clase Dinamica Dos', '2022-03-15', 1, 'bigo160819', '#DF0000', 1),
(33, 'Actividad Prueba Dinamica', '2022-03-17', 1, 'bigo160819', '#DF0000', 1),
(34, 'Prueba Actvidad Dos ', '2022-03-16', 1, 'bigo160819', '#DF0000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasalumno`
--

CREATE TABLE `notasalumno` (
  `idNotasAlumno` int(11) NOT NULL,
  `nombre_nota` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fechanota` date NOT NULL,
  `matricula_alumno` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasprofesor`
--

CREATE TABLE `notasprofesor` (
  `idNotasProfesor` int(11) NOT NULL,
  `nombre_nota_profesor` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fechanota_profesor` date NOT NULL,
  `matricula_profesor` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `notasprofesor`
--

INSERT INTO `notasprofesor` (`idNotasProfesor`, `nombre_nota_profesor`, `Fechanota_profesor`, `matricula_profesor`, `descripcion`) VALUES
(0, 'Prueba ', '2022-03-05', 'bigo160819', 'bjgj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_alumno`
--

CREATE TABLE `notificacion_alumno` (
  `idNotificacion_Alumno` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `matricula_alumno` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `notificacion_alumno`
--

INSERT INTO `notificacion_alumno` (`idNotificacion_Alumno`, `tipo`, `Descripcion`, `matricula_alumno`) VALUES
(1, 1, 'Prueba Notificación', 'mfao160981'),
(4, 1, 'Unido a una Clase nueva', 'mfao160981 '),
(5, 1, 'Unido a una Clase nueva', 'mfao160981 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_profesor`
--

CREATE TABLE `notificacion_profesor` (
  `idNotificacion_Profesor` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `matricula_profesor` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `notificacion_profesor`
--

INSERT INTO `notificacion_profesor` (`idNotificacion_Profesor`, `tipo`, `Descripcion`, `matricula_profesor`) VALUES
(1, 1, 'Lo que sea', 'bigo160819'),
(2, 2, 'Lo que sea 2 ', 'bigo160819'),
(3, 1, 'Clase Notif tres', 'bigo160819'),
(5, 2, 'Clase Dinamica Notif', 'bigo160819'),
(6, 1, 'Nueva Clase', 'bigo160819'),
(7, 1, 'Clase Nueva Dos', 'bigo160819'),
(8, 2, 'Actividad Simple para notif', 'bigo160819'),
(9, 2, 'Actividad Prueba Notif', 'bigo160819'),
(10, 2, 'Clase Dinamica', 'bigo160819'),
(11, 2, 'Clase Dinamica', 'bigo160819'),
(12, 2, 'Clase Dinamica', 'bigo160819'),
(13, 2, 'Clase Dinamica', 'bigo160819'),
(14, 2, 'Act Prueba Pregunta', 'bigo160819'),
(15, 2, 'Prueba Pregunta Dos', 'bigo160819'),
(16, 2, 'Clase Dinamica', 'bigo160819'),
(17, 2, 'Nuevo', 'bigo160819'),
(18, 2, 'Nuevo ', 'bigo160819'),
(19, 2, 'Lo que sea', 'bigo160819'),
(20, 2, 'Prueba Final', 'bigo160819'),
(21, 2, 'Prueba Final 2', 'bigo160819'),
(22, 2, 'Actividad Dinamica Prueba', 'bigo160819'),
(23, 2, 'Simple', 'bigo160819'),
(24, 2, 'QWQEQW', 'bigo160819'),
(25, 2, 'Clase Dinamica Dos', 'bigo160819'),
(26, 2, 'Actividad Prueba Dinamica', 'bigo160819'),
(27, 1, 'Prueba Actividad DInamica', 'bigo160819'),
(28, 2, 'Prueba Actvidad Dos ', 'bigo160819');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_alumno`
--

CREATE TABLE `perfil_alumno` (
  `idperfil_alumno` int(11) NOT NULL,
  `seleccion_color` tinyint(1) NOT NULL,
  `frase_alumno` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `matricula_alumno` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `perfil_alumno`
--

INSERT INTO `perfil_alumno` (`idperfil_alumno`, `seleccion_color`, `frase_alumno`, `matricula_alumno`) VALUES
(1, 0, 'A veeer', 'mfao160981');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_profesor`
--

CREATE TABLE `perfil_profesor` (
  `idperfil_profesor` int(11) NOT NULL,
  `seleccion_color` tinyint(1) NOT NULL,
  `frase_profesor` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `matricula_profesor` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `perfil_profesor`
--

INSERT INTO `perfil_profesor` (`idperfil_profesor`, `seleccion_color`, `frase_profesor`, `matricula_profesor`) VALUES
(1, 0, 'Actualizar', 'bigo160819');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasactividad`
--

CREATE TABLE `preguntasactividad` (
  `idPreguntasActividad` int(11) NOT NULL,
  `idActividades` int(11) NOT NULL,
  `Pregunta` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Respuesta` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `preguntasactividad`
--

INSERT INTO `preguntasactividad` (`idPreguntasActividad`, `idActividades`, `Pregunta`, `Respuesta`) VALUES
(19, 1, 'Animal más grande terrestre', 'Elefante'),
(20, 1, 'Animal Marino más grande del mundo', 'leon'),
(21, 4, 'Como te llamas', 'Alberto'),
(22, 4, 'Donde vives', 'Mexico'),
(23, 5, 'Cuantos años tienes ', 'Once'),
(24, 5, 'animal más grande terrestre', 'Elefante'),
(25, 6, 'Que mes es ? ', 'Marzo'),
(26, 6, 'Cuantos años tienes ? ', 'Veinte'),
(27, 6, 'Lo que sea', 'si si '),
(28, 6, 'Lo que sea por dos', 'no no ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `matricula_profesor` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_profesor` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `paterno_profesor` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `materno_profesor` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo_profesor` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `psw_profesor` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto_profesor` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`matricula_profesor`, `nombre_profesor`, `paterno_profesor`, `materno_profesor`, `correo_profesor`, `psw_profesor`, `foto_profesor`) VALUES
('bigo160819', 'Gloria', 'Barrera', 'Ibarra', 'bigo160819@upemor.edu.mx', '1234', 3),
('lcdo162514', 'David', 'Leal ', 'Caspeta', 'lcdo162514@upemor.edu.mx', '1234', NULL),
('ppmi167852', 'Pedro ', 'Perez', 'Martinez', 'ppmi167852@upemor.edu.mx', '12345', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividadclaseprofesor`
--
ALTER TABLE `actividadclaseprofesor`
  ADD PRIMARY KEY (`idActividadClaseProfesor`),
  ADD KEY `CodigoDeClaseProfesor_idx` (`codigoclase`),
  ADD KEY `ActividadesDeActividades_idx` (`idActividades`);

--
-- Indices de la tabla `actividadentregar`
--
ALTER TABLE `actividadentregar`
  ADD PRIMARY KEY (`idActividadEntregada`),
  ADD KEY `matalumnoentregada_idx` (`matricula_alumno`),
  ADD KEY `ActClaseProfeID_idx` (`idActividadClaseProfesor`);

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividades`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`matricula_administrador`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula_alumno`);

--
-- Indices de la tabla `claseprofesor`
--
ALTER TABLE `claseprofesor`
  ADD PRIMARY KEY (`codigoclase`),
  ADD KEY `ClaseProfeMatricula_idx` (`matricula_profesor`);

--
-- Indices de la tabla `clase_alumno_profesor`
--
ALTER TABLE `clase_alumno_profesor`
  ADD PRIMARY KEY (`idClase_Alumno_Profesor`,`matricula_alumno`),
  ADD KEY `clasealum_matricula_idx` (`matricula_alumno`),
  ADD KEY `codigoclaseprofesor_idx` (`codigoclase`);

--
-- Indices de la tabla `codigoregistro`
--
ALTER TABLE `codigoregistro`
  ADD PRIMARY KEY (`idcodigo`);

--
-- Indices de la tabla `eventosalumno`
--
ALTER TABLE `eventosalumno`
  ADD PRIMARY KEY (`idEventosActividad`),
  ADD KEY `eventoalumno_idx` (`matricula_alumno`);

--
-- Indices de la tabla `eventosprofesor`
--
ALTER TABLE `eventosprofesor`
  ADD PRIMARY KEY (`idEventosActividad`),
  ADD KEY `EventoProfe_idx` (`matricula_profesor`);

--
-- Indices de la tabla `notasalumno`
--
ALTER TABLE `notasalumno`
  ADD PRIMARY KEY (`idNotasAlumno`),
  ADD KEY `notaalumno_matricula_idx` (`matricula_alumno`);

--
-- Indices de la tabla `notasprofesor`
--
ALTER TABLE `notasprofesor`
  ADD PRIMARY KEY (`idNotasProfesor`),
  ADD KEY `NotaProfe_matprofe_idx` (`matricula_profesor`);

--
-- Indices de la tabla `notificacion_alumno`
--
ALTER TABLE `notificacion_alumno`
  ADD PRIMARY KEY (`idNotificacion_Alumno`),
  ADD KEY `notificacion_mat_alumno_idx` (`matricula_alumno`);

--
-- Indices de la tabla `notificacion_profesor`
--
ALTER TABLE `notificacion_profesor`
  ADD PRIMARY KEY (`idNotificacion_Profesor`),
  ADD KEY `profemat_notificacion_idx` (`matricula_profesor`);

--
-- Indices de la tabla `perfil_alumno`
--
ALTER TABLE `perfil_alumno`
  ADD PRIMARY KEY (`idperfil_alumno`),
  ADD KEY `perfil_mat_alum_idx` (`matricula_alumno`);

--
-- Indices de la tabla `perfil_profesor`
--
ALTER TABLE `perfil_profesor`
  ADD PRIMARY KEY (`idperfil_profesor`),
  ADD KEY `perfil_mat_profe_idx` (`matricula_profesor`);

--
-- Indices de la tabla `preguntasactividad`
--
ALTER TABLE `preguntasactividad`
  ADD PRIMARY KEY (`idPreguntasActividad`),
  ADD KEY `IdActividadesPregunta_idx` (`idActividades`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`matricula_profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividadentregar`
--
ALTER TABLE `actividadentregar`
  MODIFY `idActividadEntregada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clase_alumno_profesor`
--
ALTER TABLE `clase_alumno_profesor`
  MODIFY `idClase_Alumno_Profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `eventosalumno`
--
ALTER TABLE `eventosalumno`
  MODIFY `idEventosActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventosprofesor`
--
ALTER TABLE `eventosprofesor`
  MODIFY `idEventosActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `notificacion_alumno`
--
ALTER TABLE `notificacion_alumno`
  MODIFY `idNotificacion_Alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notificacion_profesor`
--
ALTER TABLE `notificacion_profesor`
  MODIFY `idNotificacion_Profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `perfil_alumno`
--
ALTER TABLE `perfil_alumno`
  MODIFY `idperfil_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `perfil_profesor`
--
ALTER TABLE `perfil_profesor`
  MODIFY `idperfil_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `preguntasactividad`
--
ALTER TABLE `preguntasactividad`
  MODIFY `idPreguntasActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividadclaseprofesor`
--
ALTER TABLE `actividadclaseprofesor`
  ADD CONSTRAINT `ActividadesDeActividades` FOREIGN KEY (`idActividades`) REFERENCES `actividades` (`idActividades`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CodigoDeClaseProfesor` FOREIGN KEY (`codigoclase`) REFERENCES `claseprofesor` (`codigoclase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `actividadentregar`
--
ALTER TABLE `actividadentregar`
  ADD CONSTRAINT `ActClaseProfeID` FOREIGN KEY (`idActividadClaseProfesor`) REFERENCES `actividadclaseprofesor` (`idActividadClaseProfesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matalumnoentregada` FOREIGN KEY (`matricula_alumno`) REFERENCES `alumnos` (`matricula_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `claseprofesor`
--
ALTER TABLE `claseprofesor`
  ADD CONSTRAINT `ClaseProfeMatricula` FOREIGN KEY (`matricula_profesor`) REFERENCES `profesores` (`matricula_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase_alumno_profesor`
--
ALTER TABLE `clase_alumno_profesor`
  ADD CONSTRAINT `clasealum_matricula` FOREIGN KEY (`matricula_alumno`) REFERENCES `alumnos` (`matricula_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `codigoclaseprofesor` FOREIGN KEY (`codigoclase`) REFERENCES `claseprofesor` (`codigoclase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventosalumno`
--
ALTER TABLE `eventosalumno`
  ADD CONSTRAINT `eventoalumno` FOREIGN KEY (`matricula_alumno`) REFERENCES `alumnos` (`matricula_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventosprofesor`
--
ALTER TABLE `eventosprofesor`
  ADD CONSTRAINT `EventoProfe` FOREIGN KEY (`matricula_profesor`) REFERENCES `profesores` (`matricula_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notasalumno`
--
ALTER TABLE `notasalumno`
  ADD CONSTRAINT `notaalumno_matricula` FOREIGN KEY (`matricula_alumno`) REFERENCES `alumnos` (`matricula_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notasprofesor`
--
ALTER TABLE `notasprofesor`
  ADD CONSTRAINT `NotaProfe_matprofe` FOREIGN KEY (`matricula_profesor`) REFERENCES `profesores` (`matricula_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacion_alumno`
--
ALTER TABLE `notificacion_alumno`
  ADD CONSTRAINT `notificacion_mat_alumno` FOREIGN KEY (`matricula_alumno`) REFERENCES `alumnos` (`matricula_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacion_profesor`
--
ALTER TABLE `notificacion_profesor`
  ADD CONSTRAINT `profemat_notificacion` FOREIGN KEY (`matricula_profesor`) REFERENCES `profesores` (`matricula_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil_alumno`
--
ALTER TABLE `perfil_alumno`
  ADD CONSTRAINT `perfil_mat_alum` FOREIGN KEY (`matricula_alumno`) REFERENCES `alumnos` (`matricula_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil_profesor`
--
ALTER TABLE `perfil_profesor`
  ADD CONSTRAINT `perfil_mat_profe` FOREIGN KEY (`matricula_profesor`) REFERENCES `profesores` (`matricula_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntasactividad`
--
ALTER TABLE `preguntasactividad`
  ADD CONSTRAINT `IdActividadesPregunta` FOREIGN KEY (`idActividades`) REFERENCES `actividades` (`idActividades`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
