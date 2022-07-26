-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2022 a las 16:52:27
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pis8sa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `cod_actividad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cantidad_en_proceso` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`cod_actividad`, `nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`, `cantidad_en_proceso`, `cod_producto`) VALUES
(1, 'Secado', 'Secado del Producto', '2022-07-10', '2022-07-15', 15, 1),
(2, 'Pilado', 'Pilar el producto', '2022-07-10', '2022-07-12', 25, 1),
(3, 'Almacenado', 'Almacenar el producto', '2022-07-11', '2022-07-15', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombre`, `apellido`, `correo`, `telefono`) VALUES
(954813264, 'Daniel', 'Villegas', 'dan@gmail.com', 952147896),
(958741249, 'Maria', 'Bernal', 'maria@gmail.com', 987523145);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `cod_det_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `cod_compra` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `cod_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`cod_det_compra`, `cantidad`, `precio`, `cod_compra`, `cod_producto`, `cod_actividad`) VALUES
(1, 15, 5, 1, 1, 1),
(2, 200, 7, 0, 6, 3),
(3, 35, 4, 0, 4, 2),
(4, 20, 25, 0, 7, 2),
(5, 35, 25, 0, 7, 2),
(6, 12, 25, 0, 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `cod_det_venta` int(11) NOT NULL,
  `cod_proceso` int(11) NOT NULL,
  `cod_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`cod_det_venta`, `cod_proceso`, `cod_venta`) VALUES
