-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-11-2020 a las 21:56:08
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `discordio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `cod_message` int(11) NOT NULL AUTO_INCREMENT,
  `cod_user` int(11) NOT NULL,
  `text_message` varchar(250) NOT NULL,
  `date_message` datetime NOT NULL DEFAULT current_timestamp(),
  `cod_room` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_message`),
  KEY `cod_room` (`cod_room`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`cod_message`, `cod_user`, `text_message`, `date_message`, `cod_room`) VALUES
(7, 4, 'aluhabag', '2020-11-07 20:03:53', '4-17'),
(8, 4, 'qwer', '2020-11-07 20:05:40', '4-17'),
(9, 17, 'te exploto payaso', '2020-11-07 20:06:37', '4-17'),
(10, 3, 'que passa', '2020-11-08 12:06:30', '3-4'),
(11, 4, 'po aquí andamios', '2020-11-08 12:06:47', '3-4'),
(12, 17, 'se va a liar', '2020-11-08 12:15:36', '4-17'),
(13, 4, 'nah, que va', '2020-11-08 12:16:00', '4-17'),
(14, 17, 'esto parece que funsiona', '2020-11-08 12:24:51', '4-17'),
(16, 18, 'soy tu DJ', '2020-11-08 12:30:04', '1-18'),
(18, 1, 'daniiiii', '2020-11-08 12:31:13', '1-3'),
(19, 3, 'dime adri', '2020-11-08 12:31:43', '1-3'),
(26, 17, 'prueba multi', '2020-11-08 13:43:50', '4-17'),
(47, 1, 'prueba multiiii', '2020-11-08 13:47:46', '1-4'),
(48, 1, 'prueba multiiii', '2020-11-08 13:47:46', '1-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `cod_room` varchar(50) NOT NULL,
  `img_room` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_room`),
  KEY `cod_room` (`cod_room`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `room`
--

INSERT INTO `room` (`cod_room`, `img_room`) VALUES
('1-17', ''),
('1-18', ''),
('1-3', ''),
('1-4', ''),
('3-17', ''),
('3-4', ''),
('4-17', ''),
('GRUPO1', 'group_default.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `cod_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `password_hash` varchar(80) NOT NULL,
  `description` varchar(250) NOT NULL,
  `gender` varchar(6) NOT NULL,
  PRIMARY KEY (`cod_user`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `mail` (`mail`),
  KEY `cod_user` (`cod_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`cod_user`, `name`, `surname`, `nick`, `mail`, `photo`, `password_hash`, `description`, `gender`) VALUES
(1, '', '', 'adri', 'adri', 'default.png', '$2y$10$qfpYSsjvATEUv9nzxzdcZO3P.Z4SvNLxNR.N2UEIdLdvFr9kXdS6i', '', ''),
(3, '', '', 'dani', 'dani', '', '$2y$10$qfpYSsjvATEUv9nzxzdcZO3P.Z4SvNLxNR.N2UEIdLdvFr9kXdS6i', '', ''),
(4, '', '', 'toros', 'toros', '', '1234', '', ''),
(17, 'Ruba', 'Bum', 'Ruba', 'alÃ±skdjf', '', '$2y$10$3q1ZS03zXzHuPImB3lWrlOT1b1Y4mWJtR6soeLydpDgK7YXTfzW9e', '', 'female'),
(18, 'asdf', 'asdf', 'Rober', 'asdasdfasdasdasf', '', '$2y$10$cg8qevehkZ5wmIUJmf2jNuvQdRVSpYIPfmWCu7.i6WX5RtH28zD4y', '', 'male');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_room`
--

DROP TABLE IF EXISTS `user_room`;
CREATE TABLE IF NOT EXISTS `user_room` (
  `cod_user` int(11) NOT NULL,
  `cod_room` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_user`,`cod_room`),
  KEY `cod_user` (`cod_user`),
  KEY `cor_room` (`cod_room`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_room`
--

INSERT INTO `user_room` (`cod_user`, `cod_room`) VALUES
(1, '1-17'),
(1, '1-18'),
(1, '1-3'),
(1, '1-4'),
(1, 'GRUPO1'),
(3, '1-3'),
(3, '3-17'),
(3, '3-4'),
(4, '1-4'),
(4, '3-4'),
(4, '4-17'),
(4, 'GRUPO1'),
(17, '1-17'),
(17, 'GRUPO1'),
(18, '1-18');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`cod_room`) REFERENCES `room` (`cod_room`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_room`
--
ALTER TABLE `user_room`
  ADD CONSTRAINT `user_room_ibfk_1` FOREIGN KEY (`cod_user`) REFERENCES `user` (`cod_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_room_ibfk_2` FOREIGN KEY (`cod_room`) REFERENCES `room` (`cod_room`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
