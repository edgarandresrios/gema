-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2017 a las 15:44:36
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `apellido`, `codigo`) VALUES
(1, 'juan234@loquesea.com', 'Juan', '', 1),
(2, 'juan234@loquesea.com', 'Juan', 'Perez', 1),
(3, 'juan234@loquesea.com', 'Rodrigo', 'Perez', 1),
(4, 'juan324@loquesea.com', 'Juan', 'Perz', 1),
(5, 'juan15@loquesea.com', 'Juan', 'Perez', 2),
(6, 'juan11@loquesea.com', 'Juan', 'Perez', 2),
(7, 'juan12@loquesea.com', 'Juan', '', 2),
(8, 'juan0@loquesea.com', 'Juan', 'Perez', 3),
(9, 'juan9@loquesea.com', 'Julián', 'Perez', 3),
(10, 'juan9@loquesea.com', 'Roberto', 'Perez', 3),
(11, 'juan8@loquesea.com', 'Juan', 'Perez', 3),
(12, 'juan7@loquesea.com', 'Juan', '', 1),
(13, 'juan6@loquesea.com', 'Juan', 'Perez', 3),
(14, 'juan5@loquesea.com', 'Pedro', 'Perez', 1),
(15, 'juan4@loquesea.com', 'Andrés', 'Perez', 3),
(16, 'juan3@loquesea.com', 'Juan', '', 1),
(17, 'juan2@loquesea.com', 'Juan', 'Perez', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
