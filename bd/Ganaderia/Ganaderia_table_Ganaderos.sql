
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ganaderos`
--

DROP TABLE IF EXISTS `Ganaderos`;
CREATE TABLE `Ganaderos` (
  `id_ganadero` int NOT NULL,
  `razonsocial` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `psg` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `domicilio` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `codigo_postal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Ganaderos`
--

INSERT INTO `Ganaderos` (`id_ganadero`, `razonsocial`, `nombre`, `psg`, `domicilio`, `codigo_postal`) VALUES
(30, 'Rancheria Miguelito', 'Miguel Sanchez', '1412AJH45AS1', 'Calle Guanajuato', 38940);
