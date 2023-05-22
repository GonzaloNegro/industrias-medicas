-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2023 a las 22:51:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `industrias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `size` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `name`, `description`, `ruta`, `tipo`, `size`) VALUES
(1, '123wqe', 'xcvxcv', 'PR 0000002737 - OSPLYFCBA - PEREYRA Hugo.pdf', 'application/pdf', 303828),
(2, 'ss', 'ss', '', 'application/pdf', 82248),
(14, '', 'asd', '31', 'asdasd', 0),
(15, '', 'asd', '31', 'asdasd', 0),
(16, '', 'asd', '../upload/ventas/remitos/31', 'asdasd', 0),
(17, '', 'asd', '../upload/ventas/facturas/31', 'asdasd', 0),
(18, '', 'asd', '../upload/ventas/ordenPago/31', 'asdasd', 0),
(19, '', 'asd', '../upload/ventas/remitos/31', 'asdasd', 0),
(20, '', 'asd', '../upload/ventas/remitos/31', 'asdasd', 0),
(21, '', 'asd', '../upload/ventas/recibo/31', 'asdasd', 0),
(22, '', 'asd', '../upload/licitaciones/remitos/1', 'asdasd', 0),
(23, '', 'asd', '../upload/licitaciones/remitos/2', 'asdasd', 0),
(24, '', 'asd', '../upload/licitaciones/facturas/2', 'asdasd', 0),
(25, '', 'asd', '../upload/licitaciones/ordenPago/2', 'asdasd', 0),
(26, '', 'asd', '../upload/ventas/remitos/', 'asdasd', 0),
(27, '', 'asd', '../upload/ventas/remitos/33', 'asdasd', 0),
(28, '', 'asd', '../upload/ventas/facturas/33', 'asdasd', 0),
(29, '', 'asd', '../upload/ventas/ordenPago/33', 'asdasd', 0),
(30, '', 'asd', '../upload/ventas/recibo/33', 'asdasd', 0),
(31, '', 'asd', '../upload/ventas/remitos/50', 'asdasd', 0),
(32, '', 'asd', '../upload/licitaciones/recibo/11', 'asdasd', 0),
(33, '', 'asd', '../upload/ventas/facturas/50', 'asdasd', 0),
(34, '', 'asd', '../upload/ventas/ordenPago/50', 'asdasd', 0),
(35, '', 'asd', '../upload/ventas/recibo/50', 'asdasd', 0),
(36, '', 'asd', '../upload/licitaciones/remitos/18', 'asdasd', 0),
(37, '', 'asd', '../upload/licitaciones/remitos/18', 'asdasd', 0),
(38, '', 'asd', '../upload/licitaciones/remitos/18', 'asdasd', 0),
(39, '', 'asd', '../upload/licitaciones/facturas/18', 'asdasd', 0),
(40, '', 'asd', '../upload/licitaciones/ordenPago/18', 'asdasd', 0),
(41, '', 'asd', '../upload/licitaciones/recibo/18', 'asdasd', 0),
(42, '', 'asd', '../upload/licitaciones/remitos/17', 'asdasd', 0),
(43, '', 'asd', '../upload/licitaciones/facturas/17', 'asdasd', 0),
(44, '', 'asd', '../upload/licitaciones/ordenPago/17', 'asdasd', 0),
(46, '', 'asd', '../upload/ventas/remitos/54', 'asdasd', 0),
(47, '', 'asd', '../upload/ventas/facturas/54', 'asdasd', 0),
(48, '', 'asd', '../upload/ventas/ordenPago/54', 'asdasd', 0),
(49, '', 'asd', '../upload/ventas/recibo/54', 'asdasd', 0),
(50, '', 'asd', '../upload/licitaciones/remitos/16', 'asdasd', 0),
(51, '', 'asd', '../upload/licitaciones/facturas/16', 'asdasd', 0),
(52, '', 'asd', '../upload/licitaciones/remitos/19', 'asdasd', 0),
(53, '', 'asd', '../upload/licitaciones/facturas/19', 'asdasd', 0),
(54, '', 'asd', '../upload/licitaciones/ordenPago/19', 'asdasd', 0),
(55, '', 'asd', '../upload/licitaciones/recibo/19', 'asdasd', 0),
(56, '', 'asd', '../upload/ventas/remitos/54', 'asdasd', 0),
(57, '', 'asd', '../upload/ventas/remitos/56', 'asdasd', 0),
(58, '', 'asd', '../upload/ventas/facturas/56', 'asdasd', 0),
(59, '', 'asd', '../upload/ventas/ordenPago/56', 'asdasd', 0),
(61, '', 'asd', '../upload/ventas/recibo/56', 'asdasd', 0),
(62, '', 'asd', '../upload/ventas/remitos/57', 'asdasd', 0),
(63, '', 'asd', '../upload/ventas/facturas/57', 'asdasd', 0),
(64, '', 'asd', '../upload/ventas/ordenPago/57', 'asdasd', 0),
(65, '', 'asd', '../upload/ventas/recibo/57', 'asdasd', 0),
(66, '', 'asd', '../upload/licitaciones/ordenPago/16', 'asdasd', 0),
(67, '', 'asd', '../upload/licitaciones/recibo/16', 'asdasd', 0),
(68, '', 'asd', '../upload/ventas/remitos/58', 'asdasd', 0),
(69, '', 'asd', '../upload/ventas/facturas/58', 'asdasd', 0),
(70, '', 'asd', '../upload/ventas/ordenPago/58', 'asdasd', 0),
(71, '', 'asd', '../upload/ventas/recibo/58', 'asdasd', 0),
(72, '', 'asd', '../upload/licitaciones/remitos/20', 'asdasd', 0),
(73, '', 'asd', '../upload/licitaciones/facturas/20', 'asdasd', 0),
(74, '', 'asd', '../upload/licitaciones/ordenPago/20', 'asdasd', 0),
(75, '', 'asd', '../upload/licitaciones/recibo/20', 'asdasd', 0),
(76, '', 'asd', '../upload/licitaciones/remitos/22', 'asdasd', 0),
(77, '', 'asd', '../upload/licitaciones/remitos/23', 'asdasd', 0),
(78, '', 'asd', '../upload/licitaciones/facturas/23', 'asdasd', 0),
(79, '', 'asd', '../upload/licitaciones/ordenPago/23', 'asdasd', 0),
(80, '', 'asd', '../upload/licitaciones/recibo/23', 'asdasd', 0),
(81, '', 'asd', '../upload/ventas/remitos/59', 'asdasd', 0),
(82, '', 'asd', '../upload/ventas/facturas/59', 'asdasd', 0),
(83, '', 'asd', '../upload/ventas/ordenPago/59', 'asdasd', 0),
(84, '', 'asd', '../upload/ventas/recibo/59', 'asdasd', 0),
(85, '', 'asd', '../upload/licitaciones/remitos/24', 'asdasd', 0),
(86, '', 'asd', '../upload/licitaciones/facturas/24', 'asdasd', 0),
(87, '', 'asd', '../upload/licitaciones/ordenPago/24', 'asdasd', 0),
(88, '', 'asd', '../upload/licitaciones/recibo/24', 'asdasd', 0),
(89, '', 'asd', '../upload/ventas/remitos/66', 'asdasd', 0),
(90, '', 'asd', '../upload/ventas/facturas/66', 'asdasd', 0),
(91, '', 'asd', '../upload/ventas/ordenPago/66', 'asdasd', 0),
(92, '', 'asd', '../upload/ventas/recibo/66', 'asdasd', 0),
(93, '', 'asd', '../upload/licitaciones/remitos/25', 'asdasd', 0),
(94, '', 'asd', '../upload/licitaciones/facturas/25', 'asdasd', 0),
(95, '', 'asd', '../upload/licitaciones/ordenPago/25', 'asdasd', 0),
(96, '', 'asd', '../upload/licitaciones/recibo/25', 'asdasd', 0),
(97, '', 'asd', '../upload/ventas/remitos/60', 'asdasd', 0),
(98, '', 'asd', '../upload/ventas/remitos/64', 'asdasd', 0),
(99, '', 'asd', '../upload/licitaciones/remitos/21', 'asdasd', 0),
(100, '', 'asd', '../upload/licitaciones/facturas/22', 'asdasd', 0),
(101, '', 'asd', '../upload/ventas/facturas/60', 'asdasd', 0),
(102, '', 'asd', '../upload/ventas/facturas/64', 'asdasd', 0),
(103, '', 'asd', '../upload/licitaciones/ordenPago/22', 'asdasd', 0),
(104, '', 'asd', '../upload/licitaciones/remitos/26', 'asdasd', 0),
(105, '', 'asd', '../upload/licitaciones/remitos/27', 'asdasd', 0),
(106, '', 'asd', '../upload/licitaciones/remitos/28', 'asdasd', 0),
(107, '', 'asd', '../upload/licitaciones/remitos/29', 'asdasd', 0),
(108, '', 'asd', '../upload/licitaciones/remitos/31', 'asdasd', 0),
(109, '', 'asd', '../upload/ventas/ordenPago/60', 'asdasd', 0),
(110, '', 'asd', '../upload/ventas/recibo/60', 'asdasd', 0),
(111, '', 'asd', '../upload/ventas/remitos/62', 'asdasd', 0),
(112, '', 'asd', '../upload/ventas/remitos/63', 'asdasd', 0),
(113, '', 'asd', '../upload/ventas/facturas/64', 'asdasd', 0),
(114, '', 'asd', '../upload/licitaciones/remitos/35', 'asdasd', 0),
(115, '', 'asd', '../upload/licitaciones/facturas/35', 'asdasd', 0),
(116, '', 'asd', '../upload/licitaciones/ordenPago/35', 'asdasd', 0),
(117, '', 'asd', '../upload/licitaciones/recibo/35', 'asdasd', 0),
(118, '', 'asd', '../upload/licitaciones/facturas/21', 'asdasd', 0),
(119, '', 'asd', '../upload/licitaciones/remitos/26', 'asdasd', 0),
(120, '', 'asd', '../upload/licitaciones/remitos/27', 'asdasd', 0),
(121, '', 'asd', '../upload/licitaciones/remitos/28', 'asdasd', 0),
(122, '', 'asd', '../upload/licitaciones/remitos/29', 'asdasd', 0),
(123, '', 'asd', '../upload/licitaciones/remitos/31', 'asdasd', 0),
(124, '', 'asd', '../upload/ventas/remitos/81', 'asdasd', 0),
(125, '', 'asd', '../upload/ventas/facturas/81', 'asdasd', 0),
(126, '', 'asd', '../upload/ventas/ordenPago/81', 'asdasd', 0),
(127, '', 'asd', '../upload/ventas/ordenPago/81', 'asdasd', 0),
(128, '', 'asd', '../upload/ventas/recibo/81', 'asdasd', 0),
(129, '', 'asd', '../upload/ventas/remitos/61', 'asdasd', 0),
(130, '', 'asd', '../upload/ventas/facturas/62', 'asdasd', 0),
(131, '', 'asd', '../upload/ventas/facturas/63', 'asdasd', 0),
(132, '', 'asd', '../upload/ventas/ordenPago/64', 'asdasd', 0),
(133, '', 'asd', '../upload/ventas/remitos/65', 'asdasd', 0),
(134, '', 'asd', '../upload/ventas/remitos/71', 'asdasd', 0),
(135, '', 'asd', '../upload/ventas/remitos/72', 'asdasd', 0),
(136, '', 'asd', '../upload/ventas/remitos/67', 'asdasd', 0),
(137, '', 'asd', '../upload/ventas/remitos/68', 'asdasd', 0),
(138, '', 'asd', '../upload/ventas/remitos/69', 'asdasd', 0),
(139, '', 'asd', '../upload/licitaciones/ordenPago/21', 'asdasd', 0),
(140, '', 'asd', '../upload/licitaciones/remitos/26', 'asdasd', 0),
(141, '', 'asd', '../upload/licitaciones/facturas/27', 'asdasd', 0),
(142, '', 'asd', '../upload/licitaciones/facturas/28', 'asdasd', 0),
(143, '', 'asd', '../upload/licitaciones/facturas/29', 'asdasd', 0),
(144, '', 'asd', '../upload/licitaciones/facturas/31', 'asdasd', 0),
(145, '', 'asd', '../upload/licitaciones/remitos/33', 'asdasd', 0),
(146, '', 'asd', '../upload/licitaciones/remitos/34', 'asdasd', 0),
(147, '', 'asd', '../upload/licitaciones/facturas/26', 'asdasd', 0),
(148, '', 'asd', '../upload/licitaciones/ordenPago/27', 'asdasd', 0),
(149, '', 'asd', '../upload/licitaciones/ordenPago/28', 'asdasd', 0),
(150, '', 'asd', '../upload/licitaciones/ordenPago/29', 'asdasd', 0),
(151, '', 'asd', '../upload/licitaciones/ordenPago/31', 'asdasd', 0),
(152, '', 'asd', '../upload/licitaciones/remitos/32', 'asdasd', 0),
(153, '', 'asd', '../upload/licitaciones/facturas/33', 'asdasd', 0),
(154, '', 'asd', '../upload/licitaciones/facturas/34', 'asdasd', 0),
(155, '', 'asd', '../upload/ventas/facturas/60', 'asdasd', 0),
(156, '', 'asd', '../upload/ventas/remitos/61', 'asdasd', 0),
(157, '', 'asd', '../upload/ventas/facturas/62', 'asdasd', 0),
(158, '', 'asd', '../upload/ventas/facturas/63', 'asdasd', 0),
(159, '', 'asd', '../upload/ventas/facturas/65', 'asdasd', 0),
(160, '', 'asd', '../upload/ventas/facturas/67', 'asdasd', 0),
(161, '', 'asd', '../upload/ventas/facturas/68', 'asdasd', 0),
(162, '', 'asd', '../upload/ventas/facturas/69', 'asdasd', 0),
(163, '', 'asd', '../upload/ventas/remitos/70', 'asdasd', 0),
(164, '', 'asd', '../upload/ventas/remitos/71', 'asdasd', 0),
(165, '', 'asd', '../upload/ventas/remitos/72', 'asdasd', 0),
(166, '', 'asd', '../upload/ventas/remitos/73', 'asdasd', 0),
(167, '', 'asd', '../upload/ventas/remitos/74', 'asdasd', 0),
(168, '', 'asd', '../upload/ventas/remitos/75', 'asdasd', 0),
(169, '', 'asd', '../upload/ventas/facturas/75', 'asdasd', 0),
(170, '', 'asd', '../upload/ventas/facturas/71', 'asdasd', 0),
(171, '', 'asd', '../upload/ventas/remitos/54', 'asdasd', 0),
(172, '', 'asd', '../upload/ventas/ordenPago/75', 'asdasd', 0),
(173, '', 'asd', '../upload/ventas/recibo/75', 'asdasd', 0),
(174, '', 'asd', '../upload/ventas/facturas/61', 'asdasd', 0),
(175, '', 'asd', '../upload/ventas/ordenPago/62', 'asdasd', 0),
(176, '', 'asd', '../upload/ventas/ordenPago/63', 'asdasd', 0),
(177, '', 'asd', '../upload/ventas/ordenPago/65', 'asdasd', 0),
(178, '', 'asd', '../upload/ventas/ordenPago/69', 'asdasd', 0),
(179, '', 'asd', '../upload/ventas/ordenPago/68', 'asdasd', 0),
(180, '', 'asd', '../upload/ventas/ordenPago/67', 'asdasd', 0),
(181, '', 'asd', '../upload/ventas/facturas/70', 'asdasd', 0),
(182, '', 'asd', '../upload/ventas/ordenPago/71', 'asdasd', 0),
(183, '', 'asd', '../upload/ventas/facturas/72', 'asdasd', 0),
(184, '', 'asd', '../upload/ventas/facturas/73', 'asdasd', 0),
(185, '', 'asd', '../upload/ventas/facturas/74', 'asdasd', 0),
(186, '', 'asd', '../upload/ventas/remitos/76', 'asdasd', 0),
(187, '', 'asd', '../upload/ventas/remitos/77', 'asdasd', 0),
(188, '', 'asd', '../upload/ventas/remitos/78', 'asdasd', 0),
(189, '', 'asd', '../upload/ventas/remitos/79', 'asdasd', 0),
(190, '', 'asd', '../upload/ventas/remitos/80', 'asdasd', 0),
(191, '', 'asd', '../upload/ventas/recibo/71', 'asdasd', 0),
(192, '', 'asd', '../upload/ventas/recibo/69', 'asdasd', 0),
(193, '', 'asd', '../upload/ventas/recibo/68', 'asdasd', 0),
(194, '', 'asd', '../upload/ventas/recibo/67', 'asdasd', 0),
(195, '', 'asd', '../upload/ventas/recibo/65', 'asdasd', 0),
(196, '', 'asd', '../upload/ventas/recibo/64', 'asdasd', 0),
(197, '', 'asd', '../upload/ventas/recibo/63', 'asdasd', 0),
(198, '', 'asd', '../upload/ventas/recibo/62', 'asdasd', 0),
(199, '', 'asd', '../upload/licitaciones/remitos/37', 'asdasd', 0),
(200, '', 'asd', '../upload/licitaciones/facturas/37', 'asdasd', 0),
(201, '', 'asd', '../upload/licitaciones/facturas/37', 'asdasd', 0),
(202, '', 'asd', '../upload/licitaciones/ordenPago/37', 'asdasd', 0),
(203, '', 'asd', '../upload/licitaciones/recibo/37', 'asdasd', 0),
(204, '', 'asd', '../upload/ventas/remitos/82', 'asdasd', 0),
(205, '', 'asd', '../upload/ventas/remitos/82', 'asdasd', 0),
(206, '', 'asd', '../upload/ventas/remitos/82', 'asdasd', 0),
(207, '', 'asd', '../upload/ventas/remitos/82', 'asdasd', 0),
(208, '', 'asd', '../upload/ventas/remitos/82', 'asdasd', 0),
(209, '', 'asd', '../upload/ventas/remitos/82', 'asdasd', 0),
(210, '', 'asd', '../upload/ventas/remitos/96', 'asdasd', 0),
(211, '', 'asd', '../upload/ventas/facturas/96', 'asdasd', 0),
(212, '', 'asd', '../upload/ventas/ordenPago/96', 'asdasd', 0),
(213, '', 'asd', '../upload/ventas/recibo/96', 'asdasd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centromedico`
--

