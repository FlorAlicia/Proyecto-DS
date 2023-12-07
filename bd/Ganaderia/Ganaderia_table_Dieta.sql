
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Dieta`
--

DROP TABLE IF EXISTS `Dieta`;
CREATE TABLE `Dieta` (
  `Id_dieta` int NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Dieta`
--

INSERT INTO `Dieta` (`Id_dieta`, `Nombre`) VALUES
(1, 'Iniciación'),
(2, 'Engorda');
