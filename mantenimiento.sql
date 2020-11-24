-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2020 a las 21:17:31
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
-- Base de datos: `mantenimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `id` bigint(10) NOT NULL,
  `marca` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cilindraje` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `motor` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `chasis` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `placa` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id`, `marca`, `modelo`, `cilindraje`, `motor`, `chasis`, `created_at`, `updated_at`, `placa`) VALUES
(52, 'MAZDA BT50', '2014', '150', '21KLKLSAAS', 'SD232DS23SD213T', '2020-11-23 10:49:09', '2020-11-23 10:58:17', 'HJSALSK'),
(53, 'NISSAN', '2012', '2488', '2WQ1752AST', 'JK1219SKD000Z12', '2020-11-23 10:57:31', '2020-11-23 10:57:31', 'HJ29KLM'),
(54, 'chevrolet', '2012', '354', 'JKA11000T1B', 'LM2686A954TZ15A2', '2020-11-23 11:00:47', '2020-11-23 11:01:08', 'BJN42A'),
(55, 'MAZDA', '2016', '1500', 'HJKLAM1234', '71GAHJKLAK001234', '2020-11-24 10:44:57', '2020-11-24 10:45:27', 'HJSAKL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` bigint(10) NOT NULL,
  `id_mq` bigint(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `fecha_in` datetime DEFAULT NULL,
  `fecha_fn` datetime DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `id_mq`, `created_at`, `fecha_in`, `fecha_fn`, `descripcion`, `updated_at`) VALUES
(106, 52, '2020-11-23 11:05:33', '2020-11-24 13:00:00', '2020-11-24 14:00:00', 'Prueba', '2020-11-23 11:05:33'),
(108, 52, '2020-11-24 13:05:52', '2020-11-25 13:05:00', '2020-11-19 19:41:00', 'gfgfgf', '2020-11-24 13:05:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(10) NOT NULL,
  `cedula` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `nombre`, `apellido`, `email`, `contacto`, `updated_at`, `created_at`) VALUES
(63, '1096254476', 'Miguel Angel', 'Ocampo Chavarro', 'miguelocampoc@gmail.com', '3172132023', '2020-11-22 19:42:58', '2020-11-22 19:39:32'),
(64, '32322323', 'Julio', 'Julio', 'julio@gmail.cpom', '123434334', '2020-11-23 10:00:06', '2020-11-23 10:00:06'),
(65, '32322323', 'ricardo', 'ricardo', 'ricardo@gmail.com', '122121121221', '2020-11-23 10:00:32', '2020-11-23 10:00:32'),
(66, '12334334', 'Hernandez', 'Rodriguez', 'hernadez@gmail.com', '12345456565', '2020-11-23 11:01:51', '2020-11-23 11:01:51'),
(67, '2332323232', 'Alejandro', 'Alejandro', 'Alejandro@gmail.com', '212124434343', '2020-11-23 11:03:06', '2020-11-23 11:03:06'),
(68, '332323232', 'Samuel', 'Samuel', 'samuel@gmail.com', '21212121122', '2020-11-23 11:03:41', '2020-11-23 11:03:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `us_or`
--

CREATE TABLE `us_or` (
  `id` bigint(10) NOT NULL,
  `id_or` bigint(10) DEFAULT NULL,
  `id_us` bigint(10) DEFAULT NULL,
  `act_tb` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `us_or`
--

INSERT INTO `us_or` (`id`, `id_or`, `id_us`, `act_tb`, `created_at`, `updated_at`) VALUES
(56, 106, 63, 'Limpieza', NULL, NULL),
(57, 106, 64, 'Cambio de llanta', NULL, NULL),
(58, 106, 66, 'Luces', NULL, NULL),
(62, 108, 63, 'limpieza', NULL, NULL),
(63, 108, NULL, NULL, NULL, NULL),
(64, 108, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mq` (`id_mq`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `us_or`
--
ALTER TABLE `us_or`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_us` (`id_us`),
  ADD KEY `id_or` (`id_or`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `us_or`
--
ALTER TABLE `us_or`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_5` FOREIGN KEY (`id_mq`) REFERENCES `maquinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `us_or`
--
ALTER TABLE `us_or`
  ADD CONSTRAINT `us_or_ibfk_1` FOREIGN KEY (`id_us`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `us_or_ibfk_2` FOREIGN KEY (`id_or`) REFERENCES `ordenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
