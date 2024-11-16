-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2024 a las 21:52:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `erp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `descripcion`) VALUES
(1, 'Ventas'),
(2, 'Administración'),
(3, 'Marketing'),
(4, 'Logística'),
(5, 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `e-mail` varchar(100) DEFAULT NULL,
  `alta_contrato` datetime DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `e-mail`, `alta_contrato`, `salario`, `activo`, `id_departamento`) VALUES
(1, 'Leonardo', 'Barandalla', 'l.barandalla@sharktech.com.ar', '2015-11-01 17:40:54', 1200000, b'1', 1),
(2, 'Adriana', 'Benitez', 'a.benitez@sharktech.com.ar', '2014-08-25 17:40:54', 1000500, b'1', 2),
(3, 'Vanesa', 'Delgado', 'v.delgado@gmail.com', '2024-08-01 17:44:12', 1100000, b'0', 2),
(4, 'Pablo', 'Velazquez', 'p.velazquez@sharktech.com.ar', '2019-12-01 17:44:12', 2150000, b'1', 3),
(5, 'Claudio', 'Bustos', 'c.bustos@loginter.com.ar', '2023-03-28 17:44:12', 950000, b'1', 4),
(6, 'Ariel', 'Coronel', 'a.coronel@loginter.com.ar', '2018-09-12 17:47:20', 930000, b'0', 4),
(7, 'Angela', 'Donaire', 'a.donaire@sharktech.com.ar', '2021-01-01 17:47:20', 1930000, b'1', 5),
(8, 'Gustavo', 'Abate', 'g.abate@sharktech.com.ar', '2017-07-03 17:47:20', 2350000, b'1', 1),
(9, 'Mariel', 'Alieno', 'm.alieno@canudas.com.ar', '2018-11-07 17:47:20', 1800500, b'0', 5),
(10, 'Germán', 'Sobczuk', 'g.sobczuk@gmail.com', '2014-04-01 17:47:20', 1930000, b'0', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
