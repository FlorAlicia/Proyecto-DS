
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vacunas`
--

DROP TABLE IF EXISTS `Vacunas`;
CREATE TABLE `Vacunas` (
  `id_vacuna` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Vacunas`
--

INSERT INTO `Vacunas` (`id_vacuna`, `nombre`, `cantidad`) VALUES
(1, 'Ala', 21);
