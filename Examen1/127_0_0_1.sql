-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2024 a las 13:45:57
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
-- Base de datos: `ahorcado`
--
DROP DATABASE IF EXISTS `ahorcado`;
CREATE DATABASE IF NOT EXISTS `ahorcado` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ahorcado`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `id_estadistica` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_palabra` int(11) NOT NULL,
  `resultado` enum('ganada','perdida') NOT NULL,
  `intentos` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadisticas`
--

INSERT INTO `estadisticas` (`id_estadistica`, `id_usuario`, `id_palabra`, `resultado`, `intentos`, `fecha`) VALUES
(1, 1, 1, 'ganada', 4, '2024-02-02 22:10:38'),
(2, 2, 3, 'perdida', 6, '2024-02-02 22:10:38'),
(3, 3, 2, 'ganada', 5, '2024-02-02 22:10:38'),
(4, 1, 89, 'perdida', 6, '2024-02-05 16:20:33'),
(5, 1, 87, 'perdida', 6, '2024-02-05 16:25:54'),
(6, 1, 19, 'perdida', 6, '2024-02-05 16:49:17'),
(7, 1, 79, 'ganada', 0, '2024-02-05 16:53:10'),
(8, 1, 5, 'ganada', 0, '2024-02-05 16:54:34'),
(9, 1, 28, 'perdida', 6, '2024-02-05 16:57:25'),
(10, 1, 57, 'ganada', 0, '2024-02-05 16:58:05'),
(11, 1, 39, 'ganada', 1, '2024-02-05 17:11:22'),
(12, 1, 20, 'perdida', 6, '2024-02-05 17:21:01'),
(13, 1, 61, 'perdida', 6, '2024-02-05 17:24:03'),
(14, 1, 17, 'perdida', 6, '2024-02-05 17:43:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabras`
--

CREATE TABLE `palabras` (
  `id_palabra` int(11) NOT NULL,
  `palabra` varchar(100) NOT NULL,
  `num_letras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `palabras`
--

INSERT INTO `palabras` (`id_palabra`, `palabra`, `num_letras`) VALUES
(1, 'hola', 4),
(2, 'adios', 5),
(3, 'casa', 4),
(4, 'casa', 4),
(5, 'perro', 5),
(6, 'gato', 4),
(7, 'coche', 5),
(8, 'moto', 4),
(9, 'ordenador', 9),
(11, 'libro', 5),
(12, 'ventana', 7),
(13, 'puerta', 6),
(15, 'amigo', 5),
(16, 'familia', 7),
(17, 'trabajo', 7),
(18, 'escuela', 7),
(19, 'universidad', 11),
(20, 'comida', 6),
(21, 'agua', 4),
(22, 'leche', 5),
(23, 'pan', 3),
(24, 'cama', 4),
(25, 'silla', 5),
(26, 'mesa', 4),
(27, 'ropa', 4),
(28, 'tienda', 6),
(29, 'mercado', 7),
(30, 'ciudad', 6),
(31, 'país', 5),
(32, 'mundo', 5),
(33, 'mar', 3),
(34, 'lago', 4),
(36, 'montaña', 8),
(37, 'parque', 6),
(38, 'cine', 4),
(39, 'teatro', 6),
(40, 'musica', 6),
(41, 'pintura', 7),
(42, 'baile', 5),
(43, 'deporte', 7),
(45, 'baloncesto', 10),
(46, 'tenis', 5),
(47, 'natación', 8),
(48, 'viaje', 5),
(49, 'vacaciones', 10),
(51, 'tren', 4),
(52, 'coche', 5),
(53, 'autobús', 7),
(54, 'bicicleta', 9),
(55, 'parada', 6),
(56, 'calle', 5),
(57, 'avenida', 7),
(58, 'plaza', 5),
(60, 'carretera', 9),
(61, 'autovía', 7),
(62, 'gasolina', 8),
(63, 'electricidad', 12),
(64, 'agua', 4),
(65, 'gas', 3),
(66, 'aire', 4),
(67, 'fuego', 5),
(68, 'calor', 5),
(69, 'frío', 4),
(70, 'lluvia', 6),
(71, 'nieve', 5),
(72, 'sol', 3),
(73, 'luna', 4),
(74, 'estrella', 8),
(75, 'planeta', 7),
(77, 'astro', 5),
(78, 'espacio', 7),
(79, 'tiempo', 6),
(80, 'hora', 4),
(81, 'minuto', 6),
(82, 'segundo', 7),
(83, 'día', 3),
(84, 'noche', 5),
(85, 'mañana', 7),
(86, 'tarde', 5),
(87, 'noche', 5),
(88, 'oscuro', 6),
(89, 'claro', 5),
(90, 'luz', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `tipo` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `tipo`) VALUES
(1, 'usuario1', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'user'),
(2, 'usuario2', '2aa60a8ff7fcd473d321e0146afd9e26df395147', 'user'),
(3, 'usuario3', '1119cfd37ee247357e034a08d844eea25f6fd20f', 'user'),
(4, 'admin', '407c6798fe20fd5d75de4a233c156cc0fce510e3', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`id_estadistica`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_palabra` (`id_palabra`);

--
-- Indices de la tabla `palabras`
--
ALTER TABLE `palabras`
  ADD PRIMARY KEY (`id_palabra`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  MODIFY `id_estadistica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `palabras`
--
ALTER TABLE `palabras`
  MODIFY `id_palabra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `estadisticas_ibfk_2` FOREIGN KEY (`id_palabra`) REFERENCES `palabras` (`id_palabra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
