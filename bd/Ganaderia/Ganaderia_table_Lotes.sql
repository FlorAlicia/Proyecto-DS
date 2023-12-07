
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Lotes`
--

DROP TABLE IF EXISTS `Lotes`;
CREATE TABLE `Lotes` (
  `Id_lote` int NOT NULL,
  `CantidadAnimales` int NOT NULL,
  `PesoLote` decimal(10,2) NOT NULL,
  `PrecioKilo` decimal(10,2) NOT NULL,
  `FechaEntrada` date NOT NULL,
  `Razonsocial` varchar(100) NOT NULL,
  `PrecioTotal` decimal(10,2) GENERATED ALWAYS AS ((`PesoLote` * `PrecioKilo`)) STORED,
  `Id_etapa` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Disparadores `Lotes`
--
DROP TRIGGER IF EXISTS `before_delete_lote`;
DELIMITER $$
CREATE TRIGGER `before_delete_lote` BEFORE DELETE ON `Lotes` FOR EACH ROW BEGIN
    -- Eliminar las ventas asociadas al lote que se está eliminando
    DELETE FROM Ventas WHERE Id_lote = OLD.Id_lote;
END
$$
DELIMITER ;
