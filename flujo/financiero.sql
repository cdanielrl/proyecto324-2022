-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2022 a las 07:22:52
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
-- Base de datos: `financiero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE `flujo` (
  `flujo` varchar(255) NOT NULL,
  `proceso` varchar(255) NOT NULL,
  `pantalla` varchar(255) NOT NULL,
  `proceso_siguiente` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`flujo`, `proceso`, `pantalla`, `proceso_siguiente`, `tipo`, `rol`) VALUES
('prestamo', 'ingresar_datos', 'datos', 'analisis', 'Entrada', 'empleado'),
('prestamo', 'analisis', 'analizar_requisitos', 'aprobar_rechazar', 'Condicional', 'analista'),
('prestamo', 'aprobar_prestamo', 'aprobar', '', '', 'oficial'),
('prestamo', 'rechazar_prestamo', 'rechazar', '', 'Entrada', 'oficial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujocondicion`
--

CREATE TABLE `flujocondicion` (
  `flujo` varchar(255) NOT NULL,
  `procesoSI` varchar(255) NOT NULL,
  `procesoNO` varchar(255) NOT NULL,
  `proceso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flujocondicion`
--

INSERT INTO `flujocondicion` (`flujo`, `procesoSI`, `procesoNO`, `proceso`) VALUES
('prestamo', 'aprobar_prestamo', 'rechazar_prestamo', 'aprobar_rechazar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujotramite`
--

CREATE TABLE `flujotramite` (
  `flujo` varchar(255) NOT NULL,
  `proceso` varchar(255) NOT NULL,
  `nro_tramite` int(11) NOT NULL,
  `fechaini` date NOT NULL,
  `fechafin` date NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flujotramite`
--

INSERT INTO `flujotramite` (`flujo`, `proceso`, `nro_tramite`, `fechaini`, `fechafin`, `usuario`) VALUES
('prestamo', 'analisis', 1, '2022-12-11', '0000-00-00', 'analista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitante`
--

CREATE TABLE `solicitante` (
  `id` int(11) NOT NULL,
  `nombrecompleto` varchar(255) NOT NULL,
  `ingresos` decimal(10,0) NOT NULL,
  `dependiente` varchar(255) NOT NULL,
  `montoprestamo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitante`
--

INSERT INTO `solicitante` (`id`, `nombrecompleto`, `ingresos`, `dependiente`, `montoprestamo`) VALUES
(1, 'juan perez', '10000', 'dependiente', '1000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(255) NOT NULL,
  `contrasenia_hash` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasenia_hash`, `rol`) VALUES
('analista', 'f8cdb04495ded47615258f9dc6a3f4707fd2405434fefc3cbf4ef4e6', 'analista'),
('empleado', 'f8cdb04495ded47615258f9dc6a3f4707fd2405434fefc3cbf4ef4e6', 'empleado'),
('oficial', 'f8cdb04495ded47615258f9dc6a3f4707fd2405434fefc3cbf4ef4e6', 'oficial');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `flujotramite`
--
ALTER TABLE `flujotramite`
  ADD PRIMARY KEY (`nro_tramite`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
