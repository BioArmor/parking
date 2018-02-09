-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 23-01-2018 a les 17:46:46
-- Versió del servidor: 10.1.26-MariaDB
-- Versió de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `parkingv0.3`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `alquiler`
--

CREATE TABLE `alquiler` (
  `int_id_alquiler` int(11) NOT NULL,
  `int_id_parking` int(11) NOT NULL,
  `int_id_usuario` int(11) NOT NULL,
  `dt_fecha_hora_entrada` date NOT NULL,
  `dt_fecha_hora_salida` date NOT NULL,
  `dec_precio_hora` decimal(11,0) NOT NULL,
  `dec_comision` decimal(4,0) NOT NULL,
  `boo_validacion_alquiler` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `contabilidad`
--

CREATE TABLE `contabilidad` (
  `int_contabilidad` int(11) NOT NULL,
  `int_id_usuario` int(11) NOT NULL,
  `dec_ingreso` decimal(17,0) NOT NULL,
  `dec_pagos` decimal(17,0) NOT NULL,
  `dec_comision` decimal(4,0) NOT NULL,
  `str_descripcion` varchar(255) NOT NULL,
  `dt_fecha` date NOT NULL,
  `int_id_parking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `empresa`
--

CREATE TABLE `empresa` (
  `int_id_empresa` int(11) NOT NULL,
  `str_nombre` varchar(50) NOT NULL,
  `dec_comision` decimal(4,0) NOT NULL,
  `dec_saldo` decimal(17,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `parking`
--

CREATE TABLE `parking` (
  `int_id_parking` int(11) NOT NULL,
  `int_id_usuario` int(11) NOT NULL,
  `flt_lat` float NOT NULL,
  `flt_lon` float NOT NULL,
  `str_descripcion` varchar(255) NOT NULL,
  `str_tamano` varchar(100) NOT NULL,
  `dec_precio_hora` decimal(11,2) NOT NULL,
  `boo_validacion` tinyint(1) NOT NULL,
  `str_srcimg_1` varchar(60) NOT NULL,
  `str_srcimg_2` varchar(60) NOT NULL,
  `str_srcimg_3` varchar(60) NOT NULL,
  `int_id_calendario` int(11) NOT NULL,
  `str_direcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la taula `roles`
--

CREATE TABLE `roles` (
  `int_id_rol` int(11) NOT NULL,
  `str_rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `roles`
--

INSERT INTO `roles` (`int_id_rol`, `str_rol`) VALUES
(1, 'admin'),
(2, 'usuario'),
(3, 'propietario');

-- --------------------------------------------------------

--
-- Estructura de la taula `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `id_rol_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `rol_usuario`
--

INSERT INTO `rol_usuario` (`id_rol_usuario`, `id_rol`, `id_usuario`) VALUES
(12, 3, 9),
(13, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de la taula `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `str_nombre` varchar(30) NOT NULL,
  `str_apellido` varchar(60) NOT NULL,
  `str_dni` varchar(9) NOT NULL,
  `str_email` varchar(50) NOT NULL,
  `dt_fecha_nacimiento` date NOT NULL,
  `str_direcion` varchar(60) NOT NULL,
  `str_telefono_1` varchar(15) NOT NULL,
  `str_telefono_2` varchar(15) NOT NULL,
  `str_telefono_3` varchar(15) NOT NULL,
  `str_srcimg` varchar(50) NOT NULL,
  `str_password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Bolcant dades de la taula `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `str_nombre`, `str_apellido`, `str_dni`, `str_email`, `dt_fecha_nacimiento`, `str_direcion`, `str_telefono_1`, `str_telefono_2`, `str_telefono_3`, `str_srcimg`, `str_password`) VALUES
(8, 'marc', 'meneses', '', 'emailo', '2018-01-09', '', '', '', '', '', '123'),
(9, 'roger', 'font', '87654321P', 'roger@roger.roger', '0000-00-00', '', '', '', '', '', ''),
(10, 'isaac', 'isaac', '2323232I', 'isaac@isaac.isaac', '0000-00-00', '', '', '', '', '', '123');

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`int_id_alquiler`),
  ADD KEY `int_id_parking` (`int_id_parking`),
  ADD KEY `int_id_usuario` (`int_id_usuario`);

--
-- Index de la taula `contabilidad`
--
ALTER TABLE `contabilidad`
  ADD PRIMARY KEY (`int_contabilidad`),
  ADD KEY `int_id_usuario` (`int_id_usuario`),
  ADD KEY `int_id_parking` (`int_id_parking`);

--
-- Index de la taula `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`int_id_empresa`);

--
-- Index de la taula `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`int_id_parking`),
  ADD UNIQUE KEY `int_id_usuario` (`int_id_usuario`),
  ADD KEY `int_id_calendario` (`int_id_calendario`);

--
-- Index de la taula `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`int_id_rol`);

--
-- Index de la taula `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`id_rol_usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Index de la taula `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`,`str_email`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `int_id_alquiler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `contabilidad`
--
ALTER TABLE `contabilidad`
  MODIFY `int_contabilidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `empresa`
--
ALTER TABLE `empresa`
  MODIFY `int_id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `parking`
--
ALTER TABLE `parking`
  MODIFY `int_id_parking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `roles`
--
ALTER TABLE `roles`
  MODIFY `int_id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la taula `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `id_rol_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la taula `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`int_id_parking`) REFERENCES `parking` (`int_id_parking`),
  ADD CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`int_id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restriccions per la taula `contabilidad`
--
ALTER TABLE `contabilidad`
  ADD CONSTRAINT `contabilidad_ibfk_1` FOREIGN KEY (`int_id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `contabilidad_ibfk_2` FOREIGN KEY (`int_id_parking`) REFERENCES `parking` (`int_id_parking`);

--
-- Restriccions per la taula `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `parking_ibfk_2` FOREIGN KEY (`int_id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restriccions per la taula `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `rol_usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`int_id_rol`),
  ADD CONSTRAINT `rol_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
