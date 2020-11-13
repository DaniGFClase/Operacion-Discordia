-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2020 a las 16:43:10
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `message` (
  `cod_message` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `text_message` varchar(250) NOT NULL,
  `date_message` datetime NOT NULL DEFAULT current_timestamp(),
  `cod_room` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(49, 1, 'asdf', '2020-11-11 18:08:59', '1-3'),
(50, 1, 'asdf', '2020-11-11 18:09:03', '1-3'),
(51, 1, 'tes', '2020-11-11 18:09:17', '1-3'),
(52, 1, 'asdf', '2020-11-11 18:10:16', '1-3'),
(53, 1, 'asdf', '2020-11-11 18:10:20', '1-3'),
(54, 1, 'asdf', '2020-11-11 18:10:23', '1-3'),
(55, 1, 'asdf', '2020-11-11 18:14:13', '1-3'),
(56, 1, 'asdfasdfasdfasdf', '2020-11-11 18:51:39', '1-3'),
(58, 1, 'eyy', '2020-11-11 18:52:25', '1-4'),
(59, 1, 'asdf', '2020-11-11 19:02:55', '1-4'),
(60, 1, 'jooo', '2020-11-11 19:05:11', '1-3'),
(61, 1, 'ertgsgsd', '2020-11-11 19:07:36', 'GRUPO1'),
(63, 1, 'multi', '2020-11-11 19:08:59', '1-4'),
(64, 1, 'noooo\r\n', '2020-11-11 19:18:09', '1-3'),
(66, 1, 'hola', '2020-11-11 19:27:42', '1-3'),
(67, 1, 'hola', '2020-11-11 19:27:54', '1-3'),
(69, 1, 'hola2', '2020-11-11 19:28:11', '1-3'),
(70, 1, 'hola2', '2020-11-11 19:28:11', '1-4'),
(71, 1, 'lo que tu digas bro', '2020-11-11 19:48:56', '1-3'),
(72, 1, 'asdf', '2020-11-11 19:53:50', '1-3'),
(73, 1, 'asdf', '2020-11-11 20:00:21', '1-3'),
(74, 1, 'hola', '2020-11-11 20:32:56', 'grupo12'),
(75, 1, 'hola', '2020-11-11 20:34:09', 'grupo123'),
(76, 1, 'asdf', '2020-11-13 15:10:51', 'grupo caca23'),
(77, 1, 'hola', '2020-11-13 15:10:57', '1-17'),
(78, 1, 'hola', '2020-11-13 15:31:15', 'GRUPO1'),
(79, 1, 'asdf', '2020-11-13 15:45:38', 'GRUPO1'),
(80, 1, 'asdf', '2020-11-13 15:46:41', 'GRUPO1'),
(81, 1, 'asdf', '2020-11-13 15:48:07', 'GRUPO1'),
(82, 1, 'asdf', '2020-11-13 16:34:58', '1-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room`
--

CREATE TABLE `room` (
  `cod_room` varchar(50) NOT NULL,
  `img_room` varchar(50) NOT NULL
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
('grupo caca23', 'default_group.jpg'),
('grupo nuevo', 'default_group.jpg'),
('grupo nuevo2', 'default_group.jpg'),
('GRUPO1', 'group_default.jpg'),
('grupo12', 'default_group.jpg'),
('grupo123', 'default_group.jpg'),
('grupo2', 'default_group.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `cod_user` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `password_hash` varchar(80) NOT NULL,
  `description` varchar(250) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `user_room` (
  `cod_user` int(11) NOT NULL,
  `cod_room` varchar(50) NOT NULL,
  `view` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_room`
--

INSERT INTO `user_room` (`cod_user`, `cod_room`, `view`) VALUES
(1, '1-17', 1),
(1, '1-18', 0),
(1, '1-3', 0),
(1, '1-4', 0),
(1, 'grupo nuevo', 0),
(1, 'grupo nuevo2', 0),
(1, 'GRUPO1', 1),
(1, 'grupo12', 0),
(1, 'grupo123', 0),
(3, '1-3', 0),
(3, '3-17', 0),
(3, '3-4', 0),
(3, 'GRUPO1', 0),
(3, 'grupo123', 0),
(4, '1-4', 0),
(4, '3-4', 0),
(4, '4-17', 0),
(4, 'GRUPO1', 0),
(17, '1-17', 0),
(17, 'grupo nuevo', 0),
(17, 'grupo nuevo2', 0),
(17, 'GRUPO1', 0),
(17, 'grupo12', 0),
(17, 'grupo123', 0),
(18, '1-18', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`cod_message`),
  ADD KEY `cod_room` (`cod_room`);

--
-- Indices de la tabla `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`cod_room`),
  ADD KEY `cod_room` (`cod_room`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cod_user`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `cod_user` (`cod_user`);

--
-- Indices de la tabla `user_room`
--
ALTER TABLE `user_room`
  ADD PRIMARY KEY (`cod_user`,`cod_room`),
  ADD KEY `cod_user` (`cod_user`),
  ADD KEY `cor_room` (`cod_room`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `cod_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `cod_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
