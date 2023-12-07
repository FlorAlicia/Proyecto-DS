-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 10-12-2023 a las 21:02:24
-- Versión del servidor: 8.0.34
-- Versión de PHP: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Ganaderia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Lotes`
--

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
DELIMITER $$
CREATE TRIGGER `before_delete_lote` BEFORE DELETE ON `Lotes` FOR EACH ROW BEGIN
    -- Eliminar las ventas asociadas al lote que se está eliminando
    DELETE FROM Ventas WHERE Id_lote = OLD.Id_lote;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Lotes`
--
ALTER TABLE `Lotes`
  ADD PRIMARY KEY (`Id_lote`),
  ADD KEY `Razonsocial` (`Razonsocial`),
  ADD KEY `Id_etapa` (`Id_etapa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Lotes`
--
ALTER TABLE `Lotes`
  MODIFY `Id_lote` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Lotes`
--
ALTER TABLE `Lotes`
  ADD CONSTRAINT `Lotes_ibfk_1` FOREIGN KEY (`Razonsocial`) REFERENCES `Ganaderos` (`razonsocial`),
  ADD CONSTRAINT `Lotes_ibfk_2` FOREIGN KEY (`Id_etapa`) REFERENCES `Etapas` (`Id_etapa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
