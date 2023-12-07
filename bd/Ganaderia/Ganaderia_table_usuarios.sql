
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`) VALUES
(13, 'a@gg', 'fagogo445'),
(14, 'a@aa', 'fagogo445'),
(15, 'a@aa', 'fagogo445'),
(16, 'a@gg', 'alis'),
(17, 'm@a', 'alis'),
(18, 'e@u', '$2y$10$/0nXlpu6UoYdcPGmW63cduc/5YBe0t7hG12zAxdfWIJ.YyklU0afG'),
(19, 'fa.gogo445@gmail.com', '$2y$10$kG/LHO97aTjNLQoFVshSOegRGSJKKqFRgggn/aXLugqrHaSVL/HEK'),
(20, 'manuel@gmail.com', '$2y$10$eDpiLOGavAnAFlTaKFTw/uMFtT3ZlPMDKXWR/S8RVd80W8Artxzuq');
