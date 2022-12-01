-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 18:08:04
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `att`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-11-20 22:53:33', '2022-11-20 22:53:33'),
(2, 3, '2022-11-23 02:36:33', '2022-11-23 02:36:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `id_conductor` int(11) NOT NULL,
  `tipo_licencia` char(1) NOT NULL,
  `diponibilidad` tinyint(1) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`id_conductor`, `tipo_licencia`, `diponibilidad`, `estado`, `id_sede`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 'C', 1, 0, 1, 4, '2022-11-23 03:10:42', '2022-11-25 01:21:02'),
(2, 'D', 0, 0, 1, 5, '2022-11-23 03:14:01', '2022-11-25 01:21:02'),
(3, 'C', 1, 1, 1, 6, '2022-11-23 03:14:22', '2022-11-25 02:04:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `id_sede`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-11-21 02:01:35', '2022-11-21 02:01:35'),
(2, 1, 7, '2022-11-24 21:39:57', '2022-11-24 21:39:57'),
(3, 1, 8, '2022-11-24 21:39:57', '2022-11-24 21:39:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperacion_pass`
--

CREATE TABLE `recuperacion_pass` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recuperacion_pass`
--

INSERT INTO `recuperacion_pass` (`id`, `token`, `email`) VALUES
(0, '163878670b8d5a', 'betzaidasmith30@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `id_reporte` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `detalles` text NOT NULL,
  `foto` text NOT NULL,
  `id_conductor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id_reporte`, `motivo`, `detalles`, `foto`, `id_conductor`, `created_at`, `updated_at`) VALUES
(1, 'Se ensucio el asiento de atras', 'Es una mancha de soda', 'foto', 3, '2022-11-30 15:30:18', '2022-11-30 15:30:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `nombre_sede` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nombre_sede`, `created_at`, `updated_at`) VALUES
(1, 'Campus Dr. Víctor Levi Sasso', '2022-11-21 02:01:06', '2022-11-21 02:01:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `cant_personas` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_llegada` date DEFAULT NULL,
  `instrucciones` text NOT NULL,
  `motivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `destino`, `fecha_salida`, `hora_salida`, `hora_llegada`, `cant_personas`, `created_at`, `updated_at`, `fecha_llegada`, `instrucciones`, `motivo`) VALUES
(1, 'Hotel Riu Plaza Panamá', '2022-11-30', '12:00:00', '02:30:00', 6, '2022-11-21 01:58:08', '2022-11-21 01:58:08', NULL, '', ''),
(2, 'Centro de Convenciones ATLAPA', '2022-11-25', '14:00:00', '20:00:00', 20, '2022-11-24 23:05:46', '2022-11-24 23:05:46', NULL, '', ''),
(3, 'Centro de Convenciones ATLAPA', '2022-11-25', '13:00:00', '18:00:00', 42, '2022-11-24 23:08:12', '2022-11-24 23:08:12', NULL, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_funcionario`
--

CREATE TABLE `solicitud_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `estado_solicitud` tinyint(1) DEFAULT 0,
  `observacion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud_funcionario`
--

INSERT INTO `solicitud_funcionario` (`id_funcionario`, `id_solicitud`, `estado_solicitud`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, '2022-11-21 02:01:59', '2022-11-21 02:01:59'),
(2, 2, 2, NULL, '2022-11-24 23:06:23', '2022-11-25 02:15:44'),
(3, 3, 1, NULL, '2022-11-24 23:08:59', '2022-11-25 02:04:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `cedula` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `nombre`, `apellido`, `email`, `cedula`, `pass`, `foto`, `created_at`, `updated_at`) VALUES
(1, 0, 'Betzaida', 'Smith', 'betzaida@utp.ac.pa', '8-232-3366', '3b712de48137572f3849aabd5666a4e3', 'foto.png', '2022-11-20 22:39:03', '2022-11-20 23:36:33'),
(2, 2, 'Melida', 'Castillo', 'melida@utp.ac.pa', '8-353-151', '310dcbbf4cce62f762a2aaa148d556bd', 'foto.png', '2022-11-20 23:24:04', '2022-11-20 23:24:04'),
(3, 0, 'Leonardo', 'Cedeño', 'leonardo@utp.ac.pa', '8-965-1525', 'f1c1592588411002af340cbaedd6fc33', 'foto.png', '2022-11-23 02:36:05', '2022-11-23 02:36:05'),
(4, 1, 'Alvaro', 'Aguilar', 'alvaro@utp.ac.pa', '5-639-25', '15de21c670ae7c3f6f3f1f37029303c9', 'foto.png', '2022-11-23 03:08:27', '2022-11-23 03:08:27'),
(5, 1, 'Luis', 'Ceballos', 'luis@utp.ac.pa', '3-998-78', 'b706835de79a2b4e80506f582af3676a', 'photo.jpg', '2022-11-23 03:12:28', '2022-11-23 03:12:28'),
(6, 1, 'Clark', 'Kent', 'clark@utp.ac.pa', '7-77-77', '0a113ef6b61820daa5611c870ed8d5ee', 'foto.png', '2022-11-23 03:13:22', '2022-11-23 03:13:22'),
(7, 2, 'Toph', 'Beifong', 'toph@utp.ac.pa', '1-32-36', 'ddcb155487b88aaa80aed158006bdbdf', 'footo.jpg', '2022-11-24 21:37:52', '2022-11-24 21:40:32'),
(8, 2, 'Kazuto', 'Kirigaya', 'kazuto@utp.ac.pa', '2-359-6986', '4a7d1ed414474e4033ac29ccb8653d9b', 'foto.png', '2022-11-24 21:39:28', '2022-11-24 21:39:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `num_placa` varchar(20) NOT NULL,
  `tipo_vehiculo` varchar(50) NOT NULL,
  `tipo_motor` varchar(20) NOT NULL,
  `combustible` varchar(10) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `año` varchar(20) NOT NULL,
  `vin` varchar(50) NOT NULL,
  `num_revisado` varchar(100) NOT NULL,
  `num_poliza` varchar(100) NOT NULL,
  `cant_pasajeros` int(11) NOT NULL,
  `cant_puertas` int(11) NOT NULL,
  `kilometraje` varchar(20) NOT NULL DEFAULT '0 km',
  `estado_vehiculo` char(1) NOT NULL DEFAULT 'C',
  `foto` text NOT NULL DEFAULT 'foto.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `num_placa`, `tipo_vehiculo`, `tipo_motor`, `combustible`, `modelo`, `marca`, `año`, `vin`, `num_revisado`, `num_poliza`, `cant_pasajeros`, `cant_puertas`, `kilometraje`, `estado_vehiculo`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'CN8022', 'Sedan', 'Gasolina', '95', 'Albea', 'Fiat', '2002', 'JH4DA9370PS000721', '11124566', '02BR118023', 4, 4, '0 km', 'C', 'foto.jpg', '2022-11-24 20:20:52', '2022-11-24 20:32:48'),
(2, 'ED8976', 'Sedan', 'Gasolina', '91', 'Albea', 'Fiat', '2002', 'KM8JT3AC2DU583865', '55667789', '34VR557788', 4, 4, '3.2 km', 'C', '', '2022-11-24 20:20:52', '2022-11-24 21:07:09'),
(3, 'AB5566', 'Hatchback', 'Gasolina', '95, 91', 'A3', 'Audi', '2000', 'WP0AA2991YS620631', '11098877', '89MN789856', 4, 5, '10 km', 'C', 'foto.png', '2022-11-24 20:24:00', '2022-11-24 21:05:59'),
(4, 'JK0909', 'Minivan', 'Gasolina', '95', '500L', 'Audi', '2012', '2GCEK13T961100610', '33445566', '92DC232567', 8, 4, '0 km', 'C', 'foto.jpg', '2022-11-24 20:46:13', '2022-11-24 21:05:23'),
(5, 'AA1109', 'Minivan', 'Diesel', 'Diesel', 'Doblo', 'Fiat', '2009', 'KNAFT4A22D5675895', '21987654', '33RV667629', 8, 4, '0 km', 'C', 'foto.jpg', '2022-11-24 20:48:27', '2022-11-24 21:05:23'),
(6, 'BB9988', 'Hatchback', 'Gasolina', '95', 'Bravo', 'Fiat', '2007', 'JTDBF32K920050115', '14359898', '09MN897624', 4, 4, '5 km', 'C', 'foto.jpg', '2022-11-24 20:51:12', '2022-11-24 21:05:59'),
(7, 'CC3935', 'Camioneta', 'Diesel', 'Diesel', 'Fullback', 'Fiat', '2016', 'JH4DB1561MS001102', '33141618', '11GT668800', 4, 4, '0 km', 'C', 'foto.jpg', '2022-11-24 20:54:26', '2022-11-24 21:05:59'),
(8, 'DD1090', 'Camioneta', 'Diesel', 'Diesel', 'Fullback', 'Fiat', '2016', '1FVACWCT67HY22127', '29287776', '11LL908769', 4, 4, '0 km', 'C', 'foto.jpg', '2022-11-24 20:54:26', '2022-11-24 21:05:59'),
(9, 'BU5350', 'Bus', 'Diesel', 'Diesel', '9700', 'Volvo', '2020', '2FAFP71W4YX101840', '66789009', '11HN156518', 43, 2, '20 km', 'C', 'foto.jpg', '2022-11-24 21:03:25', '2022-11-24 23:33:40'),
(10, 'BU5352', 'Bus', 'Diesel', 'Diesel', '9700', 'Volvo', '2020', '1C3CDZBG8DN504146', '19182763', '11HN688993', 43, 2, '0 km', 'C', 'foto.jpg', '2022-11-24 21:04:38', '2022-11-24 23:33:41'),
(11, 'BU5354', 'Bus', 'Diesel', 'Diesel', '8500', 'Volvo', '2015', '2CNDL23F856093901', '22987368', '11BB33647', 23, 1, '856 km', 'C', 'foto.jpg', '2022-11-25 01:10:18', '2022-11-25 01:12:08'),
(12, 'BU5359', 'Bus', 'Diesel', 'Diesel', '8500', 'Volvo', '2015', 'JH4KA7560NC004288', '22019837', '21CD345627', 23, 1, '777 km', 'C', 'foto.jpg', '2022-11-25 01:11:55', '2022-11-25 01:11:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `id_conductor` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `estado_viaje` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `salvoconducto` int(11) DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `id_solicitud`, `id_conductor`, `id_funcionario`, `id_vehiculo`, `estado_viaje`, `created_at`, `updated_at`, `salvoconducto`, `motivo`, `id_usuario`) VALUES
(1, 3, 3, 3, 10, 'A', '2022-11-25 02:04:01', '2022-11-25 02:04:01', NULL, NULL, 0),
(2, 1, 1, 3, 9, '0', '2022-11-30 15:26:30', '2022-11-30 15:26:30', 1, 'El evento se retraso', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `FOREIGN KEY` (`id_usuario`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id_conductor`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `id_conductor` (`id_conductor`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `solicitud_funcionario`
--
ALTER TABLE `solicitud_funcionario`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `num_placa` (`num_placa`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `id_solicitud` (`id_solicitud`),
  ADD KEY `id_conductor` (`id_conductor`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id_conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitud_funcionario`
--
ALTER TABLE `solicitud_funcionario`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_id_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `id_sede` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`),
  ADD CONSTRAINT `id_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `id_sede1` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id_conductor`);

--
-- Filtros para la tabla `solicitud_funcionario`
--
ALTER TABLE `solicitud_funcionario`
  ADD CONSTRAINT `solicitud_funcionario_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`),
  ADD CONSTRAINT `solicitud_funcionario_ibfk_2` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id_conductor`),
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`),
  ADD CONSTRAINT `viaje_ibfk_4` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
