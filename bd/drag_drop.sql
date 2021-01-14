-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2021 a las 19:57:00
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alberto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drag_drop`
--

CREATE TABLE `drag_drop` (
  `id` int(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `profesion` varchar(30) DEFAULT NULL,
  `imagen` varchar(30) DEFAULT NULL,
  `posicion` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `drag_drop`
--

INSERT INTO `drag_drop` (`id`, `nombre`, `profesion`, `imagen`, `posicion`) VALUES
(1, 'Urian Viera', 'Ingeniero de Sistemas', 'urian.png', 1),
(2, 'Abelardo Perez', 'Ingeniero de Sistemas', 'abelardo.jpg', 4),
(3, 'Braudin Laya', 'Ingeniero de Sistemas', 'braudin.png', 7),
(4, 'Dayana Ramirez', 'Web Developer', 'dayana.png', 6),
(5, 'Any Somosa', 'Licenciada en Enfermera', 'any.png', 11),
(6, 'Jennifer Lopez', 'Agente Comercial', 'jennifer.png', 12),
(7, 'Alberto Fodol', 'Desarrollador', 'alberto.png', 10),
(8, 'Jose Gregorio', 'full-stack', 'gregorio.png', 9),
(9, 'Luisa Mora', 'Diseñadora UI/UX', 'luisa.png', 8),
(10, 'Dary Perez', 'Analista de Sistemas', 'dary.jpg', 3),
(11, 'Ryan Gosling', 'Diseñador Grafico', 'ryan.png', 2),
(12, 'Chris Hemsworth', 'Analista de Sistemas', 'chris.png', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `drag_drop`
--
ALTER TABLE `drag_drop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `drag_drop`
--
ALTER TABLE `drag_drop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
