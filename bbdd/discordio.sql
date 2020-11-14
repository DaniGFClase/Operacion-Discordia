-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-11-2020 a las 19:17:01
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
-- Estructura de tabla para la tabla `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE IF NOT EXISTS `friend` (
  `userA` int(11) NOT NULL,
  `userB` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`userA`,`userB`),
  KEY `userA` (`userA`),
  KEY `userB` (`userB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `friend`
--

INSERT INTO `friend` (`userA`, `userB`, `status`) VALUES
(1, 3, 0),
(1, 17, 1),
(17, 1, 1),
(17, 3, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

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
(48, 1, 'prueba multiiii', '2020-11-08 13:47:46', '1-17'),
(49, 1, 'asdfasdf test', '2020-11-11 15:17:49', '1-3'),
(50, 1, ', ', '2020-11-11 15:28:57', '1-17'),
(51, 1, ', asdfadsf', '2020-11-11 15:35:53', '1-18'),
(52, 1, ', test', '2020-11-11 15:36:04', '1-18'),
(53, 1, ', afafa', '2020-11-11 15:36:09', '1-18'),
(54, 1, 'que pasa dani!!', '2020-11-11 15:37:09', '1-3'),
(55, 1, 'que pasaaaaaa', '2020-11-11 15:37:27', '1-3'),
(56, 1, 'que pasaaaaaa', '2020-11-11 15:37:29', '1-3'),
(57, 1, 'que pasaaaaaa', '2020-11-11 15:37:31', '1-3'),
(58, 1, 'que pasaaaaaa', '2020-11-11 15:38:21', '1-3'),
(59, 1, 'toro', '2020-11-11 15:38:29', '1-4'),
(60, 1, '', '2020-11-11 15:38:31', '1-4'),
(61, 1, '', '2020-11-11 15:39:00', '1-4'),
(62, 1, 'asdfasdf', '2020-11-11 15:39:44', 'GRUPO1'),
(63, 1, 'asdfasdf', '2020-11-11 15:39:45', 'GRUPO1'),
(64, 1, 'test', '2020-11-11 15:40:30', '1-17'),
(65, 17, 'hola', '2020-11-11 15:40:48', '1-17'),
(66, 1, 'asdfasdf', '2020-11-11 15:41:18', '1-17'),
(67, 1, 'asdfasdf', '2020-11-11 15:41:19', '1-17'),
(68, 1, 'asdfasdf', '2020-11-11 15:41:20', '1-17'),
(69, 1, 'asdf', '2020-11-11 22:23:34', '1-3'),
(70, 1, '', '2020-11-11 22:24:25', 'truÃ±o grupo'),
(71, 1, 'asdf', '2020-11-11 22:24:58', 'truÃ±o grupo2'),
(72, 1, 'asdf', '2020-11-11 22:25:52', 'no se'),
(73, 1, 'asdf', '2020-11-11 22:27:50', 'nose'),
(74, 1, 'asdf', '2020-11-11 22:38:46', 'nose2'),
(75, 1, 'asdf', '2020-11-11 22:43:42', 'nose23'),
(76, 1, 'asdf', '2020-11-11 22:45:09', 'noseasdf2'),
(77, 1, 'asdf', '2020-11-11 22:46:01', 'nose2456'),
(78, 1, 'asdf', '2020-11-11 22:47:19', '12345'),
(79, 1, 'asdf', '2020-11-11 22:58:38', 'grupo caca23');

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
('12345', 'default_group.jpg'),
('1234s5', 'default_group.jpg'),
('12sdf34s5', 'default_group.jpg'),
('3-17', ''),
('3-4', ''),
('4-17', ''),
('grupo caca', 'default_group.jpg'),
('grupo caca2', 'default_group.jpg'),
('grupo caca23', 'default_group.jpg'),
('GRUPO1', 'group_default.jpg'),
('no se', 'default_group.jpg'),
('nose', 'default_group.jpg'),
('nose2', 'default_group.jpg'),
('nose23', 'default_group.jpg'),
('nose2456', 'default_group.jpg'),
('noseasdf2', 'default_group.jpg'),
('sasdfsasdsss', 'default_group.jpg'),
('sasdfssss', 'default_group.jpg'),
('sss', 'default_group.jpg'),
('ssss', 'default_group.jpg'),
('truÃ±o grupo', 'default_group.jpg'),
('truÃ±o grupo2', 'default_group.jpg');

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
(3, '', '', 'dani', 'dani', 'dani.jpg', '$2y$10$qfpYSsjvATEUv9nzxzdcZO3P.Z4SvNLxNR.N2UEIdLdvFr9kXdS6i', '', ''),
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
  `view` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_user`,`cod_room`),
  KEY `cod_user` (`cod_user`),
  KEY `cor_room` (`cod_room`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_room`
--

INSERT INTO `user_room` (`cod_user`, `cod_room`, `view`) VALUES
(1, '1-17', 0),
(1, '1-18', 0),
(1, '1-3', 0),
(1, '1-4', 0),
(1, 'grupo caca', 1),
(1, 'grupo caca2', 1),
(1, 'grupo caca23', 1),
(1, 'GRUPO1', 0),
(3, '1-3', 0),
(3, '3-17', 1),
(3, '3-4', 0),
(3, 'grupo caca2', 0),
(3, 'grupo caca23', 0),
(4, '1-4', 0),
(4, '3-4', 0),
(4, '4-17', 0),
(4, 'grupo caca23', 0),
(4, 'GRUPO1', 0),
(17, '1-17', 0),
(17, 'GRUPO1', 0),
(17, 'nose23', 0),
(18, '1-18', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`userA`) REFERENCES `user` (`cod_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friend_ibfk_2` FOREIGN KEY (`userB`) REFERENCES `user` (`cod_user`) ON DELETE CASCADE ON UPDATE CASCADE;

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
