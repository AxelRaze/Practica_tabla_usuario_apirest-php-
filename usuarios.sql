-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2021 a las 16:43:22
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `USUARIO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO_PATERNO` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO_MATERNO` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ID_ORGANIGRAMA` int(11) NOT NULL,
  `PASS` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `USUARIO`, `ID_ROL`, `NOMBRE`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`, `ID_ORGANIGRAMA`, `PASS`, `ESTADO`) VALUES
(1, 'Leonel', 2, 'Leonel', 'Gonzalez', 'Vidalez', 1, '0d532eb00872b3aa4ce7a92271c616b4f3445d5c', 1),
(2, 'AxelRaze', 0, 'Axel', 'Ortiz', 'Borja', 0, 'contraseña', 1),
(3, 'Alexjox', 0, 'Alex', 'Ortega', 'Jimenez', 0, 'deimos', 1),
(4, 'Nels_99', 0, 'Nelson', 'Gauthier', 'Smith', 0, 'canada167', 1),
(5, 'SamAlvine', 0, 'Sam', 'Alvine', 'Rodriguez', 0, 'season2', 0),
(6, 'BrianGod', 0, 'Brian', 'Aguirre', 'Rodriguez', 0, 'lacapital', 1),
(7, 'Unown', 0, 'Bryan', 'Alonso', 'Valencia', 0, 'tocayo', 1),
(8, 'Julio007', 0, 'Julio', 'Arzate', 'Aguirre', 0, '007aguirre', 1),
(9, 'Levi', 0, 'Julio', 'Sandoval', 'Padilla', 0, 'escapist', 1),
(10, 'AngelAguirre', 0, 'Miguel', 'Aguirre', 'Leon', 0, 'Miguelangelaguirre', 1),
(11, 'AlonsoVictor', 0, 'Victor', 'Cervantes', 'Alonso', 0, 'password123', 1),
(12, 'Yorchtrue', 0, 'Jorge', 'Santamaria', 'Arias', 0, 'deimos12', 1),
(13, 'AntonioG', 0, 'Jorge', 'Antonio', 'Salgado', 0, 'Over12', 1),
(14, 'AxelAg', 0, 'Axel', 'Aguilar', 'Salgado', 0, 'TF2VS', 1),
(15, 'Crazyman', 0, 'Jose ', 'Bejar', 'Sanchez', 0, '646260', 0),
(16, 'Craxyman', 0, 'Oliver', 'Sanchez', 'Vejar', 0, 'torta767', 0),
(17, 'Ronin', 0, 'Ronaldo', 'Segura', 'Peñaloza', 0, 'torta123', 0),
(18, 'Chain_z', 0, 'Hersain', 'Garcia', 'Romero', 0, 'digimon', 0),
(19, 'Dargut', 0, 'Axel', 'Pastenes', 'Gutierrez', 0, 'pokemon', 0),
(20, 'Dargut18', 0, 'Dario', 'Pastenes', 'Gutierrez', 0, 'pokemongo', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `FK_REFERENCE_4` (`ID_ROL`),
  ADD KEY `FK_REFERENCE_40` (`ID_ORGANIGRAMA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
