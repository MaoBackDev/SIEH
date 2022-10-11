-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2021 a las 22:02:25
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sieh`
--
CREATE DATABASE IF NOT EXISTS `sieh` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sieh`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `prc_obtenerHorasMesActual`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_obtenerHorasMesActual` ()  BEGIN
SELECT fechaVuelo,
   sum(round(cantidadHora))
FROM vuelo 
WHERE date(fechaVuelo)>=date(last_day(now() - 		INTERVAL 1 month) + INTERVAL 1 day)
AND date(fechaVuelo)<= 				  	last_day(date(CURRENT_DATE)) group by fechaVuelo;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeronaves`
--

DROP TABLE IF EXISTS `aeronaves`;
CREATE TABLE `aeronaves` (
  `idAeronave` int(11) NOT NULL,
  `matricula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipoAeronave` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aeronaves`
--

INSERT INTO `aeronaves` (`idAeronave`, `matricula`, `tipoAeronave`, `estado`) VALUES
(1, 'mb-01', 'UH-N1', 'Disponible'),
(2, 'MB-02', 'UH-60', 'Disponible'),
(3, 'MB-03', 'UH-1HII', 'No Disponible'),
(4, 'MB-04', 'MI-17', 'Disponible'),
(5, 'MB-05', 'CASA-212', 'No Disponible'),
(6, 'MB-06', 'ANTONOV', 'Disponible'),
(7, 'MB-07', 'CESSNA-206', 'No Disponible'),
(8, 'MB-08', 'CARAVAN', 'Disponible'),
(9, 'MB-09', 'MI-17', 'No Disponible'),
(10, 'MB-10', 'ANTONOV', 'Disponible'),
(11, 'MB-11', 'UH-60', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_vuelo`
--

DROP TABLE IF EXISTS `cargo_vuelo`;
CREATE TABLE `cargo_vuelo` (
  `idCargo` int(11) NOT NULL,
  `nombreCargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `abreCargo_vuelo` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo_vuelo`
--

INSERT INTO `cargo_vuelo` (`idCargo`, `nombreCargo`, `abreCargo_vuelo`) VALUES
(1, 'Tripulante de Vuelo', 'TV'),
(2, 'Jefe de Tripulación', 'JT'),
(3, 'Instructor de Tripulantes', 'IT'),
(4, 'Estandarizador de Tripulantes', 'ET'),
(5, 'Piloto', 'P'),
(6, 'Piloto al Mando', 'PAM'),
(7, 'Piloto Instructor', 'PI'),
(8, 'Piloto Estandarizador', 'PE'),
(9, 'Piloto de Prueba de Mantenimiento', 'PPM'),
(10, 'Evaluador de Mantenimiento', 'EM'),
(11, 'Observador Aereo', 'OA'),
(12, 'Copiloto', 'CP'),
(13, 'Comandante de Misión Aerea', 'CMA'),
(14, 'Jefe de Equipo de Rescate', 'JER'),
(15, 'Rescatista Militar', 'RM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `abrCategoria` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `abrCategoria`) VALUES
(1, 'Categoría Vuelo uno', 'CAV1'),
(2, 'Categoría Vuelo dos', 'CAV2'),
(3, 'Categoría Vuelo tres', 'CAV3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion_vuelo`
--

DROP TABLE IF EXISTS `condicion_vuelo`;
CREATE TABLE `condicion_vuelo` (
  `idCondicion` int(11) NOT NULL,
  `nombreCondicion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `abreCondicion_vuelo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `condicion_vuelo`
--

INSERT INTO `condicion_vuelo` (`idCondicion`, `nombreCondicion`, `abreCondicion_vuelo`) VALUES
(1, 'Diurno', 'D'),
(2, 'Nocturno', 'N'),
(3, 'Lentes de visión nocturna', 'LVN'),
(4, 'Instrumental Flight Rules', 'IFR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL,
  `nombreGrado` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `abreGrado` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idGrado`, `nombreGrado`, `abreGrado`) VALUES
(1, 'Cabo Tercero', 'C3'),
(2, 'Cabo Segundo', 'CS'),
(3, 'Cabo Primero', 'CP'),
(4, 'Sargento Segundo', 'SS'),
(5, 'Sargento Viceprimero', 'SV'),
(6, 'Sargento Primero', 'SP'),
(7, 'Sargento Mayor', 'SM'),
(8, 'Sargento Mayor de Comando', 'SMC'),
(9, 'Sub-Teniente', 'ST'),
(10, 'Teniente Efectivo', 'TE'),
(11, 'Capitan', 'CT'),
(12, 'Mayor', 'MY'),
(13, 'Teniente Coronel', 'TC'),
(14, 'Coronel', 'CR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misiones`
--

DROP TABLE IF EXISTS `misiones`;
CREATE TABLE `misiones` (
  `idMision` int(11) NOT NULL,
  `tipo_mision` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `misiones`
--

INSERT INTO `misiones` (`idMision`, `tipo_mision`, `codigo`) VALUES
(1, 'Operaciones', 'OP'),
(2, 'Mantenimiento', 'MTO'),
(3, 'Entrenamiento', 'ENT'),
(4, 'Instrucción', 'INST'),
(5, 'Inserción Aérea', 'IA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tripulante`
--

DROP TABLE IF EXISTS `tripulante`;
CREATE TABLE `tripulante` (
  `idTripulante` int(11) NOT NULL,
  `documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_militar` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_promocion` date NOT NULL,
  `certificado_medico` date NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_categoria` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tripulante`
--

INSERT INTO `tripulante` (`idTripulante`, `documento`, `codigo_militar`, `apellidos`, `nombres`, `correo`, `clave`, `fecha_nacimiento`, `fecha_promocion`, `certificado_medico`, `rol`, `estado`, `id_categoria`, `id_grado`, `foto`) VALUES
(54, '1080014092', '1080014092', 'Fontalvo', 'Hellen', 'hellensofia@correo.com', '21OZ4/WxREgV.', '2000-02-21', '2020-03-12', '2021-12-02', 'Administrador', 1, 1, 2, 'Views/img/img_tripulantes/1080014092/919.jpg'),
(57, '79979947', '79979947', 'Beltrán', 'Diego', 'beltran12@gmail.com', 'eeIjK9z6V1GL6', '1990-12-12', '2010-12-12', '2021-11-27', 'Usuario', 1, 1, 3, 'Views/img/img_tripulantes/79979947/206.jpg'),
(58, '39411195', '39411195', 'Gamboa', 'Alexander', 'gamboa@correo.com', 'eeIjK9z6V1GL6', '2000-10-20', '2018-10-20', '2021-08-05', 'Usuario', 1, 1, 1, 'Views/img/img_tripulantes/39411195/262.jpg'),
(59, '1220221273', '1220221273', 'Monsalvo', 'Ivan', 'ivan@correo.com', 'eeIjK9z6V1GL6', '1989-11-30', '1999-12-12', '2021-11-11', 'Usuario', 0, 2, 9, 'Views/img/img_tripulantes/1220221273/753.png'),
(70, '1027945031', '1027945031', 'Arrieta', 'Jaiber', 'maoguevara.2410@gmail.com', '21OZ4/WxREgV.', '1986-10-24', '2005-10-24', '2020-12-18', 'Administrador', 1, 3, 12, 'Views/img/img_tripulantes/1027945031/901.jpg'),
(74, '39425190', '39425190', 'Sanchez', 'Edinson', 'sanchez@correo.com', 'eeIjK9z6V1GL6', '1970-11-22', '1986-11-22', '2020-12-08', 'Usuario', 1, 2, 8, 'Views/img/img_tripulantes/39425190/742.jpg'),
(75, '11989989', '11989989', 'Murillo', 'Rolando', 'roland0@correo.com', 'eeIjK9z6V1GL6', '1979-09-23', '2000-06-23', '2021-11-19', 'Usuario', 0, 1, 5, 'Views/img/img_tripulantes/11989989/590.jpg'),
(76, '79748790', '79748790', 'Rodriguez', 'Fabián', 'rodri@correo.com', 'eeIjK9z6V1GL6', '1980-12-30', '2000-12-30', '2021-11-10', 'Administrador', 1, 2, 11, 'Views/img/img_tripulantes/79748790/558.jpg'),
(90, '1098567890', '1098567890', 'Jorge ', 'Chaves ', 'jorge@send.com', 'eeIjK9z6V1GL6', '1987-03-21', '2005-09-06', '2021-11-02', 'Usuario', 1, 2, 9, 'Views/img/img_tripulantes/1098567890/307.jpg'),
(91, '1080114089', '1080114089', 'Fontalvo', 'Rosa', 'rosa@correo.com', 'eeIjK9z6V1GL6', '1989-01-27', '2009-01-27', '2021-11-18', 'Usuario', 1, 1, 11, 'Views/img/img_tripulantes/1080114089/816.jpg'),
(92, '789654', '789654', 'Ramirez', 'Ingrid', 'ingrid@correo.com', '21OZ4/WxREgV.', '2021-11-03', '2021-11-10', '2021-11-24', 'Administrador', 1, 3, 14, 'Views/img/img_tripulantes/789654/533.jpg'),
(93, '1110945031', '1110945031', 'Navarro', 'Julián', 'julian@correo.com', 'eeIjK9z6V1GL6', '2000-11-02', '2018-11-02', '2021-11-19', 'Usuario', 1, 1, 1, 'Views/img/img_tripulantes/1110945031/227.jpg'),
(94, '1080498790', '1080498790', 'Garzón', 'Manuel', 'garzon@correo.com', 'eeIjK9z6V1GL6', '1996-07-30', '2016-07-30', '2021-11-24', 'Usuario', 1, 2, 2, 'Views/img/img_tripulantes/1080498790/782.jpg'),
(95, '799799476', '799799476', 'Romero', 'José', 'pruebaeditar@correo.com', 'eeIjK9z6V1GL6', '2021-11-03', '2021-11-01', '2021-11-26', 'Usuario', 1, 2, 4, 'Views/img/img_tripulantes/799799476/385.jpg'),
(96, '300456789', '300456789', 'Suarez', 'Patricia', 'suarez@correo.com', 'eeIjK9z6V1GL6', '1997-10-15', '2006-06-07', '2021-11-15', 'Usuario', 1, 3, 4, ''),
(97, '1110456789', '1110456789', 'Zamora', 'Daniel', 'daniel@correo.com', 'eeIjK9z6V1GL6', '1997-06-20', '2008-06-06', '2021-12-04', 'Usuario', 1, 2, 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

DROP TABLE IF EXISTS `vuelo`;
CREATE TABLE `vuelo` (
  `idVuelo` int(11) NOT NULL,
  `ordenVuelo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idAeronave` int(11) NOT NULL,
  `fechaVuelo` date NOT NULL,
  `idMision` int(11) NOT NULL,
  `idCondicion` int(11) NOT NULL,
  `idTripulante` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `cantidadHora` float DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`idVuelo`, `ordenVuelo`, `idAeronave`, `fechaVuelo`, `idMision`, `idCondicion`, `idTripulante`, `idCargo`, `hora_inicio`, `hora_final`, `cantidadHora`, `observaciones`) VALUES
(6, 'OV-029', 4, '2021-11-16', 2, 3, 58, 12, '05:26:00', '08:30:00', 3.07, ''),
(7, 'OV-001', 3, '2021-11-09', 3, 2, 70, 5, '06:40:00', '10:45:00', 4.1, ''),
(9, 'OV-002', 4, '2020-12-02', 2, 3, 58, 1, '19:39:00', '23:40:00', 4, 'Se registra daño en lente derecho  LVN. Serial # 12345'),
(11, 'OV-003', 5, '2021-11-02', 1, 4, 58, 12, '15:23:00', '19:29:00', 4.1, ''),
(12, 'OV-005', 8, '2021-11-17', 3, 1, 70, 11, '05:52:00', '08:52:00', 3, ''),
(13, 'OV-009', 6, '2021-11-20', 4, 2, 70, 5, '19:28:00', '23:28:00', 4, ''),
(14, 'OV-010', 4, '2021-11-20', 2, 1, 70, 6, '06:15:00', '13:13:00', 7, ''),
(15, 'OV-011', 7, '2021-11-20', 1, 1, 70, 7, '05:42:00', '09:42:00', 4, ''),
(16, 'OV-012', 9, '2021-11-21', 5, 1, 70, 5, '04:22:00', '09:22:00', 5, ''),
(17, 'OV-015', 9, '2021-11-22', 2, 1, 70, 11, '07:33:00', '11:33:00', 4, ''),
(18, 'OV-001', 5, '2021-11-01', 3, 2, 90, 15, '20:19:00', '23:19:00', 3, ''),
(20, 'OV-014', 5, '2021-10-11', 2, 1, 70, 3, '05:36:00', '09:37:00', 4, ''),
(21, 'OV-016', 6, '2021-11-27', 4, 1, 70, 11, '07:02:00', '00:00:00', 4.1, ''),
(22, 'OV-023', 2, '2021-11-28', 1, 2, 70, 11, '19:50:00', '23:49:00', 4, ''),
(23, 'ov-001-456', 7, '2021-12-01', 1, 1, 58, 1, '03:42:00', '06:10:00', 2.5, ''),
(24, 'OV-2021-02', 9, '2021-12-02', 4, 1, 70, 3, '04:15:00', '07:40:00', 3.4, 'Se toman medidas de corrección con respecto a los tripulantes alumnos. '),
(25, 'OV-2021-12', 11, '2021-12-01', 1, 1, 70, 13, '09:21:00', '13:22:00', 4, 'Hostigamiento por el enemigo.'),
(31, 'OV-009-2021', 2, '2021-12-01', 2, 4, 70, 13, '14:50:00', '17:50:00', 3, ''),
(32, 'OV-005-20212', 9, '2021-12-05', 4, 1, 58, 2, '18:29:00', '20:30:00', 2, 'Se realizó el vuelo sin novedades'),
(35, 'OV-010-9807', 11, '2021-12-06', 4, 2, 90, 15, '19:34:00', '23:35:00', 4, ''),
(36, 'OV-001-8645657', 7, '2021-12-02', 1, 2, 54, 1, '23:39:00', '14:39:00', 15, ''),
(37, 'OV-009-5665566', 7, '2021-12-05', 4, 1, 54, 15, '11:40:00', '14:46:00', 3.1, ''),
(39, 'OV-002-9877', 3, '2021-12-06', 1, 2, 70, 11, '18:25:00', '22:26:00', 4, ''),
(40, 'OV-010-876567', 10, '2021-12-07', 1, 1, 58, 15, '10:39:00', '13:39:00', 3, 'Se prestan los primeros auxilios al soldado evacuado.'),
(41, 'OV-001-345', 3, '2021-12-07', 2, 2, 57, 15, '19:05:00', '23:05:00', 4, ''),
(42, 'OV-003-5676', 9, '2021-12-05', 1, 3, 57, 4, '16:06:00', '20:06:00', 4, 'Se registra contacto enemigo.'),
(43, 'OV-003-768', 8, '2021-12-03', 4, 4, 76, 12, '07:21:00', '10:20:00', 3, ''),
(44, 'OV-005-098', 2, '2021-12-04', 2, 1, 76, 12, '13:22:00', '17:22:00', 4, ''),
(45, 'OV-009-77654', 4, '2021-12-07', 3, 3, 76, 6, '20:30:00', '23:24:00', 2.9, ''),
(46, 'OV-003-765677', 10, '2021-12-03', 4, 4, 58, 11, '11:27:00', '16:27:00', 5, ''),
(47, 'OV-009-098-087', 3, '2021-12-04', 1, 4, 54, 14, '15:30:00', '17:30:00', 2, ''),
(48, 'OV-005-89', 6, '2021-12-02', 1, 2, 97, 1, '23:37:00', '03:20:00', 3.7, ''),
(49, 'OV-002-7866887', 6, '2021-12-06', 1, 4, 57, 7, '06:56:00', '09:20:00', 2.4, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aeronaves`
--
ALTER TABLE `aeronaves`
  ADD PRIMARY KEY (`idAeronave`);

--
-- Indices de la tabla `cargo_vuelo`
--
ALTER TABLE `cargo_vuelo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `condicion_vuelo`
--
ALTER TABLE `condicion_vuelo`
  ADD PRIMARY KEY (`idCondicion`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `misiones`
--
ALTER TABLE `misiones`
  ADD PRIMARY KEY (`idMision`);

--
-- Indices de la tabla `tripulante`
--
ALTER TABLE `tripulante`
  ADD PRIMARY KEY (`idTripulante`),
  ADD KEY `idCategoria` (`id_categoria`),
  ADD KEY `idGrado` (`id_grado`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`idVuelo`),
  ADD KEY `idCondicion` (`idCondicion`),
  ADD KEY `idAeronave` (`idAeronave`),
  ADD KEY `id_mision` (`idMision`),
  ADD KEY `id_tripulante` (`idTripulante`),
  ADD KEY `idCargo` (`idCargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aeronaves`
--
ALTER TABLE `aeronaves`
  MODIFY `idAeronave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cargo_vuelo`
--
ALTER TABLE `cargo_vuelo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `condicion_vuelo`
--
ALTER TABLE `condicion_vuelo`
  MODIFY `idCondicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `misiones`
--
ALTER TABLE `misiones`
  MODIFY `idMision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tripulante`
--
ALTER TABLE `tripulante`
  MODIFY `idTripulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `idVuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tripulante`
--
ALTER TABLE `tripulante`
  ADD CONSTRAINT `tripulante_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `tripulante_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`idGrado`);

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_2` FOREIGN KEY (`idCondicion`) REFERENCES `condicion_vuelo` (`idCondicion`),
  ADD CONSTRAINT `vuelo_ibfk_4` FOREIGN KEY (`idAeronave`) REFERENCES `aeronaves` (`idAeronave`),
  ADD CONSTRAINT `vuelo_ibfk_5` FOREIGN KEY (`idMision`) REFERENCES `misiones` (`idMision`),
  ADD CONSTRAINT `vuelo_ibfk_6` FOREIGN KEY (`idTripulante`) REFERENCES `tripulante` (`idTripulante`),
  ADD CONSTRAINT `vuelo_ibfk_7` FOREIGN KEY (`idCargo`) REFERENCES `cargo_vuelo` (`idCargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