CREATE TABLE `centromedico` (
  `idCentro` int(10) NOT NULL,
  `centroMedico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `centromedico`
--

INSERT INTO `centromedico` (`idCentro`, `centroMedico`) VALUES
(1, 'Clínica Velez Sarsfield Norte'),
(2, 'Clínica Velez Sarsfield Sur'),
(3, 'Hospital Privado'),
(4, 'Clínica de la Familia'),
(5, 'Clínica de la Cañada'),
(6, 'Sanatorio Allende'),
(7, 'El Salvador'),
(8, 'Acongagua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosdocumento`
--

CREATE TABLE `datosdocumento` (
  `idDocumento` int(3) NOT NULL,
  `medico` varchar(100) NOT NULL,
  `paciente` varchar(50) NOT NULL,
  `idUsuario` int(50) NOT NULL,
  `idCentro` int(2) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `observacion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datosdocumento`
--

INSERT INTO `datosdocumento` (`idDocumento`, `medico`, `paciente`, `idUsuario`, `idCentro`, `monto`, `observacion`) VALUES
(54, 'medico2', 'paciente2', 1, 6, '47190.00', 'nuevaoo'),
(55, 'Josecito', 'raul', 9, 1, '9680.00', ''),
(56, 'Juan', 'JOSE', 1, 1, '135520.00', ''),
(57, 'samanta', 'sebastian', 1, 1, '677600.00', 'bla'),
(58, 'jose perez', 'hernan dominguez', 1, 1, '12705.00', 'observacion'),
(59, 'qwe', 'ewq', 1, 1, '50094.00', ''),
(60, 'roberto sosa', 'javier ibarra', 1, 1, '103455.00', ''),
(61, 'hernan aguirre', 'pablo migliore', 1, 8, '61710.00', ''),
(62, 'pedro alfonso', 'marta sanchez', 1, 3, '7260.00', ''),
(63, 'leonel garcia', 'julian matos', 1, 5, '11132.00', ''),
(64, 'ricardo perez', 'camila thor', 9, 3, '16940.00', ''),
(65, 'martin guzman', 'sandra sanchez', 9, 7, '117128.00', ''),
(66, 'juana lopez', 'miguel granados', 15, 7, '31460.00', ''),
(67, 'JORGE CARRANZA', 'MANUEL GONZALEZ', 17, 6, '10890.00', ''),
(68, 'PEDRO SANCHEZ', 'MARTIN BOSNIAN', 17, 8, '11132.00', ''),
(69, 'sandra machado', 'julian castro', 16, 2, '5203.00', ''),
(70, 'pascual antonio', 'blanes martina', 16, 8, '13068.00', ''),
(71, 'carranza hector', 'patricia sisterna', 9, 3, '5566.00', ''),
(72, 'mateo amuchastegui', 'raul gimenez', 9, 6, '13552.00', ''),
(73, 'martin marqusi', 'pablo ledesma', 15, 4, '20328.00', ''),
(74, 'JORGE PAREDES', 'ANDRES PEDERNERA', 19, 5, '32307.00', ''),
(75, 'PABLO GRANADOS', 'MARCOS ALBERCA', 19, 6, '16456.00', ''),
(76, 'PABLO CHACON', 'JORGE SANTOS', 19, 1, '11497.12', ''),
(77, 'LARA GODOY', 'PATRICIO ZABULANES', 19, 5, '30976.00', ''),
(78, 'reinaldo sanz', 'camila sisterna', 9, 6, '7262.42', ''),
(79, 'gonzalo morales', 'eduardo diaz', 15, 7, '5811.87', ''),
(80, 'Ramon santos', 'angela sanchez', 1, 1, '19011.76', ''),
(81, 'ZARA PEDERNERA', 'ROCIO AHUMADA', 3, 6, '16819.00', ''),
(82, 'PABLO TOBAR', 'TIAGO SALTO', 3, 8, '43923.00', ''),
(83, 'Jose MARTI', 'PAMELA TES', 3, 3, '5445.00', ''),
(84, 'PAOLA MENDEZ', 'RAUL GIMENEZ', 3, 1, '3025.00', ''),
(85, 'pamela arraigada', 'cristian novillo', 3, 5, '12100.00', ''),
(86, 'xxxx', 'xxxx', 1, 3, '3630.00', ''),
(87, 'xxxxx', 'xxxxx', 1, 6, '3025.00', ''),
(88, 'aaaaa', 'aaaaa', 1, 4, '16940.00', ''),
(89, 'ccc', 'ccc', 1, 3, '21780.00', ''),
(90, 'xxx', 'xxx', 1, 1, '29040.00', ''),
(91, 'mmm', 'mmm', 1, 3, '49368.00', ''),
(92, 'aaa', 'aaa', 1, 2, '16214.00', ''),
(93, 'Pedro pascal', 'leandro ramirez', 3, 7, '4537500.00', ''),
(94, 'lalala', 'msmsms', 3, 4, '82764.00', ''),
(95, 'aaaa', 'ssss', 3, 3, '217800.00', ''),
(96, 'sdfsdf', 'zxcxvccx', 3, 5, '58080.00', 'asadasds');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datoslicitacion`
--

CREATE TABLE `datoslicitacion` (
  `idLicitacion` int(3) NOT NULL,
  `idUsuario` int(5) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `observacion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datoslicitacion`
--

INSERT INTO `datoslicitacion` (`idLicitacion`, `idUsuario`, `monto`, `observacion`) VALUES
(16, 1, '71305.30', 'nuevalic'),
(17, 1, '79860.00', 'nnn'),
(18, 1, '1694.00', 'qwerty'),
(19, 1, '3025.00', ''),
(20, 1, '77440.00', ''),
(21, 1, '1210.00', ''),
(22, 1, '2420.00', ''),
(23, 11, '72600.00', ''),
(24, 1, '43560.00', ''),
(25, 11, '81312.00', ''),
(26, 11, '17545.00', ''),
(27, 18, '66792.00', ''),
(28, 11, '21780.00', ''),
(29, 18, '31702.00', ''),
(30, 11, '1694.00', ''),
(31, 20, '387200.00', ''),
(32, 20, '27104.00', ''),
(33, 18, '63888.00', ''),
(34, 11, '6897.00', ''),
(35, 20, '145200.00', ''),
(36, 11, '125235.00', ''),
(37, 11, '72600.00', ''),
(38, 0, '0.00', ''),
(39, 11, '37752.00', ''),
(40, 11, '18392.00', ''),
(41, 0, '0.00', ''),
(42, 0, '0.00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospostulacionlicitacion`
--

CREATE TABLE `datospostulacionlicitacion` (
  `idPostulacion` int(3) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datospostulacionlicitacion`
--

INSERT INTO `datospostulacionlicitacion` (`idPostulacion`, `idProducto`, `cantidad`, `precio`) VALUES
(19, 7, 11, '700.00'),
(19, 6, 65, '800.00'),
(19, 8, 9, '700.00'),
(20, 6, 4, '344.00'),
(20, 5, 14, '4111.00'),
(21, 2, 8, '600.00'),
(21, 34, 15, '800.00'),
(22, 18, 5, '500.00'),
(23, 1, 12, '5000.00'),
(23, 4, 2, '2000.00'),
(24, 17, 4, '5000.00'),
(25, 438, 2, '500.00'),
(26, 465, 2, '1000.00'),
(27, 252, 12, '5000.00'),
(28, 119, 3, '6000.00'),
(28, 330, 4, '4500.00'),
(29, 117, 12, '5600.00'),
(30, 239, 5, '2300.00'),
(30, 11, 3, '1000.00'),
(31, 16, 24, '5000.00'),
(32, 239, 5, '5800.00'),
(32, 11, 3, '1200.00'),
(33, 16, 24, '2300.00'),
(34, 437, 4, '5600.00'),
(35, 467, 4, '5700.00'),
(35, 459, 2, '4300.00'),
(36, 467, 1, '15000.00'),
(37, 17, 100, '3200.00'),
(38, 437, 4, '4500.00'),
(39, 467, 4, '3400.00'),
(39, 459, 2, '5300.00'),
(40, 467, 1, '1400.00'),
(41, 17, 100, '2300.00'),
(42, 437, 4, '10000.00'),
(43, 467, 4, '5400.00'),
(43, 459, 2, '2300.00'),
(44, 467, 1, '4300.00'),
(45, 17, 100, '5600.00'),
(46, 124, 4, '5600.00'),
(47, 143, 3, '4500.00'),
(47, 186, 5, '2300.00'),
(47, 266, 2, '1000.00'),
(48, 283, 1, '1700.00'),
(49, 124, 4, '3000.00'),
(50, 143, 3, '3400.00'),
(50, 186, 5, '1200.00'),
(50, 266, 2, '2300.00'),
(51, 283, 1, '5700.00'),
(52, 124, 4, '4000.00'),
(53, 143, 3, '5400.00'),
(53, 186, 5, '3400.00'),
(53, 266, 2, '9800.00'),
(54, 124, 4, '1500.50'),
(55, 12, 100, '1200.00'),
(56, 15, 4, '15000.00'),
(57, 12, 23, '4500.00'),
(58, 86, 4, '12000.00'),
(59, 86, 4, '13500.00'),
(60, 86, 4, '7800.00'),
(61, 15, 2, '7600.00'),
(62, 151, 1, '15000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `idDocumento` int(3) NOT NULL,
  `idEstadoDocumento` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`idDocumento`, `idEstadoDocumento`) VALUES
(54, 10),
(55, 9),
(56, 10),
(57, 10),
(58, 10),
(59, 10),
(60, 10),
(61, 6),
(62, 10),
(63, 10),
(64, 10),
(65, 10),
(66, 10),
(67, 10),
(68, 10),
(69, 10),
(70, 6),
(71, 10),
(72, 6),
(73, 6),
(74, 6),
(75, 10),
(76, 5),
(77, 5),
(78, 5),
(79, 5),
(80, 9),
(81, 10),
(82, 4),
(83, 9),
(84, 9),
(85, 9),
(86, 9),
(87, 9),
(88, 9),
(89, 9),
(90, 9),
(91, 9),
(92, 9),
(93, 4),
(94, 9),
(95, 4),
(96, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadodocumento`
--

CREATE TABLE `estadodocumento` (
  `idEstadoDocumento` int(3) NOT NULL,
  `estadoDocumento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadodocumento`
--

INSERT INTO `estadodocumento` (`idEstadoDocumento`, `estadoDocumento`) VALUES
(1, 'Cot.Solicitada'),
(2, 'Cot.Presupuestada'),
(3, 'Orden de compra'),
(4, 'Remitido'),
(5, 'Factura'),
(6, 'Orden de pago'),
(7, 'Revision'),
(8, 'Oc.Depósito'),
(9, 'Rechazado'),
(10, 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadolicitacion`
--

CREATE TABLE `estadolicitacion` (
  `idEstadoLicitacion` int(3) NOT NULL,
  `estadoLicitacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadolicitacion`
--

INSERT INTO `estadolicitacion` (`idEstadoLicitacion`, `estadoLicitacion`) VALUES
(1, 'Lic.Cotizada'),
(2, 'Lic.Orden de compra'),
(3, 'Lic.Remitida'),
(4, 'Lic.Facturada'),
(5, 'Lic.Orden de Pago'),
(6, 'Lic.Aprobada'),
(7, 'Lic.Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoproducto`
--

CREATE TABLE `estadoproducto` (
  `idEstadoProducto` int(1) NOT NULL,
  `estadoProducto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadoproducto`
--

INSERT INTO `estadoproducto` (`idEstadoProducto`, `estadoProducto`) VALUES
(1, 'ALTA'),
(2, 'RESERVADO'),
(3, 'BAJA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosolicitud`
--

CREATE TABLE `estadosolicitud` (
  `idEstadoSolicitud` int(1) NOT NULL,
  `estadoSolicitud` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadosolicitud`
--

INSERT INTO `estadosolicitud` (`idEstadoSolicitud`, `estadoSolicitud`) VALUES
(1, 'PENDIENTE'),
(2, 'EN PROCESO'),
(3, 'FINALIZADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadousuario`
--

CREATE TABLE `estadousuario` (
  `idEstadoUsuario` int(2) NOT NULL,
  `estadoUsuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadousuario`
--

INSERT INTO `estadousuario` (`idEstadoUsuario`, `estadoUsuario`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoproducto`
--

CREATE TABLE `grupoproducto` (
  `idGrupoProducto` int(5) NOT NULL,
  `grupoProducto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupoproducto`
--

INSERT INTO `grupoproducto` (`idGrupoProducto`, `grupoProducto`) VALUES
(1, 'CADERA PARCIAL NACIONAL'),
(2, 'CADERA TOTAL CEMENTADA NACIONAL'),
(3, 'CADERA TOTAL REVISION CEMENTADA NACIONAL'),
(4, 'CADERA HIBRIDA NACIONAL'),
(5, 'CADERA HIBRIDA NACIONAL - CON CABEZA CERAMICA'),
(6, 'CADERA HIBRIDA DE REVISION TALLO NACIONAL - CUPULA NACIONAL'),
(7, 'CADERA HIBRIDA DE REVISION TALLO NACIONAL - CUPULA NACIONAL - CABEZA CERAMICA'),
(8, 'CADERA HIBRIDA TALLO NACIONAL - CUPULA IMPORTADA'),
(9, 'CADERA HIBRIDA TALLO NACIONAL - CUPULA IMPORTADA - CABEZA CERAMICA'),
(10, 'CADERA HIBRIDA DE REVISION TALLO NACIONAL - CUPULA IMPORTADA'),
(11, 'CADERA HIBRIDA DE REVISION TALLO NACIONAL - CUPULA IMPORTADA - CABEZA CERAMICA'),
(12, 'CADERA TOTAL NO CEMENTADA NACIONAL'),
(13, 'CADERA TOTAL NO CEMENTADA CABEZA IMPORTADA'),
(14, 'CADERA TOTAL NO CEMENTADA IMPORTADA'),
(15, 'RODILLA TOTAL NACIONAL'),
(16, 'RODILLA TOTAL REVISION NACIONAL / MERCOSUR'),
(17, 'RODILLA TOTAL IMPORTADA'),
(18, 'HOMBRO'),
(19, 'ACCESORIOS Y/O COMPLEMENTOS'),
(20, 'DESCARTABLES'),
(21, 'ARTICULACION NO CONVENCIONAL'),
(22, 'ENDOMEDULARES'),
(23, 'OSTEOSINTESIS MIEMBRO INFERIOR BLOQUEADO TITANIO'),
(24, 'OSTEOSINTESIS MIEMBRO INFERIOR BLOQUEADO'),
(25, 'OSTEOSINTESIS PELVIS BLOQUEADO'),
(26, 'OSTEOSINTESIS MIEMBRO SUPERIOR BLOQUEADO'),
(27, 'OSTEOSINTESIS MIEMBRO INFERIOR STANDARD'),
(28, 'OSTEOSINTESIS PELVIS STANDARD'),
(29, 'OSTEOSINTESIS MIEMBRO SUPERIOR STANDARD'),
(30, 'OSTEOSINTESIS MIEMBRO SUPERIOR BLOQUEADO TITANIO'),
(31, 'CRANEO - MAXILOFACIAL TITANIO'),
(32, 'OSTEOTOMIAS'),
(33, 'RECONSTRUCCION DE LIGAMENTO'),
(34, 'SISTEMA DE COLUMNA NACIONAL'),
(35, 'SISTEMA DE COLUMNA IMPORTADO (SUJETO A COTIZACION)'),
(36, 'OTRAS PATOLOGIAS'),
(37, 'TUTOR EXTERNO NACIONAL'),
(38, 'NUEVO GRUPO'),
(39, 'NUEVO GRUPO 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licitacion`
--

CREATE TABLE `licitacion` (
  `idLicitacion` int(3) NOT NULL,
  `idEstadoLicitacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `licitacion`
--

INSERT INTO `licitacion` (`idLicitacion`, `idEstadoLicitacion`) VALUES
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 5),
(27, 6),
(28, 6),
(29, 6),
(30, 7),
(31, 6),
(32, 4),
(33, 5),
(34, 5),
(35, 6),
(36, 3),
(37, 6),
(38, 7),
(39, 3),
(40, 3),
(41, 1),
(42, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE `motivo` (
  `idMotivo` int(1) NOT NULL,
  `motivo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `motivo`
--

INSERT INTO `motivo` (`idMotivo`, `motivo`) VALUES
(1, 'SIN ASIGNAR'),
(2, 'LICITACIÓN'),
(3, 'VENTA'),
(4, 'RESERVA DE VENTA'),
(5, 'DEFECTUOSO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientodocumento`
--

CREATE TABLE `movimientodocumento` (
  `idDocumento` int(3) NOT NULL,
  `idEstadoDocumento` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `fechaven` date NOT NULL,
  `cantDias` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimientodocumento`
--

INSERT INTO `movimientodocumento` (`idDocumento`, `idEstadoDocumento`, `fecha`, `fechaven`, `cantDias`) VALUES
(54, 1, '2022-10-25', '0000-00-00', 0),
(55, 1, '2022-11-12', '0000-00-00', 0),
(54, 2, '2022-11-12', '2022-11-14', 18),
(55, 2, '2022-11-12', '2022-11-14', 0),
(54, 3, '2022-11-12', '0000-00-00', 0),
(54, 8, '2022-11-12', '0000-00-00', 0),
(54, 4, '2022-11-14', '0000-00-00', 2),
(54, 5, '2022-11-14', '0000-00-00', 0),
(54, 6, '2022-11-14', '0000-00-00', 0),
(54, 10, '2022-11-14', '0000-00-00', 0),
(56, 1, '2022-11-22', '0000-00-00', 0),
(56, 2, '2022-11-22', '2022-11-23', 0),
(56, 3, '2022-11-22', '0000-00-00', 0),
(56, 8, '2022-11-22', '0000-00-00', 0),
(55, 9, '2022-11-24', '0000-00-00', 12),
(56, 4, '2022-11-24', '0000-00-00', 2),
(56, 5, '2022-11-24', '0000-00-00', 0),
(56, 6, '2022-11-24', '0000-00-00', 0),
(56, 10, '2022-11-24', '0000-00-00', 0),
(57, 1, '2022-11-24', '0000-00-00', 0),
(57, 2, '2022-11-24', '2022-11-25', 0),
(57, 3, '2022-11-24', '0000-00-00', 0),
(57, 8, '2022-11-24', '0000-00-00', 0),
(57, 4, '2022-11-24', '0000-00-00', 0),
(57, 5, '2022-11-24', '0000-00-00', 0),
(57, 6, '2022-11-24', '0000-00-00', 0),
(57, 10, '2022-12-24', '0000-00-00', 0),
(58, 1, '2023-03-16', '0000-00-00', 0),
(58, 2, '2023-03-16', '2023-03-31', 0),
(58, 3, '2023-03-16', '0000-00-00', 0),
(58, 8, '2023-03-16', '0000-00-00', 0),
(58, 4, '2023-03-16', '0000-00-00', 0),
(58, 5, '2023-03-16', '0000-00-00', 0),
(58, 6, '2023-03-16', '0000-00-00', 0),
(58, 10, '2023-03-16', '0000-00-00', 0),
(59, 1, '2023-03-18', '0000-00-00', 0),
(59, 2, '2023-03-18', '2023-03-31', 0),
(59, 3, '2023-03-18', '0000-00-00', 0),
(59, 8, '2023-03-18', '0000-00-00', 0),
(60, 1, '2023-03-18', '0000-00-00', 0),
(60, 2, '2023-03-18', '2023-03-31', 0),
(60, 3, '2023-03-18', '0000-00-00', 0),
(60, 8, '2023-03-18', '0000-00-00', 0),
(59, 4, '2023-03-18', '0000-00-00', 0),
(59, 5, '2023-03-18', '0000-00-00', 0),
(59, 6, '2023-03-18', '0000-00-00', 0),
(59, 10, '2023-03-18', '0000-00-00', 0),
(61, 1, '2023-03-21', '0000-00-00', 0),
(62, 1, '2023-03-21', '0000-00-00', 0),
(63, 1, '2023-03-21', '0000-00-00', 0),
(64, 1, '2023-03-22', '0000-00-00', 0),
(64, 2, '2023-03-22', '2023-03-31', 0),
(64, 3, '2023-03-22', '0000-00-00', 0),
(64, 8, '2023-03-22', '0000-00-00', 0),
(65, 1, '2023-03-22', '0000-00-00', 0),
(65, 2, '2023-03-22', '2023-03-31', 0),
(66, 1, '2023-03-22', '0000-00-00', 0),
(66, 2, '2023-03-22', '2023-03-31', 0),
(66, 3, '2023-03-22', '0000-00-00', 0),
(66, 8, '2023-03-22', '0000-00-00', 0),
(66, 4, '2023-03-22', '0000-00-00', 0),
(66, 5, '2023-03-22', '0000-00-00', 0),
(66, 6, '2023-03-22', '0000-00-00', 0),
(66, 10, '2023-03-22', '0000-00-00', 0),
(62, 2, '2023-03-22', '2023-03-31', 1),
(63, 2, '2023-03-22', '2023-03-31', 1),
(61, 2, '2023-03-26', '2023-03-31', 5),
(62, 3, '2023-03-26', '0000-00-00', 4),
(63, 3, '2023-03-26', '0000-00-00', 4),
(64, 4, '2023-03-26', '0000-00-00', 4),
(60, 4, '2023-03-26', '0000-00-00', 8),
(67, 1, '2023-03-26', '0000-00-00', 0),
(68, 1, '2023-03-26', '0000-00-00', 0),
(69, 1, '2023-03-26', '0000-00-00', 0),
(70, 1, '2023-03-26', '0000-00-00', 0),
(71, 1, '2023-03-26', '0000-00-00', 0),
(72, 1, '2023-03-26', '0000-00-00', 0),
(73, 1, '2023-03-26', '0000-00-00', 0),
(74, 1, '2023-03-27', '0000-00-00', 0),
(75, 1, '2023-03-27', '0000-00-00', 0),
(67, 2, '2023-03-27', '2023-04-21', 1),
(68, 2, '2023-03-27', '2023-04-22', 1),
(69, 2, '2023-03-27', '2023-04-18', 1),
(71, 2, '2023-03-27', '2023-04-15', 1),
(61, 3, '2023-03-29', '0000-00-00', 3),
(65, 3, '2023-03-29', '0000-00-00', 7),
(67, 3, '2023-03-29', '0000-00-00', 2),
(68, 3, '2023-03-29', '0000-00-00', 2),
(69, 3, '2023-03-29', '0000-00-00', 2),
(71, 3, '2023-03-29', '0000-00-00', 2),
(60, 5, '2023-03-29', '0000-00-00', 3),
(62, 8, '2023-03-29', '0000-00-00', 3),
(63, 8, '2023-03-29', '0000-00-00', 3),
(64, 5, '2023-03-29', '0000-00-00', 3),
(70, 2, '2023-03-29', '2023-04-27', 3),
(72, 2, '2023-03-29', '2023-04-28', 3),
(73, 2, '2023-03-29', '2023-04-21', 3),
(74, 2, '2023-03-29', '2023-04-28', 2),
(75, 2, '2023-03-29', '2023-04-28', 2),
(76, 1, '2023-03-29', '0000-00-00', 0),
(77, 1, '2023-03-29', '0000-00-00', 0),
(78, 1, '2023-03-29', '0000-00-00', 0),
(79, 1, '2023-03-29', '0000-00-00', 0),
(60, 6, '2023-04-03', '0000-00-00', 5),
(61, 8, '2023-04-03', '0000-00-00', 5),
(62, 4, '2023-04-03', '0000-00-00', 5),
(63, 4, '2023-04-03', '0000-00-00', 5),
(65, 8, '2023-04-03', '0000-00-00', 5),
(67, 8, '2023-04-03', '0000-00-00', 5),
(68, 8, '2023-04-03', '0000-00-00', 5),
(69, 8, '2023-04-03', '0000-00-00', 5),
(70, 3, '2023-04-03', '0000-00-00', 5),
(71, 8, '2023-04-03', '0000-00-00', 5),
(72, 3, '2023-04-03', '0000-00-00', 5),
(73, 3, '2023-04-03', '0000-00-00', 5),
(74, 3, '2023-04-03', '0000-00-00', 5),
(75, 3, '2023-04-03', '0000-00-00', 5),
(76, 2, '2023-04-03', '2023-04-28', 5),
(77, 2, '2023-04-03', '2023-04-30', 5),
(78, 2, '2023-04-03', '2023-05-07', 5),
(79, 2, '2023-04-03', '2023-04-28', 5),
(80, 1, '2023-04-03', '0000-00-00', 0),
(80, 2, '2023-04-03', '2023-04-30', 0),
(60, 10, '2023-04-08', '0000-00-00', 5),
(61, 4, '2023-04-08', '0000-00-00', 5),
(62, 5, '2023-04-08', '0000-00-00', 5),
(63, 5, '2023-04-08', '0000-00-00', 5),
(64, 6, '2023-04-08', '0000-00-00', 10),
(65, 4, '2023-04-08', '0000-00-00', 5),
(67, 4, '2023-04-08', '0000-00-00', 5),
(68, 4, '2023-04-08', '0000-00-00', 5),
(69, 4, '2023-04-08', '0000-00-00', 5),
(70, 8, '2023-04-08', '0000-00-00', 5),
(71, 4, '2023-04-08', '0000-00-00', 5),
(72, 8, '2023-04-08', '0000-00-00', 5),
(73, 8, '2023-04-08', '0000-00-00', 5),
(74, 8, '2023-04-08', '0000-00-00', 5),
(75, 8, '2023-04-08', '0000-00-00', 5),
(76, 3, '2023-04-08', '0000-00-00', 5),
(77, 3, '2023-04-08', '0000-00-00', 5),
(78, 3, '2023-04-08', '0000-00-00', 5),
(79, 3, '2023-04-08', '0000-00-00', 5),
(80, 3, '2023-04-08', '0000-00-00', 5),
(81, 1, '2023-04-08', '0000-00-00', 0),
(82, 1, '2023-04-08', '0000-00-00', 0),
(81, 2, '2023-04-08', '2023-04-29', 0),
(81, 3, '2023-04-08', '0000-00-00', 0),
(81, 8, '2023-04-08', '0000-00-00', 0),
(81, 4, '2023-04-08', '0000-00-00', 0),
(81, 5, '2023-04-08', '0000-00-00', 0),
(81, 6, '2023-04-08', '0000-00-00', 0),
(81, 10, '2023-04-08', '0000-00-00', 0),
(76, 8, '2023-04-10', '0000-00-00', 2),
(80, 8, '2023-04-12', '0000-00-00', 4),
(72, 4, '2023-04-12', '0000-00-00', 4),
(78, 8, '2023-04-12', '0000-00-00', 4),
(64, 10, '2023-04-12', '0000-00-00', 4),
(65, 5, '2023-04-12', '0000-00-00', 4),
(71, 5, '2023-04-12', '0000-00-00', 4),
(67, 5, '2023-04-12', '0000-00-00', 4),
(68, 5, '2023-04-12', '0000-00-00', 4),
(70, 4, '2023-04-12', '0000-00-00', 4),
(69, 5, '2023-04-12', '0000-00-00', 4),
(73, 4, '2023-04-12', '0000-00-00', 4),
(74, 4, '2023-04-12', '0000-00-00', 4),
(75, 4, '2023-04-12', '0000-00-00', 4),
(77, 8, '2023-04-12', '0000-00-00', 4),
(79, 8, '2023-04-12', '0000-00-00', 4),
(82, 2, '2023-04-12', '2023-04-26', 4),
(62, 6, '2023-04-17', '0000-00-00', 9),
(63, 6, '2023-04-17', '0000-00-00', 9),
(61, 5, '2023-04-17', '0000-00-00', 9),
(65, 6, '2023-04-17', '0000-00-00', 5),
(67, 6, '2023-04-17', '0000-00-00', 5),
(68, 6, '2023-04-17', '0000-00-00', 5),
(69, 6, '2023-04-17', '0000-00-00', 5),
(70, 5, '2023-04-17', '0000-00-00', 5),
(72, 5, '2023-04-17', '0000-00-00', 5),
(73, 5, '2023-04-17', '0000-00-00', 5),
(74, 5, '2023-04-17', '0000-00-00', 5),
(75, 5, '2023-04-17', '0000-00-00', 5),
(76, 4, '2023-04-17', '0000-00-00', 7),
(77, 4, '2023-04-17', '0000-00-00', 5),
(78, 4, '2023-04-17', '0000-00-00', 5),
(79, 4, '2023-04-17', '0000-00-00', 5),
(80, 4, '2023-04-17', '0000-00-00', 5),
(82, 3, '2023-04-17', '0000-00-00', 5),
(75, 6, '2023-04-17', '0000-00-00', 0),
(71, 6, '2023-04-17', '0000-00-00', 5),
(75, 10, '2023-04-17', '0000-00-00', 0),
(61, 6, '2023-04-18', '0000-00-00', 1),
(62, 10, '2023-04-18', '0000-00-00', 1),
(63, 10, '2023-04-18', '0000-00-00', 1),
(65, 10, '2023-04-18', '0000-00-00', 1),
(67, 10, '2023-04-18', '0000-00-00', 1),
(68, 10, '2023-04-18', '0000-00-00', 1),
(69, 10, '2023-04-18', '0000-00-00', 1),
(70, 6, '2023-04-18', '0000-00-00', 1),
(71, 10, '2023-04-18', '0000-00-00', 1),
(72, 6, '2023-04-18', '0000-00-00', 1),
(73, 6, '2023-04-18', '0000-00-00', 1),
(74, 6, '2023-04-18', '0000-00-00', 1),
(76, 5, '2023-04-18', '0000-00-00', 1),
(77, 5, '2023-04-18', '0000-00-00', 1),
(78, 5, '2023-04-18', '0000-00-00', 1),
(79, 5, '2023-04-18', '0000-00-00', 1),
(80, 5, '2023-04-18', '0000-00-00', 1),
(82, 8, '2023-04-18', '0000-00-00', 1),
(83, 1, '2023-05-02', '0000-00-00', 0),
(83, 2, '2023-05-02', '2023-05-03', 0),
(84, 1, '2023-05-02', '0000-00-00', 0),
(84, 2, '2023-05-02', '2023-05-03', 0),
(85, 1, '2023-05-02', '0000-00-00', 0),
(85, 2, '2023-05-02', '2023-05-03', 0),
(86, 1, '2023-05-02', '0000-00-00', 0),
(86, 2, '2023-05-02', '2023-05-04', 0),
(86, 9, '2023-05-02', '0000-00-00', 0),
(87, 1, '2023-05-02', '0000-00-00', 0),
(87, 2, '2023-05-02', '2023-05-10', 0),
(87, 9, '2023-05-02', '0000-00-00', 0),
(88, 1, '2023-05-02', '0000-00-00', 0),
(88, 2, '2023-05-02', '2023-05-04', 0),
(89, 1, '2023-05-02', '0000-00-00', 0),
(89, 2, '2023-05-02', '2023-05-10', 0),
(90, 1, '2023-05-02', '0000-00-00', 0),
(90, 2, '2023-05-02', '2023-05-02', 0),
(91, 1, '2023-05-02', '0000-00-00', 0),
(91, 2, '2023-05-02', '2023-05-01', 0),
(91, 9, '2023-05-02', '0000-00-00', 0),
(92, 1, '2023-05-02', '0000-00-00', 0),
(92, 2, '2023-05-02', '2023-05-17', 0),
(90, 9, '2023-05-03', '0000-00-00', 1),
(93, 1, '2023-05-04', '0000-00-00', 0),
(93, 2, '2023-05-04', '2023-05-31', 0),
(93, 3, '2023-05-04', '0000-00-00', 0),
(93, 8, '2023-05-04', '0000-00-00', 0),
(82, 4, '2023-05-04', '0000-00-00', 16),
(88, 9, '2023-05-05', '0000-00-00', 3),
(94, 1, '2023-05-05', '0000-00-00', 0),
(94, 2, '2023-05-05', '2023-05-31', 0),
(94, 3, '2023-05-05', '0000-00-00', 0),
(94, 8, '2023-05-05', '0000-00-00', 0),
(92, 9, '2023-05-05', '0000-00-00', 3),
(89, 9, '2023-05-05', '0000-00-00', 3),
(94, 9, '2023-05-06', '0000-00-00', 1),
(80, 9, '2023-05-06', '0000-00-00', 18),
(95, 1, '2023-05-06', '0000-00-00', 0),
(96, 1, '2023-05-06', '0000-00-00', 0),
(93, 4, '2023-05-07', '0000-00-00', 3),
(95, 2, '2023-05-07', '2023-05-31', 1),
(95, 3, '2023-05-07', '0000-00-00', 0),
(95, 8, '2023-05-07', '0000-00-00', 0),
(95, 4, '2023-05-07', '0000-00-00', 0),
(96, 2, '2023-05-07', '2023-05-31', 1),
(96, 3, '2023-05-07', '0000-00-00', 0),
(96, 8, '2023-05-07', '0000-00-00', 0),
(96, 4, '2023-05-07', '0000-00-00', 0),
(96, 5, '2023-05-07', '0000-00-00', 0),
(96, 6, '2023-05-07', '0000-00-00', 0),
(96, 10, '2023-05-07', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientolicitacion`
--

CREATE TABLE `movimientolicitacion` (
  `idLicitacion` int(4) NOT NULL,
  `idEstadoLicitacion` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `fechaven` date NOT NULL,
  `cantDias` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimientolicitacion`
--

INSERT INTO `movimientolicitacion` (`idLicitacion`, `idEstadoLicitacion`, `fecha`, `fechaven`, `cantDias`) VALUES
(16, 1, '2022-10-25', '2022-10-31', 0),
(17, 1, '2022-10-25', '2022-10-31', 0),
(18, 1, '2022-10-26', '2022-10-31', 0),
(18, 2, '2022-10-31', '0000-00-00', 5),
(18, 3, '2022-10-31', '0000-00-00', 0),
(18, 4, '2022-11-01', '0000-00-00', 1),
(18, 5, '2022-11-01', '0000-00-00', 0),
(18, 6, '2022-11-01', '0000-00-00', 0),
(19, 1, '2022-11-01', '2022-11-02', 0),
(17, 2, '2022-11-01', '0000-00-00', 7),
(17, 3, '2022-11-01', '0000-00-00', 0),
(17, 4, '2022-11-01', '0000-00-00', 0),
(17, 5, '2022-11-01', '0000-00-00', 0),
(17, 6, '2022-11-01', '0000-00-00', 0),
(16, 2, '2022-11-22', '0000-00-00', 28),
(16, 3, '2022-11-22', '0000-00-00', 0),
(16, 4, '2022-11-22', '0000-00-00', 0),
(19, 2, '2022-11-22', '0000-00-00', 21),
(19, 3, '2022-11-22', '0000-00-00', 0),
(19, 4, '2022-11-22', '0000-00-00', 0),
(19, 5, '2022-11-22', '0000-00-00', 0),
(19, 6, '2022-11-22', '0000-00-00', 0),
(16, 5, '2023-03-14', '0000-00-00', 83),
(16, 6, '2023-03-14', '0000-00-00', 0),
(20, 1, '2023-03-16', '2023-03-31', 0),
(20, 2, '2023-03-16', '0000-00-00', 0),
(20, 3, '2023-03-16', '0000-00-00', 0),
(20, 4, '2023-03-16', '0000-00-00', 0),
(20, 5, '2023-03-16', '0000-00-00', 0),
(20, 6, '2023-03-16', '0000-00-00', 0),
(21, 1, '2023-03-16', '2023-03-31', 0),
(21, 2, '2023-03-16', '0000-00-00', 0),
(22, 1, '2023-03-16', '2023-03-31', 0),
(22, 2, '2023-03-16', '0000-00-00', 0),
(22, 3, '2023-03-16', '0000-00-00', 0),
(22, 4, '2023-03-16', '0000-00-00', 0),
(23, 1, '2023-03-16', '2023-03-31', 0),
(23, 2, '2023-03-16', '0000-00-00', 0),
(23, 3, '2023-03-16', '0000-00-00', 0),
(23, 4, '2023-03-16', '0000-00-00', 0),
(23, 5, '2023-03-16', '0000-00-00', 0),
(23, 6, '2023-03-16', '0000-00-00', 0),
(24, 1, '2023-03-18', '2023-03-31', 0),
(24, 2, '2023-03-18', '0000-00-00', 0),
(24, 3, '2023-03-18', '0000-00-00', 0),
(24, 4, '2023-03-18', '0000-00-00', 0),
(24, 5, '2023-03-18', '0000-00-00', 0),
(24, 6, '2023-03-18', '0000-00-00', 0),
(25, 1, '2023-03-21', '2023-03-31', 0),
(26, 1, '2023-03-21', '2023-03-31', 0),
(27, 1, '2023-03-21', '2023-03-31', 0),
(25, 2, '2023-03-22', '0000-00-00', 1),
(25, 3, '2023-03-22', '0000-00-00', 0),
(25, 4, '2023-03-22', '0000-00-00', 0),
(25, 5, '2023-03-22', '0000-00-00', 0),
(25, 6, '2023-03-22', '0000-00-00', 0),
(26, 2, '2023-03-26', '0000-00-00', 5),
(27, 2, '2023-03-26', '0000-00-00', 5),
(21, 3, '2023-03-26', '0000-00-00', 10),
(28, 1, '2023-03-26', '2023-03-31', 0),
(29, 1, '2023-03-26', '2023-04-26', 0),
(30, 1, '2023-03-26', '2023-04-28', 0),
(31, 1, '2023-03-26', '2023-04-26', 0),
(28, 2, '2023-03-27', '0000-00-00', 1),
(29, 2, '2023-03-27', '0000-00-00', 1),
(30, 2, '2023-03-27', '0000-00-00', 1),
(31, 2, '2023-03-27', '0000-00-00', 1),
(21, 4, '2023-03-29', '0000-00-00', 3),
(22, 5, '2023-03-29', '0000-00-00', 13),
(26, 3, '2023-03-29', '0000-00-00', 3),
(27, 3, '2023-03-29', '0000-00-00', 3),
(28, 3, '2023-03-29', '0000-00-00', 2),
(29, 3, '2023-03-29', '0000-00-00', 2),
(30, 7, '2023-03-29', '0000-00-00', 2),
(31, 3, '2023-03-29', '0000-00-00', 2),
(32, 1, '2023-03-29', '2023-04-27', 0),
(33, 1, '2023-03-29', '2023-04-26', 0),
(34, 1, '2023-03-29', '2023-04-28', 0),
(22, 6, '2023-04-03', '0000-00-00', 5),
(32, 2, '2023-04-03', '0000-00-00', 5),
(33, 2, '2023-04-03', '0000-00-00', 5),
(34, 2, '2023-04-03', '0000-00-00', 5),
(35, 1, '2023-04-08', '2023-04-29', 0),
(35, 2, '2023-04-08', '0000-00-00', 0),
(35, 3, '2023-04-08', '0000-00-00', 0),
(35, 4, '2023-04-08', '0000-00-00', 0),
(35, 5, '2023-04-08', '0000-00-00', 0),
(35, 6, '2023-04-08', '0000-00-00', 0),
(21, 5, '2023-04-08', '0000-00-00', 10),
(27, 4, '2023-04-08', '0000-00-00', 10),
(28, 4, '2023-04-08', '0000-00-00', 10),
(29, 4, '2023-04-08', '0000-00-00', 10),
(31, 4, '2023-04-08', '0000-00-00', 10),
(32, 3, '2023-04-08', '0000-00-00', 5),
(33, 3, '2023-04-08', '0000-00-00', 5),
(34, 3, '2023-04-08', '0000-00-00', 5),
(21, 6, '2023-04-12', '0000-00-00', 4),
(26, 4, '2023-04-12', '0000-00-00', 14),
(27, 5, '2023-04-12', '0000-00-00', 4),
(28, 5, '2023-04-12', '0000-00-00', 4),
(29, 5, '2023-04-12', '0000-00-00', 4),
(31, 5, '2023-04-12', '0000-00-00', 4),
(33, 4, '2023-04-12', '0000-00-00', 4),
(34, 4, '2023-04-12', '0000-00-00', 4),
(26, 5, '2023-04-17', '0000-00-00', 5),
(27, 6, '2023-04-17', '0000-00-00', 5),
(28, 6, '2023-04-17', '0000-00-00', 5),
(29, 6, '2023-04-17', '0000-00-00', 5),
(31, 6, '2023-04-17', '0000-00-00', 5),
(32, 4, '2023-04-17', '0000-00-00', 9),
(33, 5, '2023-04-17', '0000-00-00', 5),
(34, 5, '2023-04-17', '0000-00-00', 5),
(36, 1, '2023-05-01', '2023-05-31', 0),
(37, 1, '2023-05-02', '2023-05-17', 0),
(38, 1, '2023-05-02', '2023-05-01', 0),
(38, 7, '2023-05-02', '0000-00-00', 0),
(37, 2, '2023-05-03', '0000-00-00', 1),
(37, 3, '2023-05-03', '0000-00-00', 0),
(37, 4, '2023-05-03', '0000-00-00', 0),
(37, 5, '2023-05-03', '0000-00-00', 0),
(37, 6, '2023-05-03', '0000-00-00', 0),
(39, 1, '2023-05-05', '2023-05-31', 0),
(36, 2, '2023-05-05', '0000-00-00', 4),
(36, 3, '2023-05-05', '0000-00-00', 19482),
(39, 2, '2023-05-06', '0000-00-00', 1),
(39, 3, '2023-05-06', '0000-00-00', 0),
(40, 1, '2023-05-06', '2023-05-31', 0),
(40, 2, '2023-05-06', '0000-00-00', 0),
(40, 3, '2023-05-06', '0000-00-00', 0),
(41, 1, '2023-05-07', '2023-05-31', 0),
(42, 1, '2023-05-07', '2023-05-31', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientoproducto`
--

CREATE TABLE `movimientoproducto` (
  `idMovimientoProducto` int(10) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `idEstadoProducto` int(1) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `idMotivo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimientoproducto`
--

INSERT INTO `movimientoproducto` (`idMovimientoProducto`, `idProducto`, `fecha`, `idEstadoProducto`, `cantidad`, `idMotivo`) VALUES
(1, 19, '2022-10-24', 3, 2, 5),
(2, 17, '2022-10-24', 3, 53, 5),
(3, 17, '2022-10-31', 3, 2, 1),
(4, 2, '2022-11-01', 1, 8, 2),
(5, 34, '2022-11-01', 1, 15, 2),
(8, 7, '2022-11-01', 1, 11, 2),
(9, 6, '2022-11-01', 1, 65, 2),
(10, 8, '2022-11-01', 1, 9, 2),
(11, 2, '2022-11-14', 2, 18, 3),
(12, 3, '2022-11-14', 2, 14, 3),
(13, 2, '2022-11-14', 3, 18, 3),
(14, 3, '2022-11-14', 3, 14, 3),
(15, 6, '2022-11-22', 1, 4, 2),
(16, 5, '2022-11-22', 1, 14, 2),
(17, 18, '2022-11-22', 1, 5, 2),
(18, 4, '2022-11-24', 2, 16, 4),
(19, 4, '2022-11-24', 3, 16, 3),
(20, 12, '2022-11-24', 2, 67, 4),
(21, 5, '2022-11-24', 2, 30, 4),
(22, 12, '2022-11-24', 3, 67, 3),
(23, 5, '2022-11-24', 3, 30, 3),
(24, 5, '2023-03-16', 2, 7, 4),
(25, 3, '2023-03-16', 2, 1, 4),
(26, 5, '2023-03-16', 3, 7, 3),
(27, 3, '2023-03-16', 3, 1, 3),
(28, 1, '2023-03-16', 1, 12, 2),
(29, 4, '2023-03-16', 1, 2, 2),
(30, 465, '2023-03-16', 1, 2, 2),
(31, 252, '2023-03-16', 1, 12, 2),
(32, 17, '2023-03-16', 3, 1, 5),
(33, 1, '2023-03-18', 2, 18, 4),
(34, 1, '2023-03-18', 3, 18, 3),
(35, 119, '2023-03-18', 1, 3, 2),
(36, 330, '2023-03-18', 1, 4, 2),
(37, 123, '2023-03-22', 2, 4, 4),
(38, 123, '2023-03-22', 3, 4, 3),
(39, 117, '2023-03-22', 1, 12, 2),
(40, 4, '2023-03-26', 2, 7, 4),
(41, 4, '2023-03-26', 2, 15, 4),
(42, 4, '2023-03-29', 3, 15, 3),
(43, 4, '2023-03-29', 3, 7, 3),
(44, 438, '2023-03-29', 1, 2, 2),
(45, 2, '2023-04-03', 2, 4, 4),
(46, 3, '2023-04-03', 2, 4, 4),
(47, 12, '2023-04-08', 2, 13, 4),
(48, 6, '2023-04-08', 2, 15, 4),
(49, 2, '2023-04-08', 3, 4, 3),
(50, 3, '2023-04-08', 3, 4, 3),
(51, 1, '2023-04-08', 2, 6, 4),
(52, 343, '2023-04-08', 2, 2, 4),
(53, 151, '2023-04-08', 2, 4, 4),
(54, 90, '2023-04-08', 2, 1, 4),
(55, 243, '2023-04-08', 2, 2, 4),
(56, 12, '2023-04-08', 1, 100, 2),
(57, 16, '2023-04-08', 1, 24, 2),
(58, 437, '2023-04-08', 1, 4, 2),
(59, 467, '2023-04-08', 1, 4, 2),
(60, 459, '2023-04-08', 1, 2, 2),
(61, 17, '2023-04-08', 1, 100, 2),
(62, 309, '2023-04-08', 2, 4, 4),
(63, 254, '2023-04-08', 2, 7, 4),
(64, 309, '2023-04-08', 3, 4, 3),
(65, 254, '2023-04-08', 3, 7, 3),
(66, 4, '2023-04-12', 3, 15, 3),
(67, 2, '2023-04-12', 3, 4, 3),
(68, 3, '2023-04-12', 3, 4, 3),
(69, 310, '2023-04-12', 2, 2, 4),
(70, 1, '2023-04-12', 3, 6, 3),
(71, 243, '2023-04-12', 3, 2, 3),
(72, 310, '2023-04-12', 3, 2, 3),
(73, 343, '2023-04-12', 3, 2, 3),
(74, 151, '2023-04-12', 3, 4, 3),
(75, 376, '2023-04-12', 2, 4, 4),
(76, 90, '2023-04-12', 3, 1, 3),
(77, 377, '2023-04-12', 2, 3, 4),
(78, 285, '2023-04-12', 2, 3, 4),
(79, 437, '2023-04-12', 2, 4, 4),
(80, 239, '2023-04-12', 1, 5, 2),
(81, 11, '2023-04-12', 1, 3, 2),
(82, 143, '2023-04-12', 1, 3, 2),
(83, 186, '2023-04-12', 1, 5, 2),
(84, 266, '2023-04-12', 1, 2, 2),
(85, 283, '2023-04-12', 1, 1, 2),
(86, 124, '2023-04-17', 1, 4, 2),
(87, 12, '2023-04-17', 3, 13, 3),
(88, 6, '2023-04-17', 3, 15, 3),
(89, 376, '2023-04-17', 3, 4, 3),
(90, 243, '2023-04-17', 3, 2, 3),
(91, 310, '2023-04-17', 3, 2, 3),
(92, 377, '2023-04-17', 3, 3, 3),
(93, 285, '2023-04-17', 3, 3, 3),
(94, 437, '2023-04-17', 3, 4, 3),
(95, 6, '2023-04-17', 2, 3, 4),
(96, 317, '2023-04-17', 2, 2, 4),
(97, 459, '2023-04-17', 2, 8, 4),
(98, 463, '2023-04-17', 2, 5, 4),
(99, 372, '2023-04-17', 2, 4, 4),
(100, 16, '2023-04-17', 2, 3, 4),
(101, 13, '2023-04-17', 2, 2, 4),
(102, 186, '2023-04-17', 2, 1, 4),
(103, 288, '2023-04-17', 2, 3, 4),
(104, 6, '2023-04-18', 3, 3, 3),
(105, 317, '2023-04-18', 3, 2, 3),
(106, 459, '2023-04-18', 3, 8, 3),
(107, 463, '2023-04-18', 3, 5, 3),
(108, 372, '2023-04-18', 3, 4, 3),
(109, 16, '2023-04-18', 3, 3, 3),
(110, 13, '2023-04-18', 3, 2, 3),
(111, 186, '2023-04-18', 3, 1, 3),
(112, 288, '2023-04-18', 3, 3, 3),
(113, 15, '2023-05-03', 1, 4, 2),
(114, 395, '2023-05-04', 2, 1, 4),
(115, 343, '2023-05-04', 2, 1, 4),
(116, 465, '2023-05-04', 2, 1, 4),
(117, 405, '2023-05-04', 2, 4, 4),
(118, 465, '2023-05-07', 2, 500, 4),
(119, 92, '2023-05-07', 2, 12, 4),
(120, 121, '2023-05-07', 2, 3, 4),
(121, 121, '2023-05-07', 3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulacionlicitacion`
--

CREATE TABLE `postulacionlicitacion` (
  `idPostulacion` int(4) NOT NULL,
  `idLicitacion` int(4) NOT NULL,
  `idUsuario` int(4) NOT NULL,
  `observacion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `postulacionlicitacion`
--

INSERT INTO `postulacionlicitacion` (`idPostulacion`, `idLicitacion`, `idUsuario`, `observacion`) VALUES
(19, 17, 1, ''),
(20, 16, 1, 'asd'),
(21, 18, 1, 'Observacion nueva'),
(22, 19, 1, ''),
(23, 20, 1, ''),
(24, 15, 1, ''),
(25, 21, 1, ''),
(26, 22, 11, ''),
(27, 23, 11, ''),
(28, 24, 1, ''),
(29, 25, 11, ''),
(30, 26, 11, ''),
(31, 27, 11, ''),
(32, 26, 18, ''),
(33, 27, 18, ''),
(34, 28, 20, ''),
(35, 29, 20, ''),
(36, 30, 20, ''),
(37, 31, 20, ''),
(38, 28, 11, ''),
(39, 29, 11, ''),
(40, 30, 11, ''),
(41, 31, 11, ''),
(42, 28, 18, ''),
(43, 29, 18, ''),
(44, 30, 18, ''),
(45, 31, 18, ''),
(46, 32, 20, ''),
(47, 33, 20, ''),
(48, 34, 20, ''),
(49, 32, 11, ''),
(50, 33, 11, ''),
(51, 34, 11, ''),
(52, 32, 18, ''),
(53, 33, 18, ''),
(54, 32, 1, ''),
(55, 35, 20, ''),
(56, 37, 11, ''),
(57, 36, 11, ''),
(58, 39, 20, ''),
(59, 39, 18, ''),
(60, 39, 11, ''),
(61, 40, 11, ''),
(62, 41, 20, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(5) NOT NULL,
  `producto` varchar(500) NOT NULL,
  `idGrupoProducto` int(5) NOT NULL,
  `idTipoProducto` int(5) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `idEstadoProducto` int(1) NOT NULL,
  `minimo` int(5) NOT NULL,
  `maximo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `producto`, `idGrupoProducto`, `idTipoProducto`, `cantidad`, `idEstadoProducto`, `minimo`, `maximo`) VALUES
(1, 'PROTESIS RPC TIPO THOMPSON', 1, 1, 88, 1, 10, 20),
(2, 'PROTESIS PARA REEMPLAZO DE CADERA CON CABEZA DE DOBLE MOVILIDAD TALLO PULIDO ESPEJO MODULAR', 1, 1, 102, 1, 30, 60),
(3, 'PROTESIS PARA REEMPLAZO DE CADERA CON CABEZA DE DOBLE MOVILIDAD CABEZA FIJA STANDARD Y REFORZADA', 1, 1, 81, 1, 5, 10),
(4, 'PROTESIS PARA REEMPLAZO PARCIAL DE CADERA TIPO BIPOLAR', 1, 1, 64, 1, 5, 10),
(5, 'PROTESIS RTC TIPO CHARNLEY CEMENTADA TOTAL CABEZA 22-28 CABEZA ACERO CUPULA DE POLIETILENO', 2, 1, 77, 1, 5, 10),
(6, 'PROTESIS RTC TIPO CHARNLEY CEMENTADA TOTAL CON TALLO PULIDO ESPEJO CABEZA ACERO 28-32-36 CUPULA DE POLIETILENO', 2, 1, 151, 1, 30, 60),
(7, 'PROTESIS RTC TIPO CHARNLEY CEMENTADA TOTAL CON TALLO PULIDO ESPEJO CABEZA CERAMICA 28-32 CUPULA DE POLIETILENO', 2, 1, 111, 1, 30, 60),
(8, 'PROTESIS RTC TIPO MULLER AUTOBLOQUEANTE CABEZA ACERO 28-32 CUPULA POLIETILENO', 2, 2, 59, 1, 5, 10),
(9, 'PROTESIS RTC TIPO MULLER AUTOBLOQUEANTE CABEZA ACERO 28-32-36 CUPULA POLIETILENO', 2, 2, 50, 1, 5, 10),
(10, 'PROTESIS RTC TIPO MULLER AUTOBLOQUEANTE CABEZA CERAMICA 28-32 CUPULA POLIETILENO', 2, 2, 75, 1, 5, 10),
(11, 'PROTESIS RTC OFFSET ANGULO VARIABLE CABEZA 28-32-36 CUPULA DE POLIETILENO', 2, 2, 53, 1, 5, 10),
(12, 'PROTESIS RTC DE REVISION TALLO TIPO CHARNLEY CABEZA ACERO 28-32-36 CUPULA POLIETILENO', 3, 2, 95, 1, 30, 60),
(13, 'PROTESIS RTC DE REVISION TALLO TIPO CHARNLEY CABEZA CERAMICA 28-32 CUPULA POLIETILENO', 3, 2, 48, 1, 30, 60),
(14, 'PROTESIS PARA REVISION DE CADERA ANGULO VARIABLE OFFSET VARIABLE CABEZA ACERO 28-32-36', 3, 2, 75, 1, 5, 10),
(15, 'PROTESIS DE REVISION ESPECIAL DE CADERA CEMENTADA', 3, 2, 79, 1, 5, 10),
(16, 'PROTESIS RTC TALLO TIPO CHARNLEY PULIDO ESPEJO CABEZA ACERO 28-32 CUPULA NO CEMENTADA PRESSFIT RECUBIERTA EN PLASMA DE TITANIO CON LINER DE POLIETILENO', 4, 1, 71, 1, 30, 60),
(17, 'PROTESIS RTC TALLO TIPO MULLER AUTOBLOQUEANTE CABEZA ACERO 28-32 CUPULA NO CEMENTADA PRESSFIT RECUBIERTA EN PLASMA DE TITANIO CON LINER DE POLIETILENO', 4, 1, 119, 1, 30, 60),
(18, 'PROTESIS RTC TALLO TIPO CHARNLEY PULIDO ESPEJO CABEZA ACERO 28 CUPULA NO CEMENTADA PRESSFIT CON RECUBRIMIENTO POROSO DE HIDROXIAPATITA LINER DE POLIETILENO', 4, 1, 80, 1, 30, 60),
(19, 'PROTESIS RTC TALLO TIPO MULLER AUTOBLOQUEANTE CABEZA ACERO 28 CUPULA NO CEMENTADA PRESSFIT CON RECUBRIMIENTO POROSO DE HIDROXIAPATITA LINER DE POLIETILENO', 4, 1, 48, 1, 30, 60),
(20, 'PROTESIS RTC TALLO TIPO CHARNLEY PULIDO ESPEJO CABEZA CERAMICA 28-32 CUPULA NO CEMENTADA PRESSFIT RECUBIERTA EN PLASMA DE TITANIO CON LINER DE POLIETILENO', 5, 2, 75, 1, 30, 60),
(21, 'PROTESIS RTC TALLO TIPO MULLER AUTOBLOQUEANTE CABEZA CERAMICA 28-32 CUPULA NO CEMENTADA PRESSFIT RECUBIERTA EN PLASMA DE TITANIO CON LINER DE POLIETILENO', 5, 2, 75, 1, 30, 60),
(22, 'PROTESIS RTC TALLO TIPO CHARNLEY PULIDO ESPEJO CABEZA CERAMICA 28 CUPULA NO CEMENTADA PRESSFIT CON RECUBRIMIENTO POROSO DE HIDROXIAPATITA LINER DE POLIETILENO', 5, 2, 50, 1, 30, 60),
(23, 'PROTESIS RTC TALLO TIPO MULLER AUTOBLOQUEANTE CABEZA CERAMICA 28 CUPULA NO CEMENTADA PRESSFIT CON RECUBRIMIENTO POROSO DE HIDROXIAPATITA LINER DE POLIETILENO', 5, 2, 50, 1, 30, 60),
(24, 'PROTESIS RTC HIBRIDA PARA REVISION TALLO MODULAR CABEZA DE ACERO DIAMETRO 28-32 CUPULA NO CEMENTADA RECUBIERTA EN PLASMA SPRAY DE TITANIO', 6, 1, 80, 1, 30, 60),
(25, 'PROTESIS RTC HIBRIDA PARA REVISION TALLO MODULAR CABEZA DE ACERO DIAMETRO 28-32-36 CUPULA NO CEMENTADA RECUBIERTA EN PLASMA SPRAY DE TITANIO', 6, 1, 100, 1, 30, 60),
(26, 'PROTESIS RTC HIBRIDA PARA TALLO REVISION MODULAR CABEZA ACERO DIAMETRO 28 CUPULA NO CEMENTADA RECUBIERTO POROSO EN HIDROXIAPATITA', 6, 1, 100, 1, 30, 60),
(27, 'PROTESIS RTC HIBRIDA PARA REVISION TALLO MODULAR CABEZA CERAMICA DIAMETRO 28-32 CUPULA NO CEMENTADA RECUBIERTA EN PLASMA SPRAY DE TITANIO', 7, 2, 50, 1, 30, 60),
(28, 'PROTESIS RTC HIBRIDA PARA TALLO REVISION MODULAR CABEZA CERAMICA DIAMETRO 28 CUPULA NO CEMENTADA RECUBIERTO POROSO EN HIDROXIAPATITA', 7, 2, 50, 1, 30, 60),
(29, 'PROTESIS RTC TALLO NACIONAL TIPO CHARNLEY PULIDO ESPEJO CABEZA ACERO 28-32 CUPULA IMPORTADA NO CEMENTADA PRESSFIT CON RECUBRIMIENTO DE HIDROXIAPATITA LINER DE POLIETILENO', 8, 2, 50, 1, 30, 60),
(30, 'PROTESIS RTC TALLO NACIONAL TIPO CHARNLEY PULIDO ESPEJO CABEZA CERAMICA 28-32 CUPULA IMPORTADA NO CEMENTADA PRESSFIT CON RECUBRIMIENTO DE HIDROXIAPATITA LINER DE POLIETILENO', 9, 2, 50, 1, 30, 60),
(31, 'PROTESIS RTC TALLO NACIONAL TIPO CHARNLEY PULIDO ESPEJO CABEZA CERAMICA 28-32 CUPULA IMPORTADA NO CEMENTADA PRESSFIT CON RECUBRIMIENTO DE HIDROXIAPATITA LINER DE CERAMICA', 9, 2, 50, 1, 30, 60),
(32, 'TALLO DE REVISION MODULAR CABEZA DIAMETRO 28-32 ACERO RECUBIERTA EN HIDROXIAPATITA LINER DE POLITILENO', 10, 2, 50, 1, 30, 60),
(33, 'TALLO DE REVISION MODULAR CABEZA DIAMETRO 28-32 CERAMICA RECUBIERTA EN HIDROXIAPATITA LINER DE POLITILENO', 11, 2, 50, 1, 30, 60),
(34, 'TALLO DE REVISION MODULAR CABEZA DIAMETRO 28-32 CERAMICA RECUBIERTA EN HIDROXIAPATITA LINER DE CERAMICA', 11, 2, 80, 1, 30, 60),
(35, 'PROTESIS RTC NO CEMENTADA CABEZA ACERO 28-32 TALLO Y CUPULA PRESSFIT RECUBIERTO EN PLASMA DE TITANIO LINER DE POLIETILENO', 12, 1, 100, 1, 30, 60),
(36, 'PROTESIS RTC NO CEMENTADA CABEZA ACERO 28-32 TALLO Y CUPULA PRESSFIT RECUBIERTO POROSO EN HIDROXIAPATITA LINER DE POLIETILENO', 12, 1, 100, 1, 30, 60),
(37, 'PROTESIS RTC NO CEMENTADA CON TALLO MINIMAMENTE INVASIVO CON CUBIERTA PROXIMAL EN PLASMA SPRAY DE TITANIO + HIDROXIAPATITA DIAM 22 - ORIGEN NACIONAL', 12, 1, 100, 1, 30, 60),
(38, 'PROTESIS RTC NO CEMENTADA CABEZA CERAMICA 28-32 TALLO Y CUPULA PRESSFIT RECUBIERTO EN PLASMA DE TITANIO LINER DE POLIETILENO', 13, 1, 100, 1, 30, 60),
(39, 'PROTESIS RTC NO CEMENTADA CABEZA CERAMICA 28-32 TALLO Y CUPULA PRESSFIT RECUBIERTO POROSO EN HIDROXIAPATITA LINER DE POLIETILENO', 13, 1, 100, 1, 30, 60),
(40, 'PROTESIS RTC NO CEMENTADA CABEZA ACERO 28-32 TALLO PRISMATICO Y CUPULA PRESSFIT RECUBIERTOS EN HIDROXIAPATITA LINER DE POLIETILENO', 14, 2, 50, 1, 30, 60),
(41, 'PROTESIS RTC NO CEMENTADA CABEZA ACERO 28-32 TALLO CON PERFIL AUTOBLOQUEANTE Y CUPULA PRESSFIT RECUBIERTOS EN HIDROXIAPATITA LINER DE POLIETILENO', 14, 2, 50, 1, 30, 60),
(42, 'PROTESIS RTC NO CEMENTADA CABEZA CERAMICA 28-32 TALLO PRISMATICO Y CUPULA PRESSFIT RECUBIERTOS EN HIDROXIAPATITA LINER DE POLIETILENO', 14, 2, 50, 1, 30, 60),
(43, 'PROTESIS RTC NO CEMENTADA CABEZA CERAMICA 28-32 TALLO CON PERFIL AUTOBLOQUEANTE Y CUPULA PRESSFIT MISTRAL RECUBIERTOS EN HIDROXIAPATITA LINER DE POLIETILENO', 14, 2, 50, 1, 30, 60),
(44, 'PROTESIS RTR MONOBLOCK CEMENTADA TOTAL TIPO INSALL', 15, 1, 100, 1, 10, 30),
(45, 'PROTESIS RTR MODULAR TIPO INSALL CON CU?AS Y VASTAGOS TIBIALES', 15, 1, 100, 1, 10, 30),
(46, 'PROTESIS RTR MODULAR TIPO INSALL CON CU?AS Y VASTAGOS FEMORALES', 15, 1, 100, 1, 10, 30),
(47, 'PROTESIS RTR NO CONVENCIONAL/ENDOPROTESIS PARA REEMPLAZO DE FEMUR DISTAL O TIBIA PROXIMAL', 15, 2, 50, 1, 10, 30),
(48, 'PROTESIS RTR NO CONVENCIONAL/ENDOPROTESIS PARA REEMPLAZO DE FEMUR DISTAL Y TIBIA PROXIMAL', 15, 2, 50, 1, 10, 30),
(49, 'PROTESIS RTR MODULAR ANATOMICA 5 MEDIDAS FEMORALES', 15, 1, 100, 1, 10, 30),
(50, 'PROTESIS RTR MODULAR ANATOMICA 8 MEDIDAS FEMORALES', 15, 2, 50, 1, 10, 30),
(51, 'PROTESIS RTR MODULAR ANATOMICA 5 MEDIDAS FEMORALES Y VASTAGO TIBIAL', 15, 2, 50, 1, 10, 30),
(52, 'PROTESIS RTR ABISAGRADA', 15, 2, 50, 1, 10, 30),
(53, 'PROTESIS RTR MODULAR ANATOMICA 5 MEDIDAS FEMORALES CON SISTEMA TIBIAL ROTATIVO', 15, 2, 50, 1, 10, 30),
(54, 'PROTESIS RTR MODULAR ANATOMICA DE 12 MEDIDAS FEMORALES ULTRACONGRUENTE - ORIGEN NACIONAL', 15, 2, 50, 1, 10, 30),
(55, 'PROTESIS RTR MODULAR ANATOMICA 8 MEDIDAS FEMORALES INTERCONDILAR CON ALEACION CROMO-COBALTO MOLIBDENO - ORIGEN NACIONAL', 15, 2, 50, 1, 10, 30),
(56, 'PROTESIS RTR MODULAR ANATOMICA ULTRACOMPATIBLE DE REVISION ULTRACONGRUENTE CON VASTAGOS - ORIGEN NACIONAL', 15, 2, 50, 1, 10, 30),
(57, 'PROTESIS RTR MODULAR ANATOMICA ULTRACOMPATIBLE DE REVISION ULTRACONGRUENTE CON CU?AS Y VASTAGOS - ORIGEN NACIONAL', 15, 2, 50, 1, 10, 30),
(58, 'PROTESIS RTR ABISAGRADA DE REVISION CON CENTRALIZADOR DISTAL EN AMBOS VASTAGOS - ORIGEN NACIONAL', 15, 2, 50, 1, 10, 30),
(59, 'PROTESIS RTR MODULAR TIPO INSALL CON CU?AS Y VASTAGOS TIBIALES Y FEMORALES (REVISION)', 16, 1, 100, 1, 10, 30),
(60, 'PROTESIS DE REVISION DE RODILLA EN CR.CO ARTICULACION DE ALTA RESISTENCIA', 16, 1, 100, 1, 5, 20),
(61, 'PROTESIS RTR MODULAR ANATOMICA 8 MEDIDAS FEMORALES', 17, 1, 100, 1, 10, 30),
(62, 'PROTESIS PARA REEMPLAZO PARCIAL DE HOMBRO CABEZA INTERCAMBIABLE CON LATERILIZACION GRADUABLE', 18, 1, 100, 1, 5, 20),
(63, 'PROTESIS PARA REEMPLAZO TOTAL DE HOMBRO CABEZA INTERCAMBIABLE CON LATERILIZACION GRADUABLE', 18, 1, 100, 1, 5, 20),
(64, 'ESPACIADOR DE RODILLA CON ANTIBIOTICO GENTAMICINA O TOBRAMICINA', 19, 2, 50, 1, 5, 20),
(65, 'ESPACIADOR DE CADERA CON ANTIBIOTICO GENTAMICINA O TOBRAMICINA', 19, 2, 50, 1, 5, 10),
(66, 'ESPACIADOR PARA CADERA DE REVISION CON ANTIBIOTICO GENTAMICINA O TOBRAMICINA', 19, 2, 50, 1, 5, 10),
(67, 'KIT PARA ESPACIADOR DE RODILLA CON SHOCK ADICIONAL DE ANTIBIOTICO', 19, 2, 50, 1, 5, 20),
(68, 'STERI DRAPE', 20, 1, 100, 1, 100, 500),
(69, 'U DRAPE', 20, 1, 100, 1, 100, 500),
(70, 'HEMOSUCTOR', 20, 1, 100, 1, 5, 20),
(71, 'IOBAN', 20, 1, 100, 1, 5, 20),
(72, 'CEMENTO QUIRURGICO', 21, 1, 100, 1, 100, 500),
(73, 'CEMENTO QUIRURGICO CON ANTIBIOTICO GENTAMICINA', 21, 1, 100, 1, 100, 500),
(74, 'CEMENTO GUN', 21, 1, 100, 1, 100, 500),
(75, 'CEMENTO GUN CON ANTIBIOTICO GENTAMICINA', 21, 1, 100, 1, 100, 500),
(76, 'TAPON ENDOMEDULAR', 21, 2, 50, 1, 5, 20),
(77, 'MATRIZ PARA OBSTRUCCION MEDULAR ABSORBIBLE', 21, 2, 50, 1, 5, 20),
(78, 'MALLA PARA REFUERZO ACETABULAR', 21, 2, 50, 1, 5, 20),
(79, 'ANILLO PARA REFUERZO ACETABULAR', 21, 2, 50, 1, 5, 20),
(80, 'COTILO TIPO JUMBO', 21, 1, 100, 1, 20, 50),
(81, 'COTILO AUTORRETENTIVO', 21, 1, 100, 1, 20, 50),
(82, 'COTILO CONSTRE?IDO', 21, 1, 100, 1, 20, 50),
(83, 'ESPONJA DE COLAGENO CON LIBERACION DE ANTIBIOTICO', 21, 2, 50, 1, 5, 20),
(84, 'SUSTITUTO OSEO DE 5 CC GRANULADO', 21, 1, 100, 1, 100, 500),
(85, 'SUSTITUTO OSEO DE 15 CC GRANULADO', 21, 1, 100, 1, 100, 500),
(86, 'SUSTITUTO OSEO DE 30 CC GRANULADO', 21, 1, 100, 1, 100, 500),
(87, 'SUSTITUTO OSEO DE 5 CC ENRIQUECIDO CON COLAGENO', 21, 1, 100, 1, 100, 500),
(88, 'SUSTITUTO OSEO DE 15 CC ENRIQUECIDO CON COLAGENO', 21, 1, 100, 1, 100, 500),
(89, 'SUSTITUTO OSEO DE 30 CC ENRIQUECIDO CON COLAGENO', 21, 1, 100, 1, 100, 500),
(90, 'SUSTITUTO OSEO EN POLVO', 21, 1, 99, 1, 100, 500),
(91, 'SUSTITUTO OSEO EN BLOQUE', 21, 1, 100, 1, 100, 500),
(92, 'MATRIZ OSEA EXTRACELULAR', 21, 2, 38, 1, 5, 20),
(93, 'MATRIZ MINERAL DE HIDROXIAPATITA', 21, 2, 50, 1, 5, 20),
(94, 'MEMBRANA ENRIQUECIDA CON COLAGENO S', 21, 2, 50, 1, 100, 500),
(95, 'MEMBRANA ENRIQUECIDA CON COLAGENO M', 21, 2, 50, 1, 100, 500),
(96, 'MEMBRANA ENRIQUECIDA CON COLAGENO L', 21, 2, 50, 1, 100, 500),
(97, 'MEMBRANA REABSORBIBLE S', 21, 2, 50, 1, 100, 500),
(98, 'MEMBRANA REABSORBIBLE M', 21, 2, 50, 1, 100, 500),
(99, 'MEMBRANA REABSORBIBLE L', 21, 2, 50, 1, 100, 500),
(100, 'SUTURA DE ALTA RESISTENCIA', 21, 1, 100, 1, 100, 500),
(101, 'SUTURA TOP CLOSURE PARA CIERRE', 21, 1, 100, 1, 100, 500),
(102, 'SISTEMA DE INJERTO OSTEONCONDRAL (OATS) ORIGEN NACIONAL', 21, 1, 100, 1, 5, 20),
(103, 'KIT DE MICROFRACTURAS ORIGEN NACIONAL', 21, 1, 100, 1, 5, 20),
(104, 'SISTEMA PARA FRACCIONAR HUESO EN FORMA DE CHIP', 21, 2, 50, 1, 5, 20),
(105, 'MICROSIERRA', 21, 1, 100, 1, 5, 10),
(106, 'MICROSIERRA DIGITAL DE ULTRA REVOLUCION Y MICROMOTOR DE ALTA REVOLUCION (NEUROCIRUGIA Y CIRUGIA VERTEBRAL)', 21, 2, 50, 1, 5, 10),
(107, 'KIT DE DESCEMENTACION', 21, 1, 100, 1, 100, 200),
(108, 'CLAVO ENDOMEDULAR PARA FEMUR TIPO GAMMA CORTO ACERO', 22, 1, 100, 1, 20, 50),
(109, 'CLAVO ENDOMEDULAR PARA FEMUR TIPO GAMMA LARGO ACERO', 22, 1, 100, 1, 20, 50),
(110, 'CLAVO ENDOMEDULAR PARA FEMUR ACERROJADO CON DOBLE TRABA DISTAL Y DOBLE TRABA PROXIMAL ACERO', 22, 1, 100, 1, 20, 50),
(111, 'CLAVO ENDOMEDULAR PARA FEMUR ACERROJADO CON DOBLE TRABA DISTAL Y DOBLE TRABA PROXIMAL TITANIO', 22, 1, 100, 1, 20, 50),
(112, 'CLAVO ENDOMEDULAR PARA TIBIA ACERROJADO CON DOBLE TRABA DISTAL Y DOBLE TRABA PROXIMAL ACERO', 22, 1, 100, 1, 20, 50),
(113, 'CLAVO ENDOMEDULAR PARA TIBIA ACERROJADO CON DOBLE TRABA DISTAL Y DOBLE TRABA PROXIMAL TITANIO', 22, 1, 100, 1, 20, 50),
(114, 'CLAVO ENDOMEDULAR PARA FEMUR RETROGRADO CON MULTIPLE TRABA DISTAL Y DOBLE TRABA PROXIMAL ACERO', 22, 1, 100, 1, 20, 50),
(115, 'CLAVO ENDOMEDULAR PARA TOBILLO RETROGRADO CON MULTIPLE TRABA DISTAL Y MULTIPLE TRABA PROXIMAL TITANIO', 22, 1, 100, 1, 20, 50),
(116, 'CLAVO ENDOMEDULAR PARA HUMERO ACERO', 22, 1, 100, 1, 20, 50),
(117, 'CLAVO ENDOMEDULAR PARA HUMERO TITANIO', 22, 1, 112, 1, 20, 50),
(118, 'CLAVO ISOELASTICO DE 2MM HASTA 4MM DE 320MM A 400MM DE LARGO', 22, 1, 100, 1, 5, 20),
(119, 'CLAVO TEN PEDIATRICO', 22, 1, 103, 1, 5, 20),
(120, 'GUIAS DE ALINEACION DE FRACTURA INTRAOPERATORIA', 22, 1, 100, 1, 5, 20),
(121, 'CLAVO ENDOMEDULAR PARA FEMUR CON ANTIBIOTICO', 22, 1, 97, 1, 20, 50),
(122, 'CLAVO ENDOMEDULAR PARA TIBIA CON ANTIBIOTICO', 22, 1, 100, 1, 20, 50),
(123, 'SET DE DETENSORES DE TITANIO HASTA 2', 22, 1, 96, 1, 30, 100),
(124, 'SET DE DETENSORES DE TITANIO HASTA 4', 22, 1, 104, 1, 30, 100),
(125, 'KIT DE RECONSTRUCCION DE PERONE ANATOMICA CON BLOQUEO 2,7 / 3,5 (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(126, 'KIT DE RECONSTRUCCION DE TIBIA PLACA RECTA CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(127, 'KIT DE RECONSTRUCCION DE TIBIA DISTAL ANTEROLATERAL CON BLOQUEO 2,4 / 3,5 (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(128, 'KIT DE RECONSTRUCCION DE TIBIA DISTAL CONDILAR CON BLOQUEO 2,4 / 3,5 (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(129, 'KIT DE RECONSTRUCCION DE TIBIA DISTAL MEDIAL ANATOMICA CON BLOQUEO 3,5 (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(130, 'KIT DE RECONSTRUCCION DE TIBIA PROXIMAL ANATOMICA CON BLOQUEO POLIDIRECCIONAL (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(131, 'KIT DE RECONSTRUCCION DE TIBIA PROXIMAL ANATOMICA REFROZADA CON BLOQUEO UNIDIRECCIONAL (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(132, 'KIT DE RECONSTRUCCION DE TIBIA MEDIAL PROXIMAL ANATOMICA CON BLOQUEO COMBINADO UNIDIRECCIONAL Y POLIDIRECCIONAL (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(133, 'KIT DE RECONSTRUCCION PARA PIE (PLACA, GRAMPAS, TORNILLO Y CLAVIJAS) TITANIO', 23, 2, 50, 1, 1000, 10000),
(134, 'KIT DE RECONSTRUCCION PARA PIE ESCALONADO 2,4 / 2,7 (PLACA, GRAMPAS, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(135, 'KIT DE RECONSTRUCCION PARA FEMUR PLACA RECTA CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(136, 'KIT DE RECONSTRUCCION PARA FEMUR DISTAL ANATOMICO PREMOLDEADO CON BLOQUEO POLIDIRECCIONAL (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(137, 'KIT DE RECONSTRUCCION PARA FEMUR DISTAL ANATOMICO PREMOLDEADO CON BLOQUEO UNIDIRECCIONAL (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(138, 'KIT DE RECONSTRUCCION PARA FEMUR PROXIMAL ANATOMICO CON BLOQUEO POLIDIRECCIONAL PARA TROCANTER (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(139, 'KIT DE RECONSTRUCCION PARA FEMUR PROXIMAL ANATOMICO PREMOLDEADO PARA TROCANTER MEDIAL CON BLOQUEO POLIDIRECCIONAL (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(140, 'KIT DE RECONSTRUCCION PARA FEMUR PROXIMAL ANATOMICO PREMOLDEADO PARA TROCANTER MEDIAL CON BLOQUEO UNIDIRECCIONAL (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(141, 'KIT DE RECONSTRUCCION PARA CALCANEO CON BLOQUEO COMBINADO 2,4 / 2,7 / 3,5 MULTIDIRECCIONAL (PLACA, TORNILLO Y CLAVIJAS) TITANIO', 23, 1, 100, 1, 1000, 10000),
(142, 'KIT DE RECONSTRUCCION DE PERONE CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 1, 100, 1, 1000, 10000),
(143, 'KIT DE RECONSTRUCCION DE TIBIA PLACA RECTA CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 1, 103, 1, 1000, 10000),
(144, 'KIT DE RECONSTRUCCION DE TIBIA DISTAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 1, 100, 1, 1000, 10000),
(145, 'KIT DE RECONSTRUCCION DE TIBIA PROXIMAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 1, 100, 1, 1000, 10000),
(146, 'KIT DE RECONSTRUCCION PARA PIE (PLACA, GRAMPAS, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(147, 'KIT DE RECONSTRUCCION PARA FEMUR PLACA RECTA CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(148, 'KIT DE RECONSTRUCCION PARA FEMUR DISTAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(149, 'KIT DE RECONSTRUCCION PARA FEMUR PROXIMAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(150, 'KIT DE RECONSTRUCCION PARA CALCANEO LAMBDA ACERO CON BLOQUEO  (PLACA, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(151, 'KIT DE RECONSTRUCCION DE PELVIS HASTA 2 PLACAS (PLACA Y TORNILLO)', 25, 1, 96, 1, 1000, 10000),
(152, 'KIT DE RECONSTRUCCION DE PELVIS HASTA 3 PLACAS (PLACA Y TORNILLO)', 25, 1, 100, 1, 1000, 10000),
(153, 'KIT DE RECONSTRUCCION DE PELVIS HASTA 4 PLACAS (PLACA Y TORNILLO)', 25, 1, 100, 1, 1000, 10000),
(154, 'SISTEMA INTRAOPERATORIO PARA REDUCCION Y COMPRESION DE PELVIS', 25, 1, 100, 1, 10, 15),
(155, 'KIT DE RECONSTRUCCION DE HUMERO PROXIMAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 26, 1, 100, 1, 1000, 10000),
(156, 'KIT DE RECONSTRUCCION DE HUMERO PLACA RECTA CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 26, 1, 100, 1, 1000, 10000),
(157, 'KIT DE RECONSTRUCCION DE HUMERO DISTAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 26, 1, 100, 1, 1000, 10000),
(158, 'KIT DE RECONSTRUCCION DE RADIO DISTAL  CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 26, 1, 100, 1, 1000, 10000),
(159, 'KIT DE RECONSTRUCCION DE RADIO PLACA RECTA CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 26, 1, 100, 1, 1000, 10000),
(160, 'KIT DE RECONSTRUCCION DE CUBITO PLACA RECTA CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 26, 1, 100, 1, 1000, 10000),
(161, 'KIT DE RECONSTRUCCION DE CUBITO PROXIMAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 26, 1, 100, 1, 1000, 10000),
(162, 'KIT DE RECONSTRUCCION DE PERONE  (PLACA, TORNILLO Y CLAVIJAS)', 27, 1, 100, 1, 1000, 10000),
(163, 'KIT DE RECONSTRUCCION DE TIBIA PLACA RECTA  (PLACA, TORNILLO Y CLAVIJAS)', 27, 1, 100, 1, 1000, 10000),
(164, 'KIT DE RECONSTRUCCION DE TIBIA DISTAL  (PLACA, TORNILLO Y CLAVIJAS)', 27, 1, 100, 1, 1000, 10000),
(165, 'KIT DE RECONSTRUCCION DE TIBIA PROXIMAL  (PLACA, TORNILLO Y CLAVIJAS)', 27, 1, 100, 1, 1000, 10000),
(166, 'KIT DE RECONSTRUCCION PARA PIE (PLACA, GRAMPAS, TORNILLO Y CLAVIJAS)', 27, 1, 100, 1, 1000, 10000),
(167, 'KIT DE RECONSTRUCCION PARA FEMUR PLACA RECTA  (PLACA, TORNILLO Y CLAVIJAS)', 27, 1, 100, 1, 1000, 10000),
(168, 'KIT DE RECONSTRUCCION PARA FEMUR DISTAL  (PLACA, TORNILLO Y CLAVIJAS)', 27, 1, 100, 1, 1000, 10000),
(169, 'KIT DE RECONSTRUCCION PARA FEMUR PROXIMAL  (PLACA, TORNILLO Y CLAVIJAS)', 27, 1, 100, 1, 1000, 10000),
(170, 'KIT DE RECONSTRUCCION PARA CALCANEO LAMBDA ACERO  (PLACA, TORNILLO Y CLAVIJAS)', 27, 1, 100, 1, 1000, 10000),
(171, 'KIT DE RECONSTRUCCION PARA FEMUR PROXIMAL 135? TIPO DHS (PLACA Y TORNILLO)', 27, 1, 100, 1, 1000, 10000),
(172, 'KIT DE RECONSTRUCCION PARA FEMUR DISTAL 95? TIPO DHS (PLACA Y TORNILLO)', 27, 1, 100, 1, 1000, 10000),
(173, 'KIT DE RECONSTRUCCION PARA FEMUR PROXIMAL 135? TIPO DHS BAJO CONTACTO CON BLOQUEO CEFALICO ADICIONAL (PLACA Y TORNILLO)', 27, 1, 100, 1, 1000, 10000),
(174, 'KIT DE RECONSTRUCCION PARA FEMUR DISTAL 95? TIPO DHS BAJO CONTACTO (PLACA Y TORNILLO)', 27, 1, 100, 1, 1000, 10000),
(175, 'KIT DE RECONSTRUCCION DE PELVIS HASTA 2 PLACAS (PLACA Y TORNILLO)', 28, 1, 100, 1, 1000, 10000),
(176, 'KIT DE RECONSTRUCCION DE PELVIS HASTA 3 PLACAS (PLACA Y TORNILLO)', 28, 1, 100, 1, 1000, 10000),
(177, 'KIT DE RECONSTRUCCION DE PELVIS HASTA 4 PLACAS (PLACA Y TORNILLO)', 28, 1, 100, 1, 1000, 10000),
(178, 'SISTEMA INTRAOPERATORIO PARA REDUCCION Y COMPRESION DE PELVIS', 28, 1, 100, 1, 10, 15),
(179, 'KIT DE RECONSTRUCCION DE HUMERO PROXIMAL  (PLACA, TORNILLO Y CLAVIJAS)', 29, 1, 100, 1, 1000, 10000),
(180, 'KIT DE RECONSTRUCCION DE HUMERO PLACA RECTA  (PLACA, TORNILLO Y CLAVIJAS)', 29, 1, 100, 1, 1000, 10000),
(181, 'KIT DE RECONSTRUCCION DE HUMERO DISTAL  (PLACA, TORNILLO Y CLAVIJAS)', 29, 1, 100, 1, 1000, 10000),
(182, 'KIT DE RECONSTRUCCION DE RADIO DISTAL   (PLACA, TORNILLO Y CLAVIJAS)', 29, 1, 100, 1, 1000, 10000),
(183, 'KIT DE RECONSTRUCCION DE RADIO PALCA RECTA  (PLACA, TORNILLO Y CLAVIJAS)', 29, 1, 100, 1, 1000, 10000),
(184, 'KIT DE RECONSTRUCCION DE CUBITO PLACA RECTA  (PLACA, TORNILLO Y CLAVIJAS)', 29, 1, 100, 1, 1000, 10000),
(185, 'KIT DE RECONSTRUCCION DE CUBITO PROXIMAL  (PLACA, TORNILLO Y CLAVIJAS)', 29, 1, 100, 1, 1000, 10000),
(186, 'KIT DE RECONSTRUCCION DE MANO  (PLACA 1,5 Y 2,0 Y TORNILLOS)', 29, 1, 104, 1, 1000, 10000),
(187, 'KIT DE RECONSTRUCCION DE RADIO DISTAL DOBLE HILERA BLOQUEADA DE TITANIO (PLACA, TORNILLOS 2,5 Y 3,5)', 30, 2, 50, 1, 1000, 10000),
(188, 'KIT DE RECONSTRUCCION DE RADIO PLACA RECTA CON BLOQUEO DE TITANIO (PLACA Y TORNILLO)', 30, 2, 50, 1, 1000, 10000),
(189, 'KIT DE RECONSTRUCCION DE CUBITO PLACA RECTA  CON BLOQUEO DE TITANIO (PLACA Y TORNILLO)', 30, 2, 50, 1, 1000, 10000),
(190, 'KIT DE RECONSTRUCCION DE CLAVICULA CON BLOQUEO DE TITANIO (PLACA Y TORNILLO)', 30, 2, 50, 1, 1000, 10000),
(191, 'KIT DE RECONSTRUCCION DE MANO CON BLOQUEO DE TITANIO (PLACA 1,5 Y 2,0 Y TORNILLOS) POR UNA UNIDAD', 30, 2, 50, 1, 1000, 10000),
(192, 'KIT DE RECONSTRUCCION DE MANO CON BLOQUEO DE TITANIO (PLACA 1,5 Y 2,0 Y TORNILLOS) HASTA DOS UNIDADES', 30, 2, 50, 1, 1000, 10000),
(193, 'KIT DE RECONSTRUCCION DE MANO CON BLOQUEO DE TITANIO (PLACA 1,5 Y 2,0 Y TORNILLOS) HASTA TRES UNIDADES', 30, 2, 50, 1, 1000, 10000),
(194, 'KIT DE RECONSTRUCCION HASTA 3 PLACAS (PLACA, TORNILLO) DIAMETRO 2,0', 31, 1, 100, 1, 1000, 10000),
(195, 'KIT DE RECONSTRUCCION HASTA 5 PLACAS (PLACA, TORNILLO) DIAMETRO 2,0', 31, 1, 100, 1, 1000, 10000),
(196, 'KIT DE RECONSTRUCCION HASTA 7 PLACAS (PLACA, TORNILLO) DIAMETRO 2,0', 31, 1, 100, 1, 1000, 10000),
(197, 'PARCHE DE DURA MADRE 5x5', 31, 1, 100, 1, 5, 20),
(198, 'MONITOREO INTRAOPERATORIO DE TUMOR CEREBRAL', 31, 2, 50, 1, 2, 5),
(199, 'KIT DE CIERRE DE CRANEOTOMIA', 31, 2, 50, 1, 5, 20),
(200, 'SIERRA OSCILANTE + DRILL ALTA VELOCIDAD', 31, 2, 50, 1, 5, 10),
(201, 'MALLA DE TITANIO PARA CRANEOPLASTIA', 31, 2, 50, 1, 10, 20),
(202, 'KIT DE RECONSTRUCCION HASTA 3 PLACAS (PLACA, TORNILLO) DIAMETRO 1,5', 31, 1, 100, 1, 1000, 10000),
(203, 'KIT DE RECONSTRUCCION HASTA 5 PLACAS (PLACA, TORNILLO) DIAMETRO 1,5', 31, 1, 100, 1, 1000, 10000),
(204, 'KIT DE RECONSTRUCCION HASTA 7 PLACAS (PLACA, TORNILLO) DIAMETRO 1,5', 31, 1, 100, 1, 1000, 10000),
(205, 'PLACA DE RECONSTRUCCION HEMIMANDIBULAR 2,7MM DE TITANIO ', 31, 2, 50, 1, 5, 20),
(206, 'PLACA DE RECONSTRUCCION MANDIBULA COMPLETA 2,7MM DE TITANIO ', 31, 2, 50, 1, 5, 20),
(207, 'MINIPLACA ESCALONADA PARA MENTOPLASTIA DE TITANIO', 31, 2, 50, 1, 5, 20),
(208, 'MALLA DINAMICA DE TITANIO', 31, 2, 50, 1, 5, 20),
(209, 'SET DE TORNILLOS HERBERT HASTA 2', 32, 1, 100, 1, 1000, 10000),
(210, 'SET DE TORNILLOS HERBERT HASTA 4', 32, 1, 100, 1, 1000, 10000),
(211, 'SET DE TORNILLOS TIPO BAROUK HASTA 2', 32, 1, 100, 1, 1000, 10000),
(212, 'SET DE TORNILLOS TIPO BAROUK HASTA 4', 32, 1, 100, 1, 1000, 10000),
(213, 'SET DE TORNILLOS TWIST-OFF', 32, 1, 100, 1, 1000, 10000),
(214, 'MINIGRAMPA DE TITANIO', 32, 1, 100, 1, 5, 20),
(215, 'SISTEMA DE ALINEACION ISOELASTICO', 32, 1, 100, 1, 5, 20),
(216, 'SISTEMA DE APERTURA TIPO PUDDU PARA TIBIA TITANIO', 32, 1, 100, 1, 5, 20),
(217, 'SISTEMA TIPO BOUSQUET ACERO', 32, 1, 100, 1, 5, 20),
(218, 'SET PARA ARTRODESIS DE TOBILLO (TORNILLO TRANSIDESMAL, CANULADO)', 32, 1, 100, 1, 30, 50),
(219, 'SET PARA ARTRODESIS DE TOBILLO (TORNILLO TRANSIDESMAL, CANULADO Y PLACA)', 32, 1, 100, 1, 30, 50),
(220, 'SET DE TORNILLOS 7,5 CANULADOS HASTA 2', 32, 1, 100, 1, 1000, 10000),
(221, 'SET DE TORNILLOS 7,5 CANULADOS HASTA 4', 32, 1, 100, 1, 1000, 10000),
(222, 'SET DE TORNILLOS 4,5 CANULADOS HASTA 2', 32, 1, 100, 1, 1000, 10000),
(223, 'SET DE TORNILLOS 4,5 CANULADOS HASTA 4', 32, 1, 100, 1, 1000, 10000),
(224, 'SET DE TORNILLOS 3,5 CANULADOS HASTA 2', 32, 1, 100, 1, 1000, 10000),
(225, 'SET DE TORNILLOS 3,5 CANULADOS HASTA 4', 32, 1, 100, 1, 1000, 10000),
(226, 'SET DE TORNILLOS 7,5 CANULADOS HASTA 2 DE TITANIO', 32, 1, 100, 1, 1000, 10000),
(227, 'SET DE TORNILLOS 7,5 CANULADOS HASTA 4 DE TITANIO', 32, 1, 100, 1, 1000, 10000),
(228, 'SET DE TORNILLOS 4,5 CANULADOS HASTA 2 DE TITANIO', 32, 1, 100, 1, 1000, 10000),
(229, 'SET DE TORNILLOS 4,5 CANULADOS HASTA 4 DE TITANIO', 32, 1, 100, 1, 1000, 10000),
(230, 'SET DE TORNILLOS 3,5 CANULADOS HASTA 2 DE TITANIO', 32, 1, 100, 1, 1000, 10000),
(231, 'SET DE TORNILLOS 3,5 CANULADOS HASTA 4 DE TITANIO', 32, 1, 100, 1, 1000, 10000),
(232, 'SET DE TORNILLOS 4,5-6,5 MUSK ', 32, 1, 100, 1, 1000, 10000),
(233, 'ENDOBOTTON LOOP FIJO + TORNILLO INTERFERENCIAL DE TITANIO', 33, 1, 100, 1, 1000, 10000),
(234, 'ENDOBOTTON LOOP FIJO + TORNILLO INTERFERENCIAL DE PEEK', 33, 1, 100, 1, 1000, 10000),
(235, 'ENDOBOTTON AUTOAJUSTABLE + TORNILLO INTERFERENCIAL DE TITANIO', 33, 1, 100, 1, 1000, 10000),
(236, 'ENDOBOTTON AUTOAJUSTABLE + TORNILLO INTERFERENCIAL DE PEEK', 33, 1, 100, 1, 1000, 10000),
(237, 'TORNILLO TRANSVERSAL + TORNILLO INTERERENCIAL DE TITANIO', 33, 1, 100, 1, 1000, 10000),
(238, 'TORNILLO TRANSVERSAL + TORNILLO INTERERENCIAL DE PEEK', 33, 1, 100, 1, 1000, 10000),
(239, 'TORNILLOS INTERFERENCIALES DE TITANIO X2', 33, 1, 105, 1, 1000, 10000),
(240, 'TORNILLOS INTERFERENCIALES DE PEEK X2', 33, 1, 100, 1, 1000, 10000),
(241, 'TORNILLOS INTERFERENCIALES BIODEGRADABLES BIOCOMPUESTOS', 33, 1, 100, 1, 1000, 10000),
(242, 'SUTURA MENISCAL HASTA 2', 33, 2, 50, 1, 100, 500),
(243, 'SUTURA DE ALTA RESISTENCIA HASTA 2', 33, 2, 48, 1, 100, 500),
(244, 'PUNTA DE SHAVER DYONICS EP1', 33, 1, 100, 1, 50, 100),
(245, 'PUNTA DE SHAVER STRYKER', 33, 1, 100, 1, 50, 100),
(246, 'PUNTA DE RADIOFRECUENCIA', 33, 2, 50, 1, 5, 20),
(247, 'ENDOBOTTON IZABLE + TORNILLO INTERFERENCIAL DE TITANIO', 33, 2, 50, 1, 1000, 10000),
(248, 'ENDOBOTTON IZABLE + TORNILLO INTERFERENCIAL DE PEEK', 33, 2, 50, 1, 1000, 10000),
(249, 'ENDOBOTTON IZABLE + TORNILLO INTERFERENCIAL BIODEGRADABLE', 33, 2, 50, 1, 1000, 10000),
(250, 'ENDOBOTTON LOOP FIJO + TORNILLO INTERFERENCIAL BIODEGRADABLE', 33, 2, 50, 1, 1000, 10000),
(251, 'ENDOBOTTON AUTOAJUSTABLE + TORNILLO INTERFERENCIAL BIODEGRADABLE', 33, 2, 50, 1, 1000, 10000),
(252, 'ALAMBRE NITINOL', 33, 2, 62, 1, 5, 10),
(253, 'INSTRUMENTAL ARTROSCOPICO', 33, 1, 100, 1, 10, 30),
(254, 'SET DE FRESAS SHANON', 33, 1, 93, 1, 5, 20),
(255, 'SISTEMA ABSORBIBLE TRENZADO DE ALTO PESO MOLECULAR', 33, 2, 50, 1, 20, 20),
(256, 'TORNILLO INTERFERENCIAL DE BAJO PERFIL', 33, 2, 50, 1, 1000, 10000),
(257, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS POLIAXIALES ALTO PERFIL', 34, 1, 100, 1, 10, 20),
(258, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS POLIAXIALES ALTO PERFIL', 34, 1, 100, 1, 10, 20),
(259, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TORNILLOS POLIAXIALES ALTO PERFIL', 34, 1, 100, 1, 10, 20),
(260, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TORNILLOS POLIAXIALES ALTO PERFIL', 34, 2, 50, 1, 10, 20),
(261, 'SISTEMA DE COLUMNA HASTA 6 NIVELES CON TORNILLOS POLIAXIALES ALTO PERFIL', 34, 2, 50, 1, 10, 20),
(262, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 34, 1, 100, 1, 10, 20),
(263, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 34, 1, 100, 1, 10, 20),
(264, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 34, 1, 100, 1, 10, 20),
(265, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 34, 2, 50, 1, 10, 20),
(266, 'SISTEMA DE COLUMNA HASTA 6 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 34, 2, 52, 1, 10, 20),
(267, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS HASTA 8,5mm POLIAXIALES BAJO PERFIL', 34, 1, 100, 1, 10, 20),
(268, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS HASTA 8,5mm POLIAXIALES BAJO PERFIL', 34, 1, 100, 1, 10, 20),
(269, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TORNILLOS HASTA 8,5mm POLIAXIALES BAJO PERFIL', 34, 1, 100, 1, 10, 20),
(270, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TORNILLOS HASTA 8,5mm POLIAXIALES BAJO PERFIL', 34, 2, 50, 1, 10, 20),
(271, 'SISTEMA DE COLUMNA HASTA 6 NIVELES CON TORNILLOS HASTA 8,5mm POLIAXIALES BAJO PERFIL', 34, 2, 50, 1, 10, 20),
(272, 'SISTEMA DE COLUMNA CON CONECTORES A BARRA TORNILLOS CON VASTAGOS 2 NIVELES', 34, 2, 50, 1, 10, 20),
(273, 'SISTEMA DE COLUMNA CON CONECTORES A BARRA TORNILLOS CON VASTAGOS 3 NIVELES', 34, 2, 50, 1, 10, 20),
(274, 'SISTEMA DE COLUMNA CON CONECTORES A BARRA TORNILLOS CON VASTAGOS 4 NIVELES', 34, 2, 50, 1, 10, 20),
(275, 'SISTEMA DE COLUMNA CON CONECTORES A BARRA TORNILLOS CON VASTAGOS 5 NIVELES', 34, 2, 50, 1, 10, 20),
(276, 'SISTEMA DE COLUMNA CON CONECTORES A BARRA TORNILLOS CON VASTAGOS 6 NIVELES', 34, 2, 50, 1, 10, 20),
(277, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS POLIAXIALES TULIPA EXTENDIDA', 34, 1, 100, 1, 10, 20),
(278, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS POLIAXIALES TULIPA EXTENDIDA', 34, 1, 100, 1, 10, 20),
(279, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TORNILLOS POLIAXIALES TULIPA EXTENDIDA', 34, 1, 100, 1, 10, 20),
(280, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TORNILLOS POLIAXIALES TULIPA EXTENDIDA', 34, 2, 50, 1, 10, 20),
(281, 'SISTEMA DE COLUMNA HASTA 6 NIVELES CON TORNILLOS POLIAXIALES TULIPA EXTENDIDA', 34, 2, 50, 1, 10, 20),
(282, 'SISTEMA DE ROTACION', 34, 2, 50, 1, 5, 20),
(283, 'SISTEMA DE COLUMNA CERVICAL HASTA 2 NIVELES CON SISTEMA DE BLOQUEO', 34, 1, 101, 1, 10, 20),
(284, 'SISTEMA DE COLUMNA CERVICAL HASTA 3 NIVELES CON SISTEMA DE BLOQUEO', 34, 1, 100, 1, 10, 20),
(285, 'SISTEMA DE COLUMNA CERVICAL HASTA 4 NIVELES CON SISTEMA DE BLOQUEO', 34, 1, 97, 1, 10, 20),
(286, 'SISTEMA DE COLUMNA CERVICAL HASTA 5 NIVELES CON SISTEMA DE BLOQUEO', 34, 2, 50, 1, 10, 20),
(287, 'SISTEMA DE COLUMNA CERVICAL HASTA 6 NIVELES CON SISTEMA DE BLOQUEO', 34, 2, 50, 1, 10, 20),
(288, 'SISTEMA DE COLUMNA CERVICAL HASTA 2 NIVELES CON SISTEMA DE BLOQUEO AUTOGENO', 34, 1, 97, 1, 10, 20),
(289, 'SISTEMA DE COLUMNA CERVICAL HASTA 3 NIVELES CON SISTEMA DE BLOQUEO AUTOGENO', 34, 1, 100, 1, 10, 20),
(290, 'SISTEMA DE COLUMNA CERVICAL HASTA 4 NIVELES CON SISTEMA DE BLOQUEO AUTOGENO', 34, 1, 100, 1, 10, 20),
(291, 'SISTEMA DE COLUMNA CERVICAL HASTA 5 NIVELES CON SISTEMA DE BLOQUEO AUTOGENO', 34, 2, 50, 1, 10, 20),
(292, 'SISTEMA DE COLUMNA CERVICAL HASTA 6 NIVELES CON SISTEMA DE BLOQUEO AUTOGENO', 34, 2, 50, 1, 10, 20),
(293, 'ESPACIADOR INTERSOMATICO MODELO PLIF DE PEEK', 34, 1, 100, 1, 5, 20),
(294, 'ESPACIADOR INTERSOMATICO MODELO TLIF DE PEEK', 34, 1, 100, 1, 5, 20),
(295, 'ESPACIADOR INTERSOMATICO MODELO CAGE DE PEEK', 34, 1, 100, 1, 5, 20),
(296, 'ESPACIADOR INTERSOMATICO MODELO CAGE BLOQUEADO', 34, 1, 100, 1, 5, 20),
(297, 'SUSTITUTO OSEO EN GRANULOS POR 5 CC', 34, 2, 50, 1, 100, 500),
(298, 'SUSTITUTO OSEO EN GRANULOS POR 15 CC', 34, 2, 50, 1, 100, 500),
(299, 'SUSTITUTO OSEO EN GRANULOS POR 30 CC', 34, 2, 50, 1, 100, 500),
(300, 'SUSTITUTO OSEO EN GRANULOS POR 5 CC CON COLAGENO', 34, 2, 50, 1, 100, 500),
(301, 'SUSTITUTO OSEO EN GRANULOS POR 15 CC CON COLAGENO', 34, 2, 50, 1, 100, 500),
(302, 'SUSTITUTO OSEO EN GRANULOS POR 30 CC CON COLAGENO', 34, 2, 50, 1, 100, 500),
(303, 'MEMBRANA ANTIADHERENTE', 34, 1, 100, 1, 100, 500),
(304, 'MEMBRANA ANTIADHERENTE COLAGENADA BIOADAPTABLE', 34, 2, 50, 1, 100, 500),
(305, 'SEPARADOR INTERESPINOSO TIPO COFFLER EN TITANIO', 34, 2, 50, 1, 5, 20),
(306, 'SEPARADOR INTERESPINOSO DE PEEK', 34, 2, 50, 1, 5, 20),
(307, 'BLOCK ESPACIADOR TRAVECULAR BIOLOGICO', 34, 2, 50, 1, 5, 20),
(308, 'BLOCK ESPACIADOR TRAVECULAR BIOLOGICO CON COLAGENO', 34, 2, 50, 1, 5, 20),
(309, 'COLAGENO HETEROLOGO EN HEBRAS (SUS-MEM)', 34, 2, 46, 1, 5, 20),
(310, 'SET PARA VERTEBROPLASTIA', 34, 2, 48, 1, 5, 20),
(311, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(312, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(313, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(314, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 1, 100, 1, 10, 20),
(315, 'SISTEMA DE COLUMNA HASTA 6 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 1, 100, 1, 10, 20),
(316, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS POLIAXIALES ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(317, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS POLIAXIALES ULTRA BAJO PERFIL', 35, 2, 48, 1, 10, 20),
(318, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TORNILLOS POLIAXIALES ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(319, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TORNILLOS POLIAXIALES ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(320, 'SISTEMA DE COLUMNA HASTA 6 NIVELES CON TORNILLOS POLIAXIALES ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(321, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS POLIAXIALES TULIPA EXTENDIDA', 35, 2, 50, 1, 10, 20),
(322, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS POLIAXIALES TULIPA EXTENDIDA', 35, 2, 50, 1, 10, 20),
(323, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TORNILLOS POLIAXIALES TULIPA EXTENDIDA', 35, 2, 50, 1, 10, 20),
(324, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS POLIAXIALES HASTA 8,5 MM', 35, 2, 50, 1, 10, 20),
(325, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS POLIAXIALES HASTA 8,5 MM', 35, 2, 50, 1, 10, 20),
(326, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TORNILLOS POLIAXIALES HASTA 8,5 MM', 35, 2, 50, 1, 10, 20),
(327, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TORNILLOS POLIAXIALES HASTA 8,5 MM', 35, 2, 50, 1, 10, 20),
(328, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TORNILLOS POLIAXIALES HASTA 8,5 MM', 35, 2, 50, 1, 10, 20),
(329, 'TORNILLO ILIACO POR DOS', 35, 2, 50, 1, 1000, 10000),
(330, 'PUENTE DTT', 35, 2, 54, 1, 5, 20),
(331, 'PUENTE DE ANGULO VARIABLE', 35, 2, 50, 1, 5, 20),
(332, 'SISTEMA DE COLUMNA CERVICAL HASTA 2 NIVELES CON SISTEMA DE BLOQUEO', 35, 2, 50, 1, 10, 20),
(333, 'SISTEMA DE COLUMNA CERVICAL HASTA 3 NIVELES CON SISTEMA DE BLOQUEO', 35, 2, 50, 1, 10, 20),
(334, 'SISTEMA DE COLUMNA CERVICAL HASTA 4 NIVELES CON SISTEMA DE BLOQUEO', 35, 2, 50, 1, 10, 20),
(335, 'SISTEMA DE COLUMNA CERVICAL HASTA 5 NIVELES CON SISTEMA DE BLOQUEO', 35, 2, 50, 1, 10, 20),
(336, 'SISTEMA DE COLUMNA CERVICAL HASTA 6 NIVELES CON SISTEMA DE BLOQUEO', 35, 2, 50, 1, 10, 20),
(337, 'MEMBRANA HEMOSTATICA CON LIBERACION DE ANTIBIOTICOS PARA REGENERACION TISULAR', 35, 2, 50, 1, 100, 500),
(338, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TULIPA COMBINADA MONO Y POLIAXIAL DE ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(339, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TULIPA COMBINADA MONO Y POLIAXIAL DE ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(340, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TULIPA COMBINADA MONO Y POLIAXIAL DE ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(341, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TULIPA COMBINADA MONO Y POLIAXIAL DE ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(342, 'SISTEMA DE COLUMNA HASTA 6 NIVELES CON TULIPA COMBINADA MONO Y POLIAXIAL DE ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(343, 'CONECTOR DOMINO', 35, 2, 47, 1, 5, 20),
(344, 'MONITOREO INTRAOPERATORIO', 35, 2, 50, 1, 5, 20),
(345, 'ARPON DE TITANIO DOBLE SUTURA DE ALTA RESISTENCIA', 36, 1, 100, 1, 60, 120),
(346, 'KIT DE ARPONES DE TITANIO DE ALTA RESISTENCIA DOBLE SUTURA HASTA 2', 36, 1, 100, 1, 60, 120),
(347, 'KIT DE ARPONES DE TITANIO DE ALTA RESISTENCIA DOBLE SUTURA HASTA 3', 36, 1, 100, 1, 60, 120),
(348, 'KIT DE ARPONES DE TITANIO DE ALTA RESISTENCIA DOBLE SUTURA HASTA 4', 36, 1, 100, 1, 60, 120),
(349, 'KIT DE ARPONES DE TITANIO DE ALTA RESISTENCIA DOBLE SUTURA HASTA 5', 36, 1, 100, 1, 60, 120),
(350, 'KIT DE ARPONES DE TITANIO DE ALTA RESISTENCIA DOBLE SUTURA HASTA 6', 36, 1, 100, 1, 60, 120),
(351, 'SET DE ARPONES DE TITANIO HASTA 2 CON 1 SUTURA DE ALTA RESISTENCIA', 36, 1, 100, 1, 60, 120),
(352, 'SET DE ARPONES DE TITANIO HASTA 2 CON 2 SUTURAS DE ALTA RESISTENCIA', 36, 1, 100, 1, 60, 120),
(353, 'SET DE ARPONES DE TITANIO HASTA 3 CON 2 SUTURAS DE ALTA RESISTENCIA', 36, 1, 100, 1, 60, 120),
(354, 'SET DE ARPONES DE TITANIO HASTA 4 CON 2 SUTURAS DE ALTA RESISTENCIA', 36, 1, 100, 1, 60, 120),
(355, 'SET DE ARPONES DE TITANIO HASTA 6 CON 2 SUTURAS DE ALTA RESISTENCIA', 36, 1, 100, 1, 60, 120),
(356, 'MICROARPONES DE TITANIO DIAMETRO 2 MM HASTA 2 UNIDADES CON SUTURA DE ALTA RESISTENCIA', 36, 2, 50, 1, 60, 120),
(357, 'MICROARPONES DE TITANIO DIAMETRO 2 MM HASTA 4 UNIDADES CON SUTURA DE ALTA RESISTENCIA', 36, 2, 50, 1, 60, 120),
(358, 'SET PARA ARTROSCOPIA DE HOMBRO HASTA 2 ARPONES CON BOMBA DE IRRIGACION, TUBULADORAS E INSTRUMENTAL', 36, 1, 100, 1, 60, 120),
(359, 'SET PARA ARTROSCOPIA DE HOMBRO HASTA 3 ARPONES CON BOMBA DE IRRIGACION, TUBULADORAS E INSTRUMENTAL', 36, 1, 100, 1, 60, 120),
(360, 'ARPON DE PEEK DOBLE SUTURA DE ALTA RESISTENCIA', 36, 2, 50, 1, 60, 120),
(361, 'KIT DE ARPONES DE PEEK DE ALTA RESISTENCIA DOBLE SUTURA HASTA 2', 36, 2, 50, 1, 60, 120),
(362, 'KIT DE ARPONES DE PEEK DE ALTA RESISTENCIA DOBLE SUTURA HASTA 3', 36, 2, 50, 1, 60, 120),
(363, 'KIT DE ARPONES DE PEEK DE ALTA RESISTENCIA DOBLE SUTURA HASTA 4', 36, 2, 50, 1, 60, 120),
(364, 'KIT DE ARPONES DE PEEK DE ALTA RESISTENCIA DOBLE SUTURA HASTA 5', 36, 2, 50, 1, 60, 120),
(365, 'KIT DE ARPONES DE PEEK DE ALTA RESISTENCIA DOBLE SUTURA HASTA 6', 36, 2, 50, 1, 60, 120),
(366, 'SET DE ARPONES DE PEEK HASTA 2 CON 1 SUTURA DE ALTA RESISTENCIA', 36, 2, 50, 1, 60, 120),
(367, 'SET DE ARPONES DE PEEK HASTA 2 CON 2 SUTURAS DE ALTA RESISTENCIA', 36, 2, 50, 1, 60, 120),
(368, 'SET DE ARPONES DE PEEK HASTA 3 CON 2 SUTURAS DE ALTA RESISTENCIA', 36, 2, 50, 1, 60, 120),
(369, 'SET DE ARPONES DE PEEK HASTA 4 CON 2 SUTURAS DE ALTA RESISTENCIA', 36, 2, 50, 1, 60, 120),
(370, 'SET DE ARPONES DE PEEK HASTA 6 CON 2 SUTURAS DE ALTA RESISTENCIA', 36, 2, 50, 1, 60, 120),
(371, 'TUTOR PARA TIBIA FEMUR MONTAJE TIPO AO', 37, 1, 100, 1, 5, 20),
(372, 'TUTOR PARA PELVIS MONTAJE TIPO AO', 37, 1, 96, 1, 5, 20),
(373, 'TUTOR PARA MU?ECA, BRAZO Y ANTE BRAZO MONTAJE TIPO AO', 37, 1, 100, 1, 5, 20),
(374, 'TUTOR MONOPLANAR PARA ALARGAMIENTO FEMUR O TIBIA', 37, 1, 100, 1, 5, 20),
(375, 'TUTOR MONOPLANAR PARA ALARGAMIENTO HUMERO', 37, 1, 100, 1, 5, 20),
(376, 'MICROTORNILLO HERBERT 2,0 - 2,3 DE TITANIO', 37, 2, 46, 1, 1000, 10000),
(377, 'MICROTORNILLO HERBERT 2,4 - 2,7 DE TITANIO', 37, 2, 47, 1, 1000, 10000),
(378, 'PROTESIS PARA REEMPLAZO TOTAL DE CADERA HIBRIDA, CUPULA NO CEMENTADA DIAMETRO 28 RECUBIERTA EN HIDROXIAPATITA, TALLO PULIDO ESPEJO CEMENTADO CHARNLEY, CABEZA ACERO, LINER DE POLIETILENO CROSSLINKED', 37, 2, 50, 1, 30, 60),
(379, 'SISTEMA DE COLUMNA LUMBAR NORM DE ULTRA BAJO PERFIL CON GANCHOS X NIVEL CON BARRA EN Z - IMPORTADO', 37, 2, 50, 1, 10, 20),
(380, 'SISTEMA DE COLUMNA LUMBAR NORM DE BAJO PERFIL CON GANCHOS POLIAXIALES SILVER ANTIBACTERIAL X NIVEL - IMPORTADO', 37, 2, 50, 1, 10, 20),
(381, 'SISTEMA TUBULAR DINAMICO PARA COMPRESION CEFALOFEMORAL DE TITANIO UNIDIRECCIONAL (DHS 2DA GEN)', 37, 2, 50, 1, 5, 20),
(382, 'CLAMP DE ROTULA', 37, 2, 50, 1, 5, 20),
(383, 'CELDA CERVICAL AUTOSUSTENTABLE CON QUILLA', 37, 2, 50, 1, 5, 20),
(384, 'PLIF EXPANSIBLE', 37, 2, 50, 1, 5, 20),
(385, 'MESH PARA CORPORECTOMIA', 37, 2, 50, 1, 5, 20),
(386, 'REEMPLAZO VERTEBRAL EXPANSIBLE IMPORTADO', 37, 2, 50, 1, 5, 20),
(387, 'SET DE CLAVIJAS ROSCADAS DE TITANIO', 37, 2, 50, 1, 5, 20),
(388, 'CEMENTO DE ALTA VISCOSIDAD', 37, 2, 50, 1, 100, 500),
(389, 'CEMENTO DE BAJA VISCOSIDAD', 37, 2, 50, 1, 100, 500),
(390, 'CEMENTO DE ALTA VISCOSIDAD CON ANTIBIOTICO', 37, 2, 50, 1, 100, 500),
(391, 'CEMENTO DE BAJA VISCOSIDAD CON ANTIBIOTICO', 37, 2, 50, 1, 100, 500),
(392, 'KIT APLICADOR DE CEMENTO CON PISTOLA/JERINGA DE PRESION NEGATIVA', 37, 2, 50, 1, 100, 500),
(393, 'CLAVO ENDOMEDULAR BLOQUEADO ACERROJADO MULTIPEFORADO ULTRA DISTAL DE TIBIA 3,5 / 4,5', 37, 2, 50, 1, 20, 50),
(394, 'CEMENTO RADIOPACO', 37, 2, 50, 1, 100, 500),
(395, 'PINZA SCORPION', 37, 2, 49, 1, 5, 20),
(396, 'SET DE MICROLEZNAS', 37, 2, 50, 1, 5, 20),
(397, 'GENERADOR ELECTROQUIRURGICO OPES', 37, 2, 50, 1, 5, 20),
(398, 'FUENTE DE LUZ PARA SISTEMA TUBULAR ', 37, 2, 50, 1, 5, 20),
(399, 'SISTEMA TUBULAR PARA DISECTOMIA DE HERNIA DISCAL CON DILATADORES PARA CIRUGIA MINIMAMENTE INVASIVA POSTEROLATERAL', 37, 2, 50, 1, 5, 20),
(400, 'SISTEMA TUBULAR PARA DISECTOMIA DE HERNIA DISCAL CON DILATADORES PARA CIRUGIA MINIMAMENTE INVASIVA ANTEROLATERAL', 37, 2, 50, 1, 5, 20),
(401, 'SISTEMA TUBULAR PARA DISECTOMIA DE HERNIA DISCAL CON DILATADORES PARA CIRUGIA MINIMAMENTE INVASIVA LATERAL', 37, 2, 50, 1, 5, 20),
(402, 'EXPANSOR CON VALVAS INTERCAMBIABLES MULTIREGULABLE', 37, 2, 50, 1, 5, 20),
(403, 'CLAVO CEFALOMEDULAR CON TOMA UNIDRECCIONAL Y BLOQUEO ULTRA PROXIMAL (GAMMA 2DA GEN)', 37, 2, 50, 1, 5, 20),
(404, 'KIT DE MEZCLADO Y PRESURIZACION AL VACIO DE CEMENTO QUIRURGICO.', 37, 2, 50, 1, 100, 500),
(405, 'FRESA AUTOBLOQUEANTE', 37, 2, 46, 1, 5, 20),
(406, 'SISTEMA BSI DE ALTAS REVOLUCIONES CON SET DE FRESAS Y RASPAS PARA MINI OPEN (MANGUITO ROTADOR)', 37, 2, 50, 1, 5, 20),
(407, 'TORNO PARA CIRUGIA PERCUTANEA', 37, 2, 50, 1, 5, 20),
(408, 'CLIP ISE PARA DEDO MARTILLO', 37, 2, 50, 1, 5, 20),
(409, 'PUNTA BIPOLAR ISOTERMICA CON PINZA (ALQUILER)', 37, 2, 50, 1, 5, 20),
(410, 'SISTEMA PARA OSTEOSINTESIS CEFALOFEMORAL DHS DE TITANIO BAJO PERFIL ANATOMICO MIPO', 37, 2, 50, 1, 5, 20),
(411, 'Protesis Para Reemplazo Total De Rodilla Anatomica Con Cajon Para Adaptacion Intercambiable Y Sistema De Articulacion De Doble Traba Molecular', 37, 2, 50, 1, 5, 20),
(412, 'SISTEMA ROTATIVO ADAPTABLE PARA PROTESIS CON CAJON', 37, 2, 50, 1, 5, 20),
(413, 'VASTAGO TIBIAL 5 MEDIDAS', 37, 1, 100, 1, 5, 20),
(414, 'VASTAGO FEMORAL 5 MEDIDAS', 37, 1, 100, 1, 5, 20),
(415, 'ARPON DE PEEK POR IMPACTO DOBLE SUTURA DE ALTA RESISTENCIA', 37, 2, 50, 1, 60, 120),
(416, 'ARPON TITANIO SIN OJAL', 37, 1, 100, 1, 60, 120),
(417, 'ARPON DE PEEK SIN OJAL', 37, 1, 100, 1, 60, 120),
(418, 'ARPON SIN NUDO KNOTLESS DE PEEK', 37, 1, 100, 1, 60, 120),
(419, 'ARPON DE TITANIO CON AGUJA USP2', 37, 1, 100, 1, 60, 120),
(420, 'CANULA PARA ARTROSCOPIA DE HOMBRO DE BAJO PERFIL', 37, 2, 50, 1, 10, 30),
(421, 'CUBO INTERSOMATICO LUMBAR TLIF EN TITANIO TRABECULAR POR UNIDAD', 37, 2, 50, 1, 5, 20),
(422, 'CUBO AUTOSUSTENTABLE CERVICAL HIBRIDO (TITANIO + PEEK) POR UNIDAD', 37, 2, 50, 1, 5, 20),
(423, 'CUBO AUTOSUSTENTABLE CERVICAL EN TITANIO TRABECULAR POR UNIDAD', 37, 2, 50, 1, 5, 20),
(424, 'INTERESPINOSO LATERAL EN PEEK POR UNIDAD', 37, 2, 50, 1, 5, 20),
(425, 'CUBO DE ABORDAJE LATERAL XLIF EN TITANIO TRABECULAR POR UNIDAD', 37, 2, 50, 1, 5, 20),
(426, 'LAMINOPLASTIA POR NIVEL (1 PLACA CON TORNILLOS)', 37, 2, 50, 1, 1000, 10000),
(427, 'TORNILLO INTERFERENCIAL DE HIDROXIAPATITA', 37, 2, 50, 1, 1000, 10000),
(428, 'SISTEMA PARA DESROTACION DE ESCOLIOSIS TOWER FIX', 37, 2, 50, 1, 5, 20),
(429, 'SIERRA DE CORTE SAGITAL', 37, 2, 50, 1, 5, 10),
(430, 'PERFORADOR OSEO DE ALTA REVOLUCION CON PUNTA DIAMANTADA', 37, 2, 50, 1, 5, 20),
(431, 'KIT DESCARTABLES ORIGINAL 3M (IOBAN - SURGICAL DRAPE - SUCTOR)', 37, 2, 50, 1, 5, 20),
(432, 'SISTEMA MINI - SHAVER DE FRESADO CONTINUO CIRCULAR CON PROTECCION DE PARTES BLANDAS', 37, 2, 50, 1, 50, 100),
(433, 'SET PARA FORAGE DE CADERA MINIMAMENTE INVASIVO GUIADO POR IMAGENES', 37, 2, 50, 1, 5, 10),
(434, 'INSTRUMENTAL PARA COLOCACION DE OSTEOSINTESIS MINIMAMENTE INVASIVO', 37, 2, 50, 1, 5, 20),
(435, 'KIT DE SEGURIDAD PARA SARS-COV2 (BARBIJO-COFIA-BATA-BOTAS-GUANTES ORIGINAL 3M)', 37, 2, 50, 1, 5, 20),
(436, 'SET PARA ARTROSCOPIA DE CADERA CON DESCARTABLES E INSTRUMENTAL ARTRSCOPICO DE MINIMA INVASION', 37, 2, 50, 1, 10, 30),
(437, 'ARPON PARA CADERA PUSHLOCK 2,7 - 2,9', 37, 2, 50, 1, 60, 120),
(438, 'AGUJA PARA VERTEBROPLASTIA', 37, 2, 52, 1, 5, 20),
(439, 'PLACA VOLAR COMBINADA 3,5 - 2,7 MULTIDIRECCIONAL POLIAXIAL DE TITANIO (CON SUS TORNILLOS CORRESPONDIENTES)', 37, 2, 50, 1, 1000, 10000),
(440, 'PROTESIS PARA REEMPLAZO TOTAL DE CADERA CEMENTADA CON TALLO TRICONICO, COTILO DOBLE MOVILIDAD, CABEZA ACERO DIAM 28', 37, 2, 50, 1, 20, 50),
(441, 'PROTESIS PARA REEMPLAZO TOTAL DE CADERA CEMENTADA CON TALLO TRICONICO, COTILO DOBLE MOVILIDAD, CABEZA ACERO DIAM 32/36', 37, 2, 50, 1, 20, 50),
(442, 'Sistema De Osteosintesis Cefalofemoral Con Placa Ceda Au 95? Y\nTornillos Bloqueados Y Cefalico', 37, 2, 50, 1, 1000, 10000),
(443, 'Punta de shaver LINVATEC', 37, 2, 50, 1, 50, 100),
(444, 'Asistencia tecnica matriculada', 37, 2, 50, 1, 5, 20),
(445, 'SET DE EXTRACCION DE OSTEOSINTESIS PEQUE?OS FRAGMENTOS', 37, 1, 100, 1, 20, 40),
(446, 'SET DE EXTRACCION DE OSTEOSINTESIS GRANDES FRAGMENTOS', 37, 1, 100, 1, 20, 40),
(447, 'SET DE EXTRACCION DE COLUMNA', 37, 1, 100, 1, 20, 40),
(448, 'SET DE EXTRACCION DE RODILLA', 37, 1, 100, 1, 20, 40),
(449, 'SET DE EXTRACCION DE CADERA', 37, 1, 100, 1, 20, 40),
(450, 'SET DE EXTRACCION ENDOMEDULAR', 37, 1, 100, 1, 20, 40),
(451, 'CU?A FEMORAL / TIBIAL PARA PROTESIS DE RODILLA', 37, 1, 100, 1, 5, 20),
(452, 'Tapones Constrictores De Cemento Bioabsorbibles / Polietileno', 37, 2, 50, 1, 100, 500),
(453, 'CEMENTO DE BAJA VISCOSIDAD PARA GRANDES RELLENOS CON JERINGA DESCARTABLE XL', 37, 2, 50, 1, 100, 500),
(454, 'CEMENTO DE BAJA VISCOSIDAD CON ANTIBIOTICO PARA GRANDES RELLENOS CON JERINGA DESCARTABLE XL', 37, 2, 50, 1, 100, 500),
(455, 'KIT DE RECONSTRUCCION DE HUMERO CON BLOQUEO DE TITANIO (PLACA ANATOMICA, TORNILLOS Y CLAVIJA)', 37, 2, 50, 1, 1000, 10000),
(456, 'SISTEMA DE COLUMNA NACIONAL CON TORNILLOS HASTA 8,5MM DE ULTRA BAJO PERFIL DE REVISION X NIVEL', 37, 2, 50, 1, 10, 20),
(457, 'PROTESIS PARA CUPULA RADIAL ANATOMICA NO CEMENTADA', 37, 2, 50, 1, 5, 20),
(458, 'SUSTITUTO OSEO BIOACTIVE CON SILICIO EN GRANULOS 10cc', 37, 2, 50, 1, 100, 500),
(459, 'SUSTITUTO OSEO BIOACTIVE CON SILICIO EN PASTA 10cc', 37, 2, 44, 1, 100, 500),
(460, 'SUSTITUTO OSEO BIOACTIVE CON SILICIO EN JERINGA 10cc', 37, 2, 50, 1, 100, 500),
(461, 'SUSTITUTO OSEO BIOACTIVE CON SILICIO EN MEMBRANA 10cc', 37, 2, 50, 1, 100, 500),
(462, 'PROTESIS RTC NO CEMENTADA CON TALLO MINIMAMENTE INVASIVO CON CUBIERTA PROXIMAL EN PLASMA SPRAY DE TITANIO + HIDROXIAPATITA DIAM 28 - ORIGEN NACIONAL', 37, 2, 50, 1, 30, 60),
(463, 'PROTESIS RTC NO CEMENTADA CON TALLO MINIMAMENTE INVASIVO CON CUBIERTA PROXIMAL EN PLASMA SPRAY DE TITANIO + HIDROXIAPATITA DIAM 32 - ORIGEN NACIONAL', 37, 2, 45, 1, 30, 60),
(464, 'PROTESIS RTC NO CEMENTADA CON TALLO MINIMAMENTE INVASIVO CON CUBIERTA PROXIMAL EN PLASMA SPRAY DE TITANIO + HIDROXIAPATITA DIAM 36 - ORIGEN NACIONAL', 37, 2, 50, 1, 30, 60),
(465, 'ADHESIVO BIOLOGICO ORIGINAL CSL-BEHRING', 37, 2, -449, 1, 5, 20),
(466, 'set de cifoplastia lumbar', 37, 2, 50, 1, 5, 20),
(467, 'PROTESIS PARA REEMPLAZO TOTAL DE CADERA hibrida  CON TALLO TRICONICO, COTILO DOBLE MOVILIDAD, CABEZA ACERO DIAM 32/36', 37, 2, 54, 1, 20, 50),
(468, 'NUEVO PRODUCTO', 1, 1, 0, 1, 5, 20),
(475, 'NUEVO PRODUCTO 2', 14, 2, 0, 1, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productodocumento`
--

CREATE TABLE `productodocumento` (
  `idDocumento` int(3) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `idEstadoDocumento` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productodocumento`
--

INSERT INTO `productodocumento` (`idDocumento`, `idProducto`, `cantidad`, `precio`, `idEstadoDocumento`) VALUES
(54, 2, 18, '1000.00', 2),
(54, 3, 14, '1500.00', 2),
(55, 10, 8, '1000.00', 2),
(56, 4, 16, '7000.00', 2),
(57, 12, 67, '5000.00', 2),
(57, 5, 30, '7500.00', 2),
(58, 5, 7, '1000.00', 2),
(58, 3, 1, '3500.00', 2),
(59, 1, 18, '2300.00', 2),
(60, 4, 15, '5700.00', 2),
(61, 12, 13, '1500.00', 2),
(61, 6, 15, '2100.00', 2),
(62, 2, 4, '1500.00', 2),
(63, 3, 4, '2300.00', 2),
(64, 4, 7, '2000.00', 2),
(65, 1, 6, '400.00', 2),
(66, 123, 4, '6500.00', 2),
(67, 343, 2, '4500.00', 2),
(68, 151, 4, '2300.00', 2),
(69, 90, 1, '4300.00', 2),
(70, 376, 4, '2700.00', 2),
(71, 243, 2, '2300.00', 2),
(72, 310, 2, '5600.00', 2),
(73, 377, 3, '5600.00', 2),
(74, 285, 3, '8900.00', 2),
(75, 437, 4, '3400.00', 2),
(76, 6, 3, '1500.25', 2),
(76, 317, 2, '2500.50', 2),
(77, 459, 8, '3200.00', 2),
(78, 463, 5, '1200.40', 2),
(79, 372, 4, '1200.80', 2),
(80, 16, 3, '1240.40', 2),
(80, 13, 2, '1350.50', 2),
(80, 186, 1, '5600.00', 2),
(80, 288, 3, '1230.00', 2),
(81, 309, 4, '500.00', 2),
(81, 254, 7, '1700.00', 2),
(82, 395, 1, '1200.00', 2),
(82, 343, 1, '4500.00', 2),
(82, 465, 1, '600.00', 2),
(82, 405, 4, '7500.00', 2),
(83, 180, 3, '1500.00', 2),
(84, 439, 1, '2500.00', 2),
(85, 423, 2, '5000.00', 2),
(86, 167, 2, '1500.00', 2),
(87, 77, 1, '2500.00', 2),
(88, 109, 2, '7000.00', 2),
(89, 15, 2, '9000.00', 2),
(90, 15, 3, '8000.00', 2),
(91, 149, 6, '6800.00', 2),
(92, 168, 2, '6700.00', 2),
(93, 465, 500, '7500.00', 2),
(94, 16, 12, '5700.00', 2),
(95, 92, 12, '15000.00', 2),
(96, 121, 3, '16000.00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productolicitacion`
--

CREATE TABLE `productolicitacion` (
  `idLicitacion` int(4) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `idEstadoLicitacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productolicitacion`
--

INSERT INTO `productolicitacion` (`idLicitacion`, `idProducto`, `cantidad`, `precio`, `idEstadoLicitacion`) VALUES
(15, 17, 4, '5000.00', 2),
(16, 6, 4, '344.00', 2),
(16, 5, 14, '4111.00', 2),
(17, 7, 11, '700.00', 2),
(17, 6, 65, '800.00', 2),
(17, 8, 9, '700.00', 2),
(18, 2, 8, '600.00', 2),
(18, 34, 15, '800.00', 2),
(19, 18, 5, '500.00', 2),
(20, 1, 12, '5000.00', 2),
(20, 4, 2, '2000.00', 2),
(21, 438, 2, '500.00', 2),
(22, 465, 2, '1000.00', 2),
(23, 252, 12, '5000.00', 2),
(24, 119, 3, '6000.00', 2),
(24, 330, 4, '4500.00', 2),
(25, 117, 12, '5600.00', 2),
(26, 239, 5, '2300.00', 2),
(26, 11, 3, '1000.00', 2),
(27, 16, 24, '2300.00', 2),
(28, 437, 4, '4500.00', 2),
(29, 467, 4, '5400.00', 2),
(29, 459, 2, '2300.00', 2),
(30, 467, 1, '1400.00', 2),
(31, 17, 100, '3200.00', 2),
(32, 124, 4, '5600.00', 2),
(33, 143, 3, '5400.00', 2),
(33, 186, 5, '3400.00', 2),
(33, 266, 2, '9800.00', 2),
(34, 283, 1, '5700.00', 2),
(35, 12, 100, '1200.00', 2),
(36, 12, 23, '4500.00', 2),
(37, 15, 4, '15000.00', 2),
(38, 163, 4, '1.00', 1),
(39, 86, 4, '7800.00', 2),
(40, 15, 2, '7600.00', 2),
(41, 151, 1, '1.00', 1),
(42, 72, 1, '1.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `idTipoUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rol`, `idTipoUsuario`) VALUES
(1, 'Gerente', 1),
(2, 'Administracion', 1),
(3, 'Deposito', 1),
(4, 'Ventas', 1),
(5, 'Obra Social', 3),
(6, 'Proveedor', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idSolicitud` int(10) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `observacion` longtext NOT NULL,
  `fecha` date NOT NULL,
  `idEstadoSolicitud` int(1) NOT NULL,
  `idLicitacion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`idSolicitud`, `idProducto`, `cantidad`, `observacion`, `fecha`, `idEstadoSolicitud`, `idLicitacion`) VALUES
(3, 18, '5', '', '2022-11-01', 3, 19),
(8, 4, '17', '', '2022-11-16', 1, 0),
(9, 16, '24', '', '2022-11-16', 3, 27),
(10, 438, '2', '', '2023-03-16', 3, 21),
(12, 468, '2', '', '2023-03-16', 1, 0),
(13, 86, '4', '', '2023-03-21', 2, 39),
(14, 17, '100', '', '2023-03-26', 3, 31),
(15, 12, '100', '', '2023-04-08', 3, 35),
(16, 372, '1', '', '2023-05-07', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `idTipoProducto` int(5) NOT NULL,
  `tipoProducto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`idTipoProducto`, `tipoProducto`) VALUES
(1, 'Base'),
(2, 'Transicion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(10) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `tipo`) VALUES
(1, 'Empleado IM'),
(2, 'Proveedor'),
(3, 'Obra Social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(3) NOT NULL,
  `usuario` text NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  `idRol` int(2) NOT NULL,
  `idTipoUsuario` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `idEstadoUsuario` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contraseña`, `idRol`, `idTipoUsuario`, `nombre`, `correo`, `direccion`, `idEstadoUsuario`) VALUES
(1, 'Industrias', '$2y$10$UICvmo8OxVNNHYeDDsI9/uKFuihZRcrg/f8ebUuYmVm.WSyF6nnHO', 1, 1, 'Industrias Medicas', 'gonza@gmail.com', 'Pasaje Doctor Tomas Bordone 60', 1),
(3, 'OSDE', '$2y$10$GiYb5W5vMLNZ/19WhuoIbeUDaMfZ8IftqLeho69Ms0Bu4hu0CwfOK', 5, 3, 'osdecito', 'osde@gmail.com', 'Suipacha 250 B°Jardin', 1),
(7, 'usuario', '$2y$10$w1.zwlSpbyyG77uej6HMcuC3q6I6ZNNoQTC66JahqEbQPjJzP0fkG', 4, 1, 'nuevo', 'nuevo@nuevo.com', 'Pasaje Doctor Tomas Bordone 60', 1),
(9, 'ASECON', '$2y$10$4k3m6XGuhsvoF1BpJW.2U.6xVb94bjBuTxa/KQb7UpT9QEWHgpl5y', 5, 3, 'ASECON SALUD', 'ventas@gmail.com', 'Ayacucho 250 B°Nueva Córdoba', 1),
(11, 'CINEOS', '$2y$10$IMW4gbPBNQFYe7iMaGEdieqlEL1REBvPAsiNsDb6WSIfqhXiK0/gq', 6, 2, 'CINEOS', 'licitacion@gmail.com', 'Cadiz 5320 B°Colon', 1),
(12, 'deposito1', '$2y$10$ZnlEz/UUl4Z10poQqjvmPeiVd.hhm7sKVfcUmJR69LjIQO/yiXIo2', 3, 1, 'deposito1', 'depo@gmail.com', 'Pasaje Doctor Tomas Bordone 60', 1),
(13, 'ventasim', '$2y$10$Ng1Ds.iG7NZhGA/nRzpm7.AQCVGNcq/Zb5vK0b92hXeXk2RWRQ0yq', 4, 1, 'ventasim', 'ven@gmail.com', 'Pasaje Doctor Tomas Bordone 60', 1),
(14, 'admin', '$2y$10$lfil2trC5ptqsziNQ/SkNOQIeptKe/ZehrLtYLdUie9snQXUWce5W', 2, 1, 'admin', 'admin@admin.com', 'Pasaje Doctor Tomas Bordone 60', 1),
(15, 'MEDICAL', '$2y$10$k1LasjYXG80ICkwfRHTg4.arZUeewlQTi2rA.bqfl2m4ORBJNEa7C', 5, 3, 'MEDICAL SALUD', 'ventas2@gmail.com', 'Martin Garcia 2320 B°Cofico', 1),
(16, 'MEDICUS', '$2y$10$tLqN2WtCn6N2iyvvLlfHbO4jus0FiBZruv/vbbrUDcFh27DZopYum', 5, 3, 'MEDICUS', 'empresanue@gmail.com', 'Brasil 250 B°Guemes', 1),
(17, 'SWISS', '$2y$10$3wtiibUmhnYhU6ROjeQCS.hWkk8SiY6m3RUb3o8KywwpxB4WImqXm', 5, 3, 'SWISS MEDICAL', 'obra5@gmail.com', 'AV.Sabattini 3150 B°Empalme', 1),
(18, 'SURGI', '$2y$10$v4pCJcRiTQ11bIugA7b2a.PT2sHVfZ7ANLm3A2bKQtgmb4k1IZcTa', 6, 2, 'SURGI MEDICAL', 'licitacion2@gmail.com', 'Almirante Brown 725 B°Alto Alberdi', 1),
(19, 'MEDIFE', '$2y$10$IV0ciIlsfmGUDzcUFPXpJO.Hwd0BT5suCmldGYBkckXQd7bwlD0Y2', 5, 3, 'MEDIFE', 'usuarioventa@gmail.com', 'Luis Braille 3007 B°Rivadavia', 1),
(20, 'PRIMA', '$2y$10$EqnSQF0VDMLeyCS92O1XLeHOVPVya0Q1Iihd8l1FRl5H4avtM0vv6', 6, 2, 'PRIMA SA', 'proveedornuevo@gmail.com', 'Paso de los Andes 670 B°Observatorio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracionventa`
--

CREATE TABLE `valoracionventa` (
  `idValoracion` int(100) NOT NULL,
  `idDocumento` int(100) NOT NULL,
  `valoracion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `valoracionventa`
--

INSERT INTO `valoracionventa` (`idValoracion`, `idDocumento`, `valoracion`) VALUES
(3, 43, 5),
(4, 47, 5),
(5, 54, 4),
(7, 56, 4),
(8, 57, 4),
(9, 58, 4),
(10, 59, 4),
(11, 66, 4),
(12, 60, 5),
(13, 81, 5),
(14, 75, 5),
(15, 64, 4),
(16, 65, 5),
(17, 71, 4),
(18, 68, 5),
(19, 67, 4),
(20, 69, 3),
(21, 96, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centromedico`
--
ALTER TABLE `centromedico`
  ADD PRIMARY KEY (`idCentro`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `estadodocumento`
--
ALTER TABLE `estadodocumento`
  ADD PRIMARY KEY (`idEstadoDocumento`);

--
-- Indices de la tabla `estadolicitacion`
--
ALTER TABLE `estadolicitacion`
  ADD PRIMARY KEY (`idEstadoLicitacion`);

--
-- Indices de la tabla `estadoproducto`
--
ALTER TABLE `estadoproducto`
  ADD PRIMARY KEY (`idEstadoProducto`);

--
-- Indices de la tabla `estadosolicitud`
--
ALTER TABLE `estadosolicitud`
  ADD PRIMARY KEY (`idEstadoSolicitud`);

--
-- Indices de la tabla `estadousuario`
--
ALTER TABLE `estadousuario`
  ADD PRIMARY KEY (`idEstadoUsuario`);

--
-- Indices de la tabla `grupoproducto`
--
ALTER TABLE `grupoproducto`
  ADD PRIMARY KEY (`idGrupoProducto`);

--
-- Indices de la tabla `licitacion`
--
ALTER TABLE `licitacion`
  ADD PRIMARY KEY (`idLicitacion`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`idMotivo`);

--
-- Indices de la tabla `movimientoproducto`
--
ALTER TABLE `movimientoproducto`
  ADD PRIMARY KEY (`idMovimientoProducto`);

--
-- Indices de la tabla `postulacionlicitacion`
--
ALTER TABLE `postulacionlicitacion`
  ADD PRIMARY KEY (`idPostulacion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idSolicitud`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`idTipoProducto`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `valoracionventa`
--
ALTER TABLE `valoracionventa`
  ADD PRIMARY KEY (`idValoracion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT de la tabla `centromedico`
--
ALTER TABLE `centromedico`
  MODIFY `idCentro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `idDocumento` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `estadodocumento`
--
ALTER TABLE `estadodocumento`
  MODIFY `idEstadoDocumento` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `estadolicitacion`
--
ALTER TABLE `estadolicitacion`
  MODIFY `idEstadoLicitacion` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estadoproducto`
--
ALTER TABLE `estadoproducto`
  MODIFY `idEstadoProducto` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estadosolicitud`
--
ALTER TABLE `estadosolicitud`
  MODIFY `idEstadoSolicitud` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estadousuario`
--
ALTER TABLE `estadousuario`
  MODIFY `idEstadoUsuario` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupoproducto`
--
ALTER TABLE `grupoproducto`
  MODIFY `idGrupoProducto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `licitacion`
--
ALTER TABLE `licitacion`
  MODIFY `idLicitacion` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `idMotivo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `movimientoproducto`
--
ALTER TABLE `movimientoproducto`
  MODIFY `idMovimientoProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `postulacionlicitacion`
--
ALTER TABLE `postulacionlicitacion`
  MODIFY `idPostulacion` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idSolicitud` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `idTipoProducto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `valoracionventa`
--
ALTER TABLE `valoracionventa`
  MODIFY `idValoracion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
