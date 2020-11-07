-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-11-2020 a las 13:55:09
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
  `cod_room` int(11) NOT NULL,
  PRIMARY KEY (`cod_message`),
  KEY `cod_room` (`cod_room`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`cod_message`, `cod_user`, `text_message`, `date_message`, `cod_room`) VALUES
(2, 1, 'que pasa loco', '2020-11-07 14:08:06', 1),
(3, 2, 'eyyyyyy', '2020-11-07 14:08:38', 1),
(4, 1, 'mataaaa', '2020-11-07 14:22:33', 2),
(5, 4, 'banderita de españa', '2020-11-07 14:22:51', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `cod_room` int(11) NOT NULL AUTO_INCREMENT,
  `name_room` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_room`),
  KEY `cod_room` (`cod_room`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `room`
--

INSERT INTO `room` (`cod_room`, `name_room`) VALUES
(1, ''),
(2, '');

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
  `gender` varchar(5) NOT NULL,
  PRIMARY KEY (`cod_user`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `mail` (`mail`),
  KEY `cod_user` (`cod_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`cod_user`, `name`, `surname`, `nick`, `mail`, `photo`, `password_hash`, `description`, `gender`) VALUES
(1, '', '', 'adri', 'adri', '', '1234', '', ''),
(3, '', '', 'dani', 'dani', '', '1234', '', ''),
(4, '', '', 'toros', 'toros', '', '1234', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_room`
--

DROP TABLE IF EXISTS `user_room`;
CREATE TABLE IF NOT EXISTS `user_room` (
  `cod_user` int(11) NOT NULL,
  `cod_room` int(11) NOT NULL,
  PRIMARY KEY (`cod_user`,`cod_room`),
  KEY `cod_user` (`cod_user`),
  KEY `cor_room` (`cod_room`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_room`
--

INSERT INTO `user_room` (`cod_user`, `cod_room`) VALUES
(1, 1),
(1, 2),
(3, 1),
(4, 2);

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
