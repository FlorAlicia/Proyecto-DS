
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ciudades`
--

DROP TABLE IF EXISTS `Ciudades`;
CREATE TABLE `Ciudades` (
  `Id_ciudad` int NOT NULL,
  `Ciudad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_municipio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Ciudades`
--

INSERT INTO `Ciudades` (`Id_ciudad`, `Ciudad`, `Id_municipio`) VALUES
(1, 'Yuriria Cabecera', 11046),
(2, 'La Faja', 11046),
(3, 'Monte de los Juarez', 11046),
(4, 'Parangarico', 11046),
(5, 'San Andres Enguaro', 11046),
(6, 'San Francisco de la Cruz', 11046),
(7, 'La Purisima', 11046),
(8, 'Tierra Blanca', 11046),
(9, 'Orucuaro', 11046),
(10, 'San Miguel el Alto (San Miguelito)', 11046),
(11, 'San Jose de Gracia', 11046),
(12, 'Ochomitas', 11046),
(13, 'El Palo Dusal', 11046),
(14, 'San Pablo Casacuaran', 11046),
(15, 'Puerto de Porullo', 11046),
(16, 'Tinaja de Pastores', 11046),
(17, 'Porullo', 11046),
(18, 'Zapotitos', 11046),
(19, 'Ejido de Parangarico (La Y Griega)', 11046),
(21, 'La Mojonera', 11046),
(22, 'Las Rosas', 11046),
(23, 'Malpais', 11046),
(24, 'Martin Checa', 11046),
(25, 'Puesto de Agua Fria (La Mojina)', 11046),
(26, 'Rancho de Geras', 11046),
(27, 'San Gregorio', 11046),
(28, 'San Cayetano', 11046),
(29, 'La Angostura', 11046),
(30, 'Loma de Zempoala', 11046),
(31, 'El Granjenal', 11046),
(32, 'Mexico', 11046),
(33, 'El Pochote', 11046),
(34, 'La Hacienda de la Flor', 11046),
(35, 'Los Tepetates', 11046),
(36, 'Santa Rosa', 11046),
(37, 'Santiaguillo', 11046),
(38, 'El Tigre', 11046),
(39, 'Palo Alto', 11046),
(40, 'San Nicolas Cuerunero', 11046),
(41, 'Xoconoxtle', 11046),
(42, 'El Cimental (Hacienda del Cimental)', 11046),
(43, 'Cuerunero', 11046),
(44, 'Providencia de Cuerunero', 11046),
(45, 'San Vicente Zapote', 11046),
(46, 'Buenavista de la Libertad', 11046),
(47, 'Del Armadillo', 11046),
(48, 'El Bosque', 11046),
(49, 'El Pastor', 11046),
(51, 'La Soledad de Cuerunero', 11046),
(52, 'Ojos de Agua de Cordoba', 11046),
(53, 'San Gabriel', 11046),
(54, 'San Vicente Joyuela', 11046),
(55, 'San Vicente Sabino', 11046),
(56, 'San Vicente Sabino Dos', 11046),
(57, 'Puquichapio', 11046),
(58, 'Cahuilote', 11046),
(59, 'El Velador', 11046),
(60, 'La Punta (Montecillo y Punta)', 11046),
(61, 'Potrero Nuevo', 11046),
(62, 'San Vicente Cienega', 11046),
(63, 'Agua Fria', 11046),
(64, 'La Tinaja del Coyote', 11046),
(65, 'El Timbinal', 11046),
(66, 'Rancho Viejo de Pastores', 11046),
(67, 'Canada de Pastores', 11046),
(68, 'Las Crucitas', 11046),
(69, 'El Salteador', 11046),
(70, 'La Pila', 11046),
(71, 'Espanita', 11046),
(72, 'Las Rosas (La Mina)', 11046),
(73, 'San Aparicio', 11046),
(74, 'Santa Lucia', 11046),
(75, 'Tejocote de Pastores', 11046),
(76, 'Zepeda', 11046),
(77, 'La Calera', 11046),
(78, 'El Canario', 11046),
(79, 'Cerano (San Juan Cerano)', 11046),
(80, 'Tejocote de Calera', 11046),
(81, 'San Andres Calera', 11046),
(82, 'San Isidro Calera', 11046),
(83, 'San Jose Otonguitiro', 11046),
(84, 'El Sauz', 11046),
(85, 'Los Alcantar', 11046),
(86, 'Merino', 11046),
(87, 'Providencia de Calera', 11046),
(88, 'Buenavista (Buena Vista de Cerano)', 11046),
(89, 'Cerecuaro', 11046),
(90, 'Las Mesas', 11046),
(91, 'La Cruz del Nino', 11046),
(92, 'Corrales', 11046),
(93, 'San Felipe', 11046),
(94, 'Jacales', 11046),
(95, 'Aragon', 11046),
(96, 'Ojos de Agua de Cerano', 11046),
(97, 'San Antonio', 11046),
(98, 'Puerto del aguila', 11046),
(99, 'El Moro', 11046),
(100, 'Laguna Prieta', 11046),
(101, 'Ocurio', 11046),
(102, 'Juan Lucas', 11046),
(103, 'El Moralito', 11046),
(104, 'Puerta de Cerano', 11046),
(105, 'El Moral', 11046),
(106, 'Santa Monica Ozumbilla', 11046),
(107, 'Abasolo', 11046),
(108, 'Acambaro', 11046),
(109, 'Apaseo el Alto', 11046),
(110, 'Apaseo el Grande', 11046),
(111, 'Atarjea', 11046),
(112, 'Celaya', 11046),
(113, 'Ciudad Manuel Doblado', 11046),
(114, 'Comonfort', 11046),
(115, 'Coroneo', 11046),
(116, 'Cortazar', 11046),
(117, 'Cueramaro', 11046),
(118, 'Doctor Mora', 11046),
(119, 'Dolores Hidalgo', 11046),
(120, 'Empalme Escobedo', 11046),
(121, 'Guanajuato', 11046),
(122, 'Huanimaro', 11046),
(123, 'Irapuato', 11046),
(124, 'Jaral del Progreso', 11046),
(125, 'Jerecuaro', 11046),
(126, 'Leon', 11046),
(127, 'Leon de los Aldama', 11046),
(128, 'Manuel Doblado', 11046),
(129, 'Marfil', 11046),
(130, 'Moroleon', 11046),
(131, 'Ocampo', 11046),
(132, 'Pueblo Nuevo', 11046),
(133, 'Purisima de Bustos', 11046),
(134, 'Purisima del Rincon', 11046),
(135, 'Penjamo', 11046),
(136, 'Rincon de Tamayo', 11046),
(137, 'Romita', 11046),
(138, 'Salamanca', 11046),
(139, 'Salvatierra', 11046),
(140, 'San Diego de la Union', 11046),
(141, 'San Felipe', 11046),
(142, 'San Francisco del Rincon', 11046),
(143, 'San Jose Iturbide', 11046),
(144, 'San Luis de la Paz', 11046),
(145, 'San Miguel de Allende', 11046),
(146, 'Santa Catarina', 11046),
(147, 'Santa Cruz Juventino Rosas', 11046),
(148, 'Santa Cruz de Juventino Rosas', 11046),
(149, 'Santiago Maravatio', 11046),
(150, 'Silao', 11046),
(151, 'Silao de la Victoria', 11046),
(152, 'Tarandacuao', 11046),
(153, 'Tarimoro', 11046),
(154, 'Tierra Blanca', 11046),
(155, 'Uriangato', 11046),
(156, 'Valle de Santiago', 11046),
(157, 'Victoria', 11046),
(158, 'Villagran', 11046),
(159, 'Xichu', 11046);