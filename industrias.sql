-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2023 a las 00:10:22
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
(88, '', 'asd', '../upload/licitaciones/recibo/24', 'asdasd', 0);

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
  `monto` varchar(100) NOT NULL,
  `observacion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datosdocumento`
--

INSERT INTO `datosdocumento` (`idDocumento`, `medico`, `paciente`, `idUsuario`, `idCentro`, `monto`, `observacion`) VALUES
(54, 'medico2', 'paciente2', 1, 6, '47190', 'nuevaoo'),
(55, 'Josecito', 'raul', 9, 1, '9680', ''),
(56, 'Juan', 'JOSE', 1, 1, '135520', ''),
(57, 'samanta', 'sebastian', 1, 1, '677600', 'bla'),
(58, 'jose perez', 'hernan dominguez', 1, 1, '12705', 'observacion'),
(59, 'qwe', 'ewq', 1, 1, '50094', ''),
(60, 'roberto sosa', 'javier ibarra', 1, 1, '1655280', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datoslicitacion`
--

CREATE TABLE `datoslicitacion` (
  `idLicitacion` int(3) NOT NULL,
  `idUsuario` int(5) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `observacion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datoslicitacion`
--

INSERT INTO `datoslicitacion` (`idLicitacion`, `idUsuario`, `monto`, `observacion`) VALUES
(16, 1, '71305.3', 'nuevalic'),
(17, 1, '2662', 'nnn'),
(18, 1, '1694', 'qwerty'),
(19, 1, '3025', ''),
(20, 1, '77440', ''),
(21, 1, '1210', ''),
(22, 1, '2420', ''),
(23, 11, '72600', ''),
(24, 1, '43560', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospostulacionlicitacion`
--

CREATE TABLE `datospostulacionlicitacion` (
  `idPostulacion` int(3) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datospostulacionlicitacion`
--

INSERT INTO `datospostulacionlicitacion` (`idPostulacion`, `idProducto`, `cantidad`, `precio`) VALUES
(19, 7, 11, 700),
(19, 6, 65, 800),
(19, 8, 9, 700),
(20, 6, 4, 344),
(20, 5, 14, 4111),
(21, 2, 8, 600),
(21, 34, 15, 800),
(22, 18, 5, 500),
(23, 1, 12, 5000),
(23, 4, 2, 2000),
(24, 17, 4, 5000),
(25, 438, 2, 500),
(26, 465, 2, 1000),
(27, 252, 12, 5000),
(28, 119, 3, 6000),
(28, 330, 4, 4500);

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
(60, 8);

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
(1, 'DISPONIBLE'),
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
(38, 'nuevo grupo');

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
(21, 2),
(22, 4),
(23, 6),
(24, 6);

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
(59, 10, '2023-03-18', '0000-00-00', 0);

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
(18, 4, '2022-11-01', '0000-00-00', 0),
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
(16, 5, '2023-03-14', '0000-00-00', 0),
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
(24, 6, '2023-03-18', '0000-00-00', 0);

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
(36, 330, '2023-03-18', 1, 4, 2);

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
(28, 24, 1, '');

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
(1, 'PROTESIS RPC TIPO THOMPSON', 1, 1, 94, 1, 10, 20),
(2, 'PROTESIS PARA REEMPLAZO DE CADERA CON CABEZA DE DOBLE MOVILIDAD TALLO PULIDO ESPEJO MODULAR', 1, 1, 106, 1, 30, 60),
(3, 'PROTESIS PARA REEMPLAZO DE CADERA CON CABEZA DE DOBLE MOVILIDAD CABEZA FIJA STANDARD Y REFORZADA', 1, 1, 85, 1, 5, 10),
(4, 'PROTESIS PARA REEMPLAZO PARCIAL DE CADERA TIPO BIPOLAR', 1, 1, 86, 1, 5, 10),
(5, 'PROTESIS RTC TIPO CHARNLEY CEMENTADA TOTAL CABEZA 22-28 CABEZA ACERO CUPULA DE POLIETILENO', 2, 1, 77, 1, 5, 10),
(6, 'PROTESIS RTC TIPO CHARNLEY CEMENTADA TOTAL CON TALLO PULIDO ESPEJO CABEZA ACERO 28-32-36 CUPULA DE POLIETILENO', 2, 1, 169, 1, 30, 60),
(7, 'PROTESIS RTC TIPO CHARNLEY CEMENTADA TOTAL CON TALLO PULIDO ESPEJO CABEZA CERAMICA 28-32 CUPULA DE POLIETILENO', 2, 1, 111, 1, 30, 60),
(8, 'PROTESIS RTC TIPO MULLER AUTOBLOQUEANTE CABEZA ACERO 28-32 CUPULA POLIETILENO', 2, 2, 59, 1, 5, 10),
(9, 'PROTESIS RTC TIPO MULLER AUTOBLOQUEANTE CABEZA ACERO 28-32-36 CUPULA POLIETILENO', 2, 2, 50, 1, 5, 10),
(10, 'PROTESIS RTC TIPO MULLER AUTOBLOQUEANTE CABEZA CERAMICA 28-32 CUPULA POLIETILENO', 2, 2, 75, 1, 5, 10),
(11, 'PROTESIS RTC OFFSET ANGULO VARIABLE CABEZA 28-32-36 CUPULA DE POLIETILENO', 2, 2, 50, 1, 5, 10),
(12, 'PROTESIS RTC DE REVISION TALLO TIPO CHARNLEY CABEZA ACERO 28-32-36 CUPULA POLIETILENO', 3, 2, 8, 1, 30, 60),
(13, 'PROTESIS RTC DE REVISION TALLO TIPO CHARNLEY CABEZA CERAMICA 28-32 CUPULA POLIETILENO', 3, 2, 50, 1, 30, 60),
(14, 'PROTESIS PARA REVISION DE CADERA ANGULO VARIABLE OFFSET VARIABLE CABEZA ACERO 28-32-36', 3, 2, 75, 1, 5, 10),
(15, 'PROTESIS DE REVISION ESPECIAL DE CADERA CEMENTADA', 3, 2, 75, 1, 5, 10),
(16, 'PROTESIS RTC TALLO TIPO CHARNLEY PULIDO ESPEJO CABEZA ACERO 28-32 CUPULA NO CEMENTADA PRESSFIT RECUBIERTA EN PLASMA DE TITANIO CON LINER DE POLIETILENO', 4, 1, 50, 1, 30, 60),
(17, 'PROTESIS RTC TALLO TIPO MULLER AUTOBLOQUEANTE CABEZA ACERO 28-32 CUPULA NO CEMENTADA PRESSFIT RECUBIERTA EN PLASMA DE TITANIO CON LINER DE POLIETILENO', 4, 1, 19, 1, 30, 60),
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
(90, 'SUSTITUTO OSEO EN POLVO', 21, 1, 100, 1, 100, 500),
(91, 'SUSTITUTO OSEO EN BLOQUE', 21, 1, 100, 1, 100, 500),
(92, 'MATRIZ OSEA EXTRACELULAR', 21, 2, 50, 1, 5, 20),
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
(117, 'CLAVO ENDOMEDULAR PARA HUMERO TITANIO', 22, 1, 100, 1, 20, 50),
(118, 'CLAVO ISOELASTICO DE 2MM HASTA 4MM DE 320MM A 400MM DE LARGO', 22, 1, 100, 1, 5, 20),
(119, 'CLAVO TEN PEDIATRICO', 22, 1, 103, 1, 5, 20),
(120, 'GUIAS DE ALINEACION DE FRACTURA INTRAOPERATORIA', 22, 1, 100, 1, 5, 20),
(121, 'CLAVO ENDOMEDULAR PARA FEMUR CON ANTIBIOTICO', 22, 1, 100, 1, 20, 50),
(122, 'CLAVO ENDOMEDULAR PARA TIBIA CON ANTIBIOTICO', 22, 1, 100, 1, 20, 50),
(123, 'SET DE DETENSORES DE TITANIO HASTA 2', 22, 1, 100, 1, 30, 100),
(124, 'SET DE DETENSORES DE TITANIO HASTA 4', 22, 1, 100, 1, 30, 100),
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
(143, 'KIT DE RECONSTRUCCION DE TIBIA PLACA RECTA CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 1, 100, 1, 1000, 10000),
(144, 'KIT DE RECONSTRUCCION DE TIBIA DISTAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 1, 100, 1, 1000, 10000),
(145, 'KIT DE RECONSTRUCCION DE TIBIA PROXIMAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 1, 100, 1, 1000, 10000),
(146, 'KIT DE RECONSTRUCCION PARA PIE (PLACA, GRAMPAS, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(147, 'KIT DE RECONSTRUCCION PARA FEMUR PLACA RECTA CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(148, 'KIT DE RECONSTRUCCION PARA FEMUR DISTAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(149, 'KIT DE RECONSTRUCCION PARA FEMUR PROXIMAL CON BLOQUEO (PLACA, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(150, 'KIT DE RECONSTRUCCION PARA CALCANEO LAMBDA ACERO CON BLOQUEO  (PLACA, TORNILLO Y CLAVIJAS)', 24, 2, 50, 1, 1000, 10000),
(151, 'KIT DE RECONSTRUCCION DE PELVIS HASTA 2 PLACAS (PLACA Y TORNILLO)', 25, 1, 100, 1, 1000, 10000),
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
(186, 'KIT DE RECONSTRUCCION DE MANO  (PLACA 1,5 Y 2,0 Y TORNILLOS)', 29, 1, 100, 1, 1000, 10000),
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
(239, 'TORNILLOS INTERFERENCIALES DE TITANIO X2', 33, 1, 100, 1, 1000, 10000),
(240, 'TORNILLOS INTERFERENCIALES DE PEEK X2', 33, 1, 100, 1, 1000, 10000),
(241, 'TORNILLOS INTERFERENCIALES BIODEGRADABLES BIOCOMPUESTOS', 33, 1, 100, 1, 1000, 10000),
(242, 'SUTURA MENISCAL HASTA 2', 33, 2, 50, 1, 100, 500),
(243, 'SUTURA DE ALTA RESISTENCIA HASTA 2', 33, 2, 50, 1, 100, 500),
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
(254, 'SET DE FRESAS SHANON', 33, 1, 100, 1, 5, 20),
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
(266, 'SISTEMA DE COLUMNA HASTA 6 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 34, 2, 50, 1, 10, 20),
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
(283, 'SISTEMA DE COLUMNA CERVICAL HASTA 2 NIVELES CON SISTEMA DE BLOQUEO', 34, 1, 100, 1, 10, 20),
(284, 'SISTEMA DE COLUMNA CERVICAL HASTA 3 NIVELES CON SISTEMA DE BLOQUEO', 34, 1, 100, 1, 10, 20),
(285, 'SISTEMA DE COLUMNA CERVICAL HASTA 4 NIVELES CON SISTEMA DE BLOQUEO', 34, 1, 100, 1, 10, 20),
(286, 'SISTEMA DE COLUMNA CERVICAL HASTA 5 NIVELES CON SISTEMA DE BLOQUEO', 34, 2, 50, 1, 10, 20),
(287, 'SISTEMA DE COLUMNA CERVICAL HASTA 6 NIVELES CON SISTEMA DE BLOQUEO', 34, 2, 50, 1, 10, 20),
(288, 'SISTEMA DE COLUMNA CERVICAL HASTA 2 NIVELES CON SISTEMA DE BLOQUEO AUTOGENO', 34, 1, 100, 1, 10, 20),
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
(309, 'COLAGENO HETEROLOGO EN HEBRAS (SUS-MEM)', 34, 2, 50, 1, 5, 20),
(310, 'SET PARA VERTEBROPLASTIA', 34, 2, 50, 1, 5, 20),
(311, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(312, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(313, 'SISTEMA DE COLUMNA HASTA 4 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(314, 'SISTEMA DE COLUMNA HASTA 5 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 1, 100, 1, 10, 20),
(315, 'SISTEMA DE COLUMNA HASTA 6 NIVELES CON TORNILLOS POLIAXIALES BAJO PERFIL', 35, 1, 100, 1, 10, 20),
(316, 'SISTEMA DE COLUMNA HASTA 2 NIVELES CON TORNILLOS POLIAXIALES ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
(317, 'SISTEMA DE COLUMNA HASTA 3 NIVELES CON TORNILLOS POLIAXIALES ULTRA BAJO PERFIL', 35, 2, 50, 1, 10, 20),
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
(343, 'CONECTOR DOMINO', 35, 2, 50, 1, 5, 20),
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
(372, 'TUTOR PARA PELVIS MONTAJE TIPO AO', 37, 1, 100, 1, 5, 20),
(373, 'TUTOR PARA MU?ECA, BRAZO Y ANTE BRAZO MONTAJE TIPO AO', 37, 1, 100, 1, 5, 20),
(374, 'TUTOR MONOPLANAR PARA ALARGAMIENTO FEMUR O TIBIA', 37, 1, 100, 1, 5, 20),
(375, 'TUTOR MONOPLANAR PARA ALARGAMIENTO HUMERO', 37, 1, 100, 1, 5, 20),
(376, 'MICROTORNILLO HERBERT 2,0 - 2,3 DE TITANIO', 37, 2, 50, 1, 1000, 10000),
(377, 'MICROTORNILLO HERBERT 2,4 - 2,7 DE TITANIO', 37, 2, 50, 1, 1000, 10000),
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
(395, 'PINZA SCORPION', 37, 2, 50, 1, 5, 20),
(396, 'SET DE MICROLEZNAS', 37, 2, 50, 1, 5, 20),
(397, 'GENERADOR ELECTROQUIRURGICO OPES', 37, 2, 50, 1, 5, 20),
(398, 'FUENTE DE LUZ PARA SISTEMA TUBULAR ', 37, 2, 50, 1, 5, 20),
(399, 'SISTEMA TUBULAR PARA DISECTOMIA DE HERNIA DISCAL CON DILATADORES PARA CIRUGIA MINIMAMENTE INVASIVA POSTEROLATERAL', 37, 2, 50, 1, 5, 20),
(400, 'SISTEMA TUBULAR PARA DISECTOMIA DE HERNIA DISCAL CON DILATADORES PARA CIRUGIA MINIMAMENTE INVASIVA ANTEROLATERAL', 37, 2, 50, 1, 5, 20),
(401, 'SISTEMA TUBULAR PARA DISECTOMIA DE HERNIA DISCAL CON DILATADORES PARA CIRUGIA MINIMAMENTE INVASIVA LATERAL', 37, 2, 50, 1, 5, 20),
(402, 'EXPANSOR CON VALVAS INTERCAMBIABLES MULTIREGULABLE', 37, 2, 50, 1, 5, 20),
(403, 'CLAVO CEFALOMEDULAR CON TOMA UNIDRECCIONAL Y BLOQUEO ULTRA PROXIMAL (GAMMA 2DA GEN)', 37, 2, 50, 1, 5, 20),
(404, 'KIT DE MEZCLADO Y PRESURIZACION AL VACIO DE CEMENTO QUIRURGICO.', 37, 2, 50, 1, 100, 500),
(405, 'FRESA AUTOBLOQUEANTE', 37, 2, 50, 1, 5, 20),
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
(438, 'AGUJA PARA VERTEBROPLASTIA', 37, 2, 50, 1, 5, 20),
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
(459, 'SUSTITUTO OSEO BIOACTIVE CON SILICIO EN PASTA 10cc', 37, 2, 50, 1, 100, 500),
(460, 'SUSTITUTO OSEO BIOACTIVE CON SILICIO EN JERINGA 10cc', 37, 2, 50, 1, 100, 500),
(461, 'SUSTITUTO OSEO BIOACTIVE CON SILICIO EN MEMBRANA 10cc', 37, 2, 50, 1, 100, 500),
(462, 'PROTESIS RTC NO CEMENTADA CON TALLO MINIMAMENTE INVASIVO CON CUBIERTA PROXIMAL EN PLASMA SPRAY DE TITANIO + HIDROXIAPATITA DIAM 28 - ORIGEN NACIONAL', 37, 2, 50, 1, 30, 60),
(463, 'PROTESIS RTC NO CEMENTADA CON TALLO MINIMAMENTE INVASIVO CON CUBIERTA PROXIMAL EN PLASMA SPRAY DE TITANIO + HIDROXIAPATITA DIAM 32 - ORIGEN NACIONAL', 37, 2, 50, 1, 30, 60),
(464, 'PROTESIS RTC NO CEMENTADA CON TALLO MINIMAMENTE INVASIVO CON CUBIERTA PROXIMAL EN PLASMA SPRAY DE TITANIO + HIDROXIAPATITA DIAM 36 - ORIGEN NACIONAL', 37, 2, 50, 1, 30, 60),
(465, 'ADHESIVO BIOLOGICO ORIGINAL CSL-BEHRING', 37, 2, 52, 1, 5, 20),
(466, 'set de cifoplastia lumbar', 37, 2, 50, 1, 5, 20),
(467, 'PROTESIS PARA REEMPLAZO TOTAL DE CADERA hibrida  CON TALLO TRICONICO, COTILO DOBLE MOVILIDAD, CABEZA ACERO DIAM 32/36', 37, 2, 50, 1, 20, 50),
(468, 'NUEVO PRODUCTO', 1, 1, 0, 1, 5, 20),
(470, 'productiiii', 2, 2, 0, 1, 5, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productodocumento`
--

CREATE TABLE `productodocumento` (
  `idDocumento` int(3) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `idEstadoDocumento` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productodocumento`
--

INSERT INTO `productodocumento` (`idDocumento`, `idProducto`, `cantidad`, `precio`, `idEstadoDocumento`) VALUES
(54, 2, 18, '1000', 2),
(54, 3, 14, '1500', 2),
(55, 10, 8, '1000', 2),
(56, 4, 16, '7000', 2),
(57, 12, 67, '5000', 2),
(57, 5, 30, '7500', 2),
(58, 5, 7, '1000', 2),
(58, 3, 1, '3500', 2),
(59, 1, 18, '2300', 2),
(60, 4, 240, '5700', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productolicitacion`
--

CREATE TABLE `productolicitacion` (
  `idLicitacion` int(4) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` float NOT NULL,
  `idEstadoLicitacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productolicitacion`
--

INSERT INTO `productolicitacion` (`idLicitacion`, `idProducto`, `cantidad`, `precio`, `idEstadoLicitacion`) VALUES
(15, 17, 4, 5000, 2),
(16, 6, 4, 344, 2),
(16, 5, 14, 4111, 2),
(17, 7, 11, 700, 2),
(17, 6, 65, 800, 2),
(17, 8, 9, 700, 2),
(18, 2, 8, 600, 2),
(18, 34, 15, 800, 2),
(19, 18, 5, 500, 2),
(20, 1, 12, 5000, 2),
(20, 4, 2, 2000, 2),
(21, 438, 2, 500, 2),
(22, 465, 2, 1000, 2),
(23, 252, 12, 5000, 2),
(24, 119, 3, 6000, 2),
(24, 330, 4, 4500, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL,
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
(9, 16, '24', '', '2022-11-16', 1, 0),
(10, 438, '2', '', '2023-03-16', 2, 21),
(12, 468, '2', '', '2023-03-16', 1, 0);

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
  `tipo` varchar(20) NOT NULL
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
(1, 'Gonzalo', '$2y$10$UICvmo8OxVNNHYeDDsI9/uKFuihZRcrg/f8ebUuYmVm.WSyF6nnHO', 1, 1, 'Gonzalito1', 'gon@gmail.com', 'casa1 barrrio san martin', 1),
(3, 'OSDE', '$2y$10$GiYb5W5vMLNZ/19WhuoIbeUDaMfZ8IftqLeho69Ms0Bu4hu0CwfOK', 2, 3, 'osdecito', 'osde@gmail.com', 'cas2 b jardibn', 1),
(4, 'pepitoproveedor', '$2y$10$5nJ2ZsMQCk/uF/L9wGZ4bul2UA4Svei5Ofq/QxHdusskGpr5o0l3i', 2, 2, 'pepito', 'pepito@gmail.com', 'casa 3 barrio ituzaingo', 1),
(6, 'Jose', '$2y$10$yzWCjnT2h8plnsSlRL5Ip.wEDHGZVBqXnRTJh6oktFOVfshtKGpPK', 3, 2, 'josecito', 'jose@gmail.com', 'casa 10 barrio pepe', 1),
(7, 'usuario', '$2y$10$w1.zwlSpbyyG77uej6HMcuC3q6I6ZNNoQTC66JahqEbQPjJzP0fkG', 4, 1, 'nuevo', 'nuevo@nuevo.com', 'nuevonuevonuevo', 1),
(8, 'usuario21', '$2y$10$kZEGYI66XI2/Wll1lXrsIu7S7MaGh.IGSiz9Pr7o5QKm0tdGX6oNa', 3, 1, 'nuevo2', 'nuevo2@nuevo.com', 'nuevo2nuevonuevo', 1),
(9, 'ventas1', '$2y$10$7h2/K6M/PdEyywIBEij/MuR6Fro9p6SXqhUQ6Jk4bjsfO5MbBArCO', 5, 3, 'DeVentas', 'ventas@gmail.com', 'algun lugar', 1),
(11, 'licitacion1', '$2y$10$vgtMz/KKKOBpDZEg/Gn1EO2grlRBpzd/vVhxahJHLNucNW0n6un6O', 6, 2, 'delicitacion', 'licitacion@gmail.com', 'algun lugar2', 1),
(12, 'deposito1', '$2y$10$ZnlEz/UUl4Z10poQqjvmPeiVd.hhm7sKVfcUmJR69LjIQO/yiXIo2', 3, 1, 'deposito1', 'depo@gmail.com', 'algun lugar nuevo', 1),
(13, 'ventasim', '$2y$10$Ng1Ds.iG7NZhGA/nRzpm7.AQCVGNcq/Zb5vK0b92hXeXk2RWRQ0yq', 4, 1, 'ventasim', 'ven@gmail.com', 'algunnn', 1),
(14, 'admin', '$2y$10$lfil2trC5ptqsziNQ/SkNOQIeptKe/ZehrLtYLdUie9snQXUWce5W', 2, 1, 'admin', 'admin@admin.com', 'lugar 19', 1),
(15, 'ventas2', '$2y$10$feauFhUMVZ2.VYZIA9o0U.Kc7ROTEHWi.KQmOMq.C66.EwHU9xvYC', 5, 3, 'ventas2', 'ventas2@gmail.com', 'algun lugarcito', 1),
(16, 'empresanueva', '$2y$10$yXUi0lH.59UkpP9D5xvZo.S/Ki5MlsS3SK4UuqLMsECqh9/xM8q7C', 5, 3, 'empresanueva', 'empresanue@gmail.com', 'asadasd', 1),
(17, 'obra5', '$2y$10$ZdqYhyIQaNCoxYbbCJH0cuG9YSwaNGaCXpGFr4NOInhIUZzBSr/GG', 5, 3, 'obra5', 'obra5@gmail.com', 'nueva cordoba', 1);

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
(10, 59, 4);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `centromedico`
--
ALTER TABLE `centromedico`
  MODIFY `idCentro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `idDocumento` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  MODIFY `idGrupoProducto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `licitacion`
--
ALTER TABLE `licitacion`
  MODIFY `idLicitacion` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `idMotivo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `movimientoproducto`
--
ALTER TABLE `movimientoproducto`
  MODIFY `idMovimientoProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `postulacionlicitacion`
--
ALTER TABLE `postulacionlicitacion`
  MODIFY `idPostulacion` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idSolicitud` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `idUsuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `valoracionventa`
--
ALTER TABLE `valoracionventa`
  MODIFY `idValoracion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
