-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2022 a las 13:09:51
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsimon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadas`
--

CREATE TABLE `jugadas` (
  `codjugada` int(11) NOT NULL,
  `codigousu` int(11) NOT NULL,
  `acierto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadas`
--

INSERT INTO `jugadas` (`codjugada`, `codigousu`, `acierto`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 2, 1),
(4, 2, 0),
(5, 2, 1),
(6, 3, 1),
(7, 4, 1),
(8, 4, 0),
(9, 4, 0),
(10, 4, 0),
(11, 4, 0),
(12, 4, 0),
(13, 4, 0),
(14, 2, 0),
(15, 4, 1),
(16, 4, 1),
(17, 4, 1),
(18, 4, 1),
(19, 4, 1),
(20, 4, 1),
(21, 4, 1),
(22, 4, 1),
(23, 4, 1),
(24, 4, 1),
(25, 4, 1),
(26, 4, 1),
(27, 4, 1),
(28, 4, 1),
(29, 4, 1),
(30, 4, 1),
(31, 4, 1),
(32, 4, 1),
(33, 4, 1),
(34, 4, 1),
(35, 4, 1),
(36, 4, 1),
(37, 4, 1),
(38, 4, 1),
(39, 3, 1),
(40, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Codigo`, `Nombre`, `Clave`, `Rol`) VALUES
(1, 'ana', 'ana', 0),
(2, 'maria', 'maria', 0),
(3, 'paco', 'paco', 0),
(4, 'pedro', 'pedro', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugadas`
--
ALTER TABLE `jugadas`
  ADD PRIMARY KEY (`codjugada`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugadas`
--
ALTER TABLE `jugadas`
  MODIFY `codjugada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;