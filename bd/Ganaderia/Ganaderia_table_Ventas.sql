
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ventas`
--

DROP TABLE IF EXISTS `Ventas`;
CREATE TABLE `Ventas` (
  `Id_venta` int NOT NULL,
  `Id_lote` int DEFAULT NULL,
  `FechaVenta` date DEFAULT NULL,
  `PrecioVenta` decimal(10,2) DEFAULT NULL,
  `GastoDieta` decimal(10,2) DEFAULT NULL,
  `Peso` decimal(10,2) DEFAULT NULL,
  `PrecioKilo` decimal(10,2) DEFAULT NULL,
  `PrecioTotal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
