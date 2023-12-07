
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Caja`
--

DROP TABLE IF EXISTS `Caja`;
CREATE TABLE `Caja` (
  `Id_caja` int NOT NULL,
  `FechaOperacion` date DEFAULT NULL,
  `TipoOperacion` enum('Venta','Gasto') NOT NULL,
  `Monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Caja`
--

INSERT INTO `Caja` (`Id_caja`, `FechaOperacion`, `TipoOperacion`, `Monto`) VALUES
(31, '2023-12-09', 'Venta', 150000.00),
(32, '2023-12-09', 'Gasto', 7100.00),
(33, '2023-12-31', 'Venta', 1000.00);
