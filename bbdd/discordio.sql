-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-11-2020 a las 17:21:51
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
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`userA`,`userB`),
  KEY `userA` (`userA`),
  KEY `userB` (`userB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `friend`
--

INSERT INTO `friend` (`userA`, `userB`, `status`, `code`) VALUES
(1, 3, 1, '1-3'),
(1, 20, 1, '1-20'),
(3, 1, 1, '1-3'),
(3, 20, 1, '3-20'),
(20, 1, 1, '1-20'),
(20, 3, 1, '3-20');

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
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;

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
(49, 1, 'asdfasdf test', '2020-11-11 15:17:49', '1-3'),
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
(69, 1, 'asdf', '2020-11-11 22:23:34', '1-3'),
(71, 1, 'asdf', '2020-11-11 22:24:58', 'truÃ±o grupo2'),
(72, 1, 'asdf', '2020-11-11 22:25:52', 'no se'),
(73, 1, 'asdf', '2020-11-11 22:27:50', 'nose'),
(74, 1, 'asdf', '2020-11-11 22:38:46', 'nose2'),
(78, 1, 'asdf', '2020-11-11 22:47:19', '12345'),
(79, 1, 'asdf', '2020-11-11 22:58:38', 'grupo caca23'),
(80, 1, 'malvado soy', '2020-11-14 20:18:36', '1-3'),
(81, 1, 'asdfasdf', '2020-11-14 20:18:45', '1-3'),
(82, 3, 'safasdf', '2020-11-14 20:19:05', '1-3'),
(83, 3, 'soy malvado', '2020-11-14 20:19:36', '1-3'),
(84, 1, 'gfhj', '2020-11-14 23:10:20', '1-3'),
(85, 1, 'asdfasdf', '2020-11-15 03:13:44', '1-3'),
(86, 1, 'asdfas', '2020-11-15 04:08:36', '1-3'),
(87, 1, 'qwer', '2020-11-15 05:10:04', 'GRUPO1'),
(88, 1, 'sadfasdf', '2020-11-15 05:10:08', 'GRUPO1'),
(89, 1, 'que pasa loco', '2020-11-15 05:10:13', 'GRUPO1'),
(90, 17, 'asdfasdf', '2020-11-15 05:10:50', 'GRUPO1'),
(91, 1, 'ostia que guapo', '2020-11-15 05:11:35', 'GRUPO1'),
(92, 1, 'ostia que guapo', '2020-11-15 05:12:30', 'GRUPO1'),
(93, 1, 'ostia que guapo', '2020-11-15 05:13:39', 'GRUPO1'),
(94, 1, 'asdf', '2020-11-15 05:13:41', 'GRUPO1'),
(95, 17, 'sadf', '2020-11-15 05:13:47', 'GRUPO1'),
(96, 1, 'qqq', '2020-11-15 05:13:52', 'GRUPO1'),
(97, 17, 'asdf', '2020-11-15 05:14:21', 'GRUPO1'),
(101, 1, 'jhljk', '2020-11-15 12:20:02', 'grupo caca23'),
(102, 1, 'qqqq', '2020-11-15 12:20:08', 'grupo caca23'),
(103, 1, 'asdf', '2020-11-15 12:28:44', 'GRUPO1'),
(104, 1, 'fff', '2020-11-15 12:28:53', 'GRUPO1'),
(105, 1, 'qwer', '2020-11-15 12:46:42', '1-3'),
(106, 1, 'qqqqq', '2020-11-15 13:13:48', 'GRUPO1'),
(107, 1, 'qwerqwerqwer', '2020-11-15 13:13:59', 'grupo caca2'),
(111, 1, 'puto', '2020-11-15 13:18:18', 'grupo caca2'),
(112, 1, 'asdf', '2020-11-15 14:24:15', 'GRUPO1'),
(113, 1, 'qqq', '2020-11-15 14:24:32', 'grupo caca2'),
(114, 1, 'qwer', '2020-11-15 14:24:53', '1-3'),
(115, 1, 'jjjj', '2020-11-15 14:24:57', 'GRUPO1'),
(116, 1, 'toros', '2020-11-15 14:25:53', '1-4'),
(117, 1, 'test123', '2020-11-15 14:26:22', '1-4'),
(119, 1, 'qwer', '2020-11-15 14:27:21', '1-3'),
(120, 1, 'qqqq', '2020-11-15 14:27:58', 'GRUPO1'),
(121, 1, 'qqq', '2020-11-15 14:28:03', '1-3'),
(122, 1, 'qqqq', '2020-11-15 14:28:44', 'GRUPO1'),
(123, 1, '1234', '2020-11-15 14:34:08', '1-4'),
(125, 1, 'hola\n', '2020-11-15 14:36:28', 'grupo caca2'),
(126, 1, 'asdfasdf', '2020-11-15 14:37:23', 'GRUPO1'),
(127, 1, 'qqq', '2020-11-15 14:37:32', '1-3'),
(128, 1, 'eee', '2020-11-15 14:37:34', 'grupo caca2'),
(129, 1, 'asdf', '2020-11-15 14:37:58', 'GRUPO1'),
(131, 1, 'qwer', '2020-11-15 14:38:19', 'GRUPO1'),
(132, 1, 'asdf', '2020-11-15 14:46:22', 'grupo caca23'),
(133, 1, 'q', '2020-11-15 14:46:29', 'grupo caca23'),
(135, 1, '1', '2020-11-15 14:57:05', 'GRUPO1'),
(137, 1, 'asdf', '2020-11-15 14:57:29', '1-4'),
(138, 1, 'qwer', '2020-11-15 14:57:48', 'GRUPO1'),
(139, 1, 'adios', '2020-11-15 15:00:20', 'grupo caca2'),
(140, 1, 'asdfasdf', '2020-11-15 15:16:44', 'GRUPO1'),
(141, 1, 'q', '2020-11-15 15:16:50', '1-18'),
(142, 1, 'asdf', '2020-11-15 15:19:27', 'GRUPO1'),
(143, 1, 'asdf', '2020-11-15 15:20:21', '1-18'),
(144, 1, 'qqq', '2020-11-15 15:20:25', '1-18'),
(145, 1, 'hola', '2020-11-15 15:21:01', 'grupo caca23'),
(146, 1, 'qwer', '2020-11-15 15:21:48', 'GRUPO1'),
(147, 1, 'asdf', '2020-11-15 15:24:34', 'grupo caca23'),
(148, 1, 'jaja', '2020-11-15 16:08:26', 'GRUPO1'),
(149, 1, 'dfghfdgh', '2020-11-15 19:00:38', 'grupo caca23'),
(152, 1, 'dgmsdaglnsadf', '2020-11-15 20:43:44', 'grupo caca23'),
(153, 1, 'puto', '2020-11-15 20:43:47', 'grupo caca23'),
(154, 1, 'hola', '2020-11-15 20:44:00', 'grupo caca23'),
(155, 1, 'puto', '2020-11-15 20:44:06', 'grupo caca23'),
(162, 1, 'asdlÃ±kjasdf', '2020-11-15 20:59:27', 'grupo caca2'),
(195, 19, 'asdlfÃ±k', '2020-11-15 21:18:38', '19-1'),
(196, 19, 'yes baby', '2020-11-15 21:18:43', '19-1'),
(197, 1, 'ldfglkgdflkjgdf', '2020-11-16 21:36:34', '19-1'),
(198, 1, 'puto\n', '2020-11-16 21:36:48', '1-18'),
(209, 1, 'hoa', '2020-11-22 13:17:36', '1-17'),
(210, 1, 'asdf', '2020-11-22 14:29:22', '-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `cod_room` varchar(50) NOT NULL,
  `img_room` varchar(50) NOT NULL,
  `typeOfRoom` varchar(5) NOT NULL,
  PRIMARY KEY (`cod_room`),
  KEY `cod_room` (`cod_room`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `room`
--

INSERT INTO `room` (`cod_room`, `img_room`, `typeOfRoom`) VALUES
('-1', '', ''),
('1-17', '', 'chat'),
('1-18', '', 'chat'),
('1-3', '', 'chat'),
('1-4', '', 'chat'),
('12345', 'default_group.jpg', 'group'),
('1234s5', 'default_group.jpg', 'group'),
('12sdf34s5', 'default_group.jpg', 'group'),
('19-1', '', 'chat'),
('3-17', '', 'chat'),
('3-4', '', 'chat'),
('4-17', '', 'chat'),
('grupo caca', 'default_group.jpg', 'group'),
('grupo caca2', 'default_group.jpg', 'group'),
('grupo caca23', 'default_group.jpg', 'group'),
('GRUPO1', 'default_group.jpg', 'group'),
('no se', 'default_group.jpg', 'group'),
('nose', 'default_group.jpg', 'group'),
('nose2', 'default_group.jpg', 'group'),
('truÃ±o grupo2', 'default_group.jpg', 'group');

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
  `rol` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_user`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `mail` (`mail`),
  KEY `cod_user` (`cod_user`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`cod_user`, `name`, `surname`, `nick`, `mail`, `photo`, `password_hash`, `description`, `gender`, `rol`) VALUES
(1, 'adri', 'rod', 'adri', 'adri', 'adri.jpg', '$2y$10$qfpYSsjvATEUv9nzxzdcZO3P.Z4SvNLxNR.N2UEIdLdvFr9kXdS6i', 'jajajaja descr ', '', 0),
(3, '', '', 'dani', 'dani', 'dani.jpg', '$2y$10$qfpYSsjvATEUv9nzxzdcZO3P.Z4SvNLxNR.N2UEIdLdvFr9kXdS6i', '', '', 0),
(17, 'Ruba', 'Bum', 'Ruba', 'alÃ±skdjf', '', '$2y$10$3q1ZS03zXzHuPImB3lWrlOT1b1Y4mWJtR6soeLydpDgK7YXTfzW9e', '', 'female', 0),
(18, 'asdf', 'asdf', 'Rober', 'asdasdfasdasdasf', '', '$2y$10$cg8qevehkZ5wmIUJmf2jNuvQdRVSpYIPfmWCu7.i6WX5RtH28zD4y', '', 'male', 0),
(19, 'juan', 'Ã±lkasdflÃ±kjsadf', 'juan', 'aÃ±sldfkjsadflÃ±kj', '', '$2y$10$4EcGyCTrcFUON1nzW2aD/.DfQuJ41VeFDw8nMBd1fJYzTQyEsrG46', '', 'male', 0),
(20, 'xavi', 'asd', 'xavi', 'asdf', 'default.png', '$2y$10$1Hfcc2Q3/.aOI5FNwXi0BOv6pCh3hEEUiIzBSlsBh57lZEWRaJGjK', '', 'male', 0),
(21, 'mata', 'mata', 'toros', 'lÃ±kasjdf', 'default.png', '$2y$10$/jjYYWZ0p/HuTtbkX0ckqujUqNKkB1k8F2MhpWVMLUr.2Yha7PTcW', '', 'male', 0),
(25, 'dsfg', 'dfsg', 'asd', 'asdfasdf', 'default.png', '$2y$10$fmyS3bti2g6KGLEZE.TVs.fml6PyV7UkxuR2q0EoUeJ8fDGX9yD0K', '', 'male', 0);

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
(1, '1-17', 1),
(1, '1-18', 1),
(1, '1-3', 1),
(1, '1-4', 1),
(1, '19-1', 1),
(1, 'grupo caca', 1),
(1, 'grupo caca2', 1),
(1, 'grupo caca23', 1),
(1, 'GRUPO1', 1),
(3, '1-3', 0),
(3, '3-17', 1),
(3, '3-4', 0),
(3, 'grupo caca2', 0),
(3, 'grupo caca23', 0),
(17, '1-17', 0),
(17, 'GRUPO1', 0),
(18, '1-18', 0),
(19, '19-1', 0);

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