(1, 6, 2),
(2, 7, 2),
(3, 8, 2),
(4, 11, 3),
(5, 12, 4),
(6, 13, 5),
(7, 14, 6),
(8, 15, 7),
(9, 16, 8),
(10, 17, 9),
(11, 18, 10),
(12, 19, 11),
(13, 20, 12),
(14, 21, 13),
(15, 22, 14),
(16, 23, 15),
(17, 24, 16),
(18, 25, 17),
(19, 26, 18),
(20, 27, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_compra`
--

CREATE TABLE `factura_compra` (
  `cod_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cod_proveedor` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura_compra`
--

INSERT INTO `factura_compra` (`cod_compra`, `fecha`, `cod_proveedor`, `cod_usuario`) VALUES
(1, '2022-07-11', 1, 1),
(2, '2022-07-12', 1, 9),
(3, '2022-07-12', 1, 9),
(4, '2022-07-12', 1, 9),
(5, '2022-07-12', 1, 9),
(6, '2022-07-12', 1, 9),
(7, '2022-07-13', 0, 934546578);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_venta`
--

CREATE TABLE `factura_venta` (
  `cod_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `pago` varchar(9) NOT NULL,
  `total` float NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura_venta`
--

INSERT INTO `factura_venta` (`cod_venta`, `fecha`, `pago`, `total`, `cod_cliente`, `cod_usuario`) VALUES
(1, '2022-07-11', '1', 15.2, 1, 1),
(2, '2022-07-11', '1', 12, 1, 1),
(3, '2022-07-11', '1', 1179.3, 1, 1),
(4, '2022-07-11', '1', 2179.3, 2, 9),
(5, '2022-07-11', '1', 13190.3, 1, 9),
(6, '2022-07-11', '', 13190.3, 0, 9),
(7, '2022-07-11', '', 13190.3, 0, 9),
(8, '2022-07-11', '', 13190.3, 0, 9),
(9, '2022-07-11', '', 13190.3, 0, 9),
(10, '2022-07-11', '', 13190.3, 0, 9),
(11, '2022-07-12', '', 13190.3, 0, 9),
(12, '2022-07-12', '1', 14190.3, 1, 9),
(13, '2022-07-12', '1', 14274.3, 2, 9),
(14, '2022-07-12', '1', 14574.3, 2, 9),
(15, '2022-07-13', '1', 19574.3, 958741249, 934546578),
(16, '2022-07-13', '2', 19814.3, 954813264, 934546578),
(17, '2022-01-15', '2', 19958.3, 954813264, 934546578),
(18, '2022-07-13', '1', 20458.3, 958741249, 934546578),
(19, '0000-00-00', '', 20758.3, 0, 934546578);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_producto`
--

CREATE TABLE `proceso_producto` (
  `cod_proceso` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `peso` float NOT NULL,
  `cantidad_procesada` int(11) NOT NULL,
  `cod_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proceso_producto`
--

INSERT INTO `proceso_producto` (`cod_proceso`, `precio_venta`, `peso`, `cantidad_procesada`, `cod_actividad`) VALUES
(1, 15, 1, 15, 1),
(2, 15.2, 2, 4, 1),
(3, 5, 2, 12, 1),
(4, 5.5, 2, 15, 1),
(5, 5.5, 2, 18, 1),
(6, 5.5, 2, 20, 1),
(7, 5.5, 2, 22, 1),
(8, 5.5, 2, 22, 1),
(9, 5.5, 2, 20, 1),
(10, 4, 2, 20, 1),
(11, 5.5, 2, 20, 1),
(12, 5, 2, 200, 1),
(13, 5.5, 2, 2002, 1),
(14, 0, 2, 0, 1),
(15, 0, 2, 0, 1),
(16, 0, 2, 0, 1),
(17, 0, 2, 0, 1),
(18, 0, 2, 0, 1),
(19, 0, 2, 0, 1),
(20, 5, 2, 200, 1),
(21, 7, 2, 12, 1),
(22, 25, 2, 12, 1),
(23, 25, 2, 200, 1),
(24, 12, 2, 20, 1),
(25, 12, 2, 12, 1),
(26, 25, 2, 20, 1),
(27, 25, 2, 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_producto` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `stock` int(11) NOT NULL,
  `peso` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `nombre`, `descripcion`, `precio`, `stock`, `peso`) VALUES
(7, 'ARROZ', 'GRANO ARROZ', 25, 1, 1),
(8, 'MAIZ', 'GRANO MAIZ', 12, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`cedula`, `nombre`, `apellido`, `correo`, `telefono`) VALUES
(934546578, 'Roger', 'Cabrera', 'rita.pla03@outlook.es', 982550933),
(985459562, 'Maria', 'Carpio', 'ma@gmail.com', 987521477),
(1314494608, 'joel', 'farfan', 'joelfarfan88@gmail.com', 982550933);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `cod_rol` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`cod_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Compras'),
(3, 'Ventas'),
(4, 'Almacén');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int(11) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `cod_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `usuario`, `nombre`, `apellido`, `correo`, `telefono`, `password`, `cod_rol`) VALUES
(929313864, 'anthony', 'Anthony', 'Macias', 'anthonyg_97@hotmail.com', 982550933, '11714d19b90eb400aa8d54835f5d81d8', 2),
(934546578, 'roger', 'Roger', 'Cabrera', 'isaacmurillofarfan56@gmail.com', 982550933, '7cc2c8168c6f153f6335224cdfa61a08', 3),
(958741249, 'juan', 'Juan', 'Acosta', 'ilianamacias67@gmail.com', 952418733, '827ccb0eea8a706c4c34a16891f84e', 3),
(1314494608, 'userprueba', 'user', 'farfan', 'joelfarfan88@gmail.com', 982550933, 'd81f6e661ebe13b6d22e376a6efe09bb', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`cod_actividad`),
  ADD KEY `cod_producto` (`cod_producto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`cod_det_compra`),
  ADD KEY `cod_compra` (`cod_compra`),
  ADD KEY `cod_producto` (`cod_producto`),
  ADD KEY `actividad_idx` (`cod_actividad`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`cod_det_venta`),
  ADD KEY `cod_proceso` (`cod_proceso`),
  ADD KEY `cod_venta` (`cod_venta`);

--
-- Indices de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  ADD PRIMARY KEY (`cod_compra`),
  ADD KEY `cod_proveedor` (`cod_proveedor`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indices de la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  ADD PRIMARY KEY (`cod_venta`),
  ADD KEY `cod_cliente` (`cod_cliente`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indices de la tabla `proceso_producto`
--
ALTER TABLE `proceso_producto`
  ADD PRIMARY KEY (`cod_proceso`),
  ADD KEY `cod_actividad` (`cod_actividad`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `cod_rol` (`cod_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `cod_det_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `cod_det_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  MODIFY `cod_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  MODIFY `cod_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proceso_producto`
--
ALTER TABLE `proceso_producto`
  MODIFY `cod_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `cod_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `actividad` FOREIGN KEY (`cod_actividad`) REFERENCES `actividad` (`cod_actividad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
