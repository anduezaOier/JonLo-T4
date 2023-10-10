-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2023 a las 10:00:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `erronka1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `dni`, `nombre`, `apellido`, `email`, `edad`) VALUES
(1, '46368767P', 'JonLo', 'Pez', 'lopez.jon@uni.eus', 19000),
(2, '11111111A', 'Oier', 'Andueza', 'andueza.oier@uni.eus', 21),
(3, '22222222B', 'Ainhize', 'Arrese', 'arrese.ainhize@uni.eus', 20),
(4, '33333333C', 'Iker', 'Romero', 'romero.iker@uni.eus', 21),
(5, '44444444D', 'Iker', 'Fernández', 'fernandez.iker@uni.eus', 21),
(6, '55555555E', 'Alfonso', 'The Gayest', 'thegayest@uni.eus', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `idioma` varchar(50) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `descripcion`, `idioma`, `codigo`) VALUES
(1, 'Ziberseguridad', 'Lo que ves.', 'Euskera', 'ZIBER'),
(2, 'Desarrollo de aplicaciones multiplatafor', 'Aqui aprendes a desarrollar aplicaciones', 'Euskera', 'DAM'),
(3, 'Desarrollo de aplicaciones web', 'Aprenderas a programar paginas web con d', 'Euskera', 'DAW'),
(4, 'Ese eme erre', 'Ese eme erre.', 'Euskera/Castellano', 'SMR'),
(5, 'Asir', 'Si.', 'Euskera/Castellano', 'ASIR'),
(6, 'Administración y finanzas', 'Administras finanzas.', 'Euskera/Castellano', 'AF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `nombreUsuario` varchar(40) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombreUsuario`, `contrasena`, `tipo`, `curso`) VALUES
(1, '46368767P', 'JonLo', 'Jon', 'Alumno', 1),
(2, '11111111A', 'Giputzi', 'Oier', 'Alumno', 6),
(3, '22222222B', 'Ainitze', 'Ainhize', 'Alumno', 1),
(4, '33333333C', 'Ikerom', 'iker', 'Alumno', 4),
(5, '44444444D', 'IkerFer', 'Fernández', 'Alumno', 3),
(6, '55555555E', 'AlfonsoTheGayest', 'Thegayest', 'Administrador', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
