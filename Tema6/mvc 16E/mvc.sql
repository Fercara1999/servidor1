-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2024 a las 15:16:37
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
-- Base de datos: `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `CodDepartamento` varchar(3) NOT NULL,
  `DescDepartamento` varchar(255) NOT NULL,
  `FechaBaja` date DEFAULT NULL,
  `VolumenNegocio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`CodDepartamento`, `DescDepartamento`, `FechaBaja`, `VolumenNegocio`) VALUES
('AAA', 'DescripciÃ³n AAAA', NULL, 3),
('ABC', 'DescripciÃ³n qweqweq', NULL, 123),
('ASD', 'DescripciÃ³n ASD', '2019-11-26', 1),
('BBB', 'DescripciÃ³n BBB', '2019-11-24', 1),
('CCC', 'DescripciÃ³n CCC', NULL, 1),
('DDD', 'DescripciÃ³n DDD', NULL, 1),
('EEE', 'DescripciÃ³n EEE', '2019-11-24', 1),
('FFF', 'DescripciÃ³n FFF', '2019-11-24', 1),
('FRE', 'DescripciÃ³n FRE', '2019-11-24', 1),
('GGG', 'DescripciÃ³n GGG', NULL, 1),
('HHH', 'DescripciÃ³n HHH', NULL, 1),
('III', 'DescripciÃ³n III', '2019-11-24', 1),
('JJJ', 'DescripciÃ³n JJJ', '2019-11-24', 1),
('KKK', 'DescripciÃ³n KKK', '2019-11-25', 1),
('LLL', 'DescripciÃ³n LLL', NULL, 1),
('MMM', 'DescripciÃ³n MMM', NULL, 1),
('XXX', 'DescripciÃ³n XXX', '2019-11-24', 1),
('ZZZ', 'DescripciÃ³n ZZZ', '2019-11-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `CodUsuario` varchar(15) NOT NULL,
  `DescUsuario` varchar(250) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Perfil` enum('administrador','Usuario') DEFAULT 'Usuario',
  `FechaHoraUltimaConexion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Activo` boolean DEFAULT true
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`CodUsuario`, `DescUsuario`, `Password`, `Perfil`, `FechaHoraUltimaConexion`) VALUES
('admin', 'admin', 'd6ed7eb369f21acd3d3d66a96de946cc2b514e4279827bf8a7ca9d7005514b27', 'administrador', '2024-01-15 17:00:02'),
('alex', 'alex', '825e42135272fc44ca59e7bc969aabd49b88fafe3d60a4f774858b8719bd894c', 'Usuario', '2024-01-15 17:00:02'),
('amor', 'amor', 'a8cce9d7335dddb7c1d076d02b698bd23ffa40099eed7d9263f0a91bd752225a', 'Usuario', '2024-01-15 17:00:02'),
('antonio', 'antonio', 'b6ac37c1936df57d5a0c2eee5f6296df434ecef42b2ece8f23f0b361cc3eb1a9', 'Usuario', '2024-01-15 17:00:02'),
('bea', 'bea', '3dab8ab9510f0f3d6a3f7ee00f6c9a241a263917503ac06b2353f9050f5b8317', 'Usuario', '2024-01-15 17:00:02'),
('daniel', 'daniel', '1b5941313810d1511eb44b62eacc469c3ba250917a3f825df26ee8d5033e1cb8', 'Usuario', '2024-01-15 17:00:02'),
('david', 'david', 'ae52dc722d63e7f96df661af9d6304437052d0106a8e7f2f4728a2bd5b835074', 'Usuario', '2024-01-15 17:00:02'),
('heraclio', 'heraclio', '3f9c1511a87c9eec0d9151ac06d63053adbc269e569da272e72d8e1bfa28a6e3', 'Usuario', '2024-01-15 17:00:02'),
('ismael', 'ismael', '6387edeab39f02a182a8ddc0fe728304f04db6d1afbe60d40592ca2e10b635c2', 'Usuario', '2024-01-15 17:00:02'),
('maria', 'maria', '25c0af9a1dc924c388e66d0acf93ef54885d9783a03131e11f6a21e378e4f70a', 'Usuario', '2024-01-15 17:00:02'),
('mateo', 'mateo', '90c2187b76dddd79363701fad84a5e49cd7c798ad7851c8e96066d500e8c8fc7', 'Usuario', '2024-01-15 17:00:02'),
('miguel', 'miguel', '6dd4a70e1c1e0a9bac97faba236069ef0b7dcd20f71496a9d3f535a40bb85048', 'Usuario', '2024-01-15 17:00:02'),
('nereaA', 'nereaA', 'a92a8672861eca68f7bb7988d8f81cfa732e5acfed7d0d40ceca18500141a6ad', 'Usuario', '2024-01-15 17:00:02'),
('nereaN', 'nereaN', '17feeb4bce8f9b7f3c9966bd043d102f6a8d23c66c32308645be3d974a481972', 'Usuario', '2024-01-15 17:00:02'),
('rodrigo', 'rodrigo', '4bb6f8086725b2a328d3025e65edb2853c276a8ac858c2bbdb938dbadeb36bd7', 'Usuario', '2024-01-15 17:00:02'),
('ruben', 'ruben', '0ea763d7dce6c22d4d1f55e5fc10d6822cb3c034e3dafa43ca6a024fb3d0d070', 'Usuario', '2024-01-15 17:00:02'),
('victor', 'victor', 'ab75fd76bea36af351f763946182ff75a0f2ae9bd68e9b547040cd6175574a81', 'Usuario', '2024-01-15 17:00:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`CodDepartamento`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`CodUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
