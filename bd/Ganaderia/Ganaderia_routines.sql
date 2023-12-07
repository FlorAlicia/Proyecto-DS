
DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `AgregarGanadero`$$
CREATE DEFINER=`root`@`%` PROCEDURE `AgregarGanadero` (IN `p_razonsocial` VARCHAR(100), IN `p_nombre` VARCHAR(150), IN `p_psg` VARCHAR(12), IN `p_domicilio` VARCHAR(150), IN `p_codigo_postal` INT)   BEGIN
    INSERT INTO Ganaderos (razonsocial, nombre, psg, domicilio, codigo_postal)
    VALUES (p_razonsocial, p_nombre, p_psg, p_domicilio, p_codigo_postal);
END$$

DROP PROCEDURE IF EXISTS `EliminarEmpleado`$$
CREATE DEFINER=`root`@`%` PROCEDURE `EliminarEmpleado` (IN `p_IdEmpleado` INT)   BEGIN
    IF EXISTS (SELECT 1 FROM Empleados WHERE Id_empleado = p_IdEmpleado) THEN
        DELETE FROM Empleados WHERE Id_empleado = p_IdEmpleado;
        SELECT 'Empleado eliminado correctamente.' AS Mensaje;
    ELSE
        SELECT 'No se encontró.' AS Mensaje;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `EliminarGanadero`$$
CREATE DEFINER=`root`@`%` PROCEDURE `EliminarGanadero` (IN `p_razonSocial` VARCHAR(100))   BEGIN
    DECLARE exit handler for sqlexception
    BEGIN
    
        ROLLBACK;
    END;

    START TRANSACTION;

    DELETE FROM Lotes WHERE Razonsocial = p_razonSocial;

    DELETE FROM Ganaderos WHERE razonsocial = p_razonSocial;

    COMMIT;
END$$

DROP PROCEDURE IF EXISTS `GastoDieta1`$$
CREATE DEFINER=`root`@`%` PROCEDURE `GastoDieta1` ()   BEGIN
    DECLARE maiz INT;
    DECLARE salvado INT;
    DECLARE soya INT;
    DECLARE melaza INT;
    DECLARE sal INT;
    DECLARE minerales INT;
    DECLARE rastrojo INT;
    DECLARE totalGasto DECIMAL(10, 2);

    SELECT
        Maiz, Salvado, Soya, Melaza, Sal, Minerales, Rastrojo
    INTO
        maiz, salvado, soya, melaza, sal, minerales, rastrojo
    FROM
        Dieta
    WHERE
        Id_dieta = 1;

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 15
    WHERE
        Id_alimento = 1; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 20
    WHERE
        Id_alimento = 2; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 10
    WHERE
        Id_alimento = 3; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 20
    WHERE
        Id_alimento = 4; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 20
    WHERE
        Id_alimento = 5; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 15
    WHERE
        Id_alimento = 6;

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 20
    WHERE
        Id_alimento = 7; 

    SET totalGasto = (15 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 1)) +
                    (20 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 2)) +
                    (10 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 3)) +
                    (20 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 4)) +
                    (20 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 5)) +
                    (15 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 6)) +
                    (20 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 7));

    INSERT INTO Caja (FechaOperacion, TipoOperacion, Monto)
    VALUES (NOW(), 'gasto', totalGasto);
END$$

DROP PROCEDURE IF EXISTS `GastoDieta2`$$
CREATE DEFINER=`root`@`%` PROCEDURE `GastoDieta2` ()   BEGIN
    DECLARE maiz INT;
    DECLARE salvado INT;
    DECLARE soya INT;
    DECLARE melaza INT;
    DECLARE sal INT;
    DECLARE minerales INT;
    DECLARE rastrojo INT;
    DECLARE totalGasto DECIMAL(10, 2);

    SELECT
        Maiz, Salvado, Soya, Melaza, Sal, Minerales, Rastrojo
    INTO
        maiz, salvado, soya, melaza, sal, minerales, rastrojo
    FROM
        Dieta
    WHERE
        Id_dieta = 2;

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 30
    WHERE
        Id_alimento = 1; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 40
    WHERE
        Id_alimento = 2; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 20
    WHERE
        Id_alimento = 3; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 40
    WHERE
        Id_alimento = 4; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 40
    WHERE
        Id_alimento = 5; 

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 30
    WHERE
        Id_alimento = 6;

    UPDATE Alimentos
    SET
        Cantidad = Cantidad - 40
    WHERE
        Id_alimento = 7; 

    SET totalGasto = (15 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 1)) +
                    (20 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 2)) +
                    (10 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 3)) +
                    (20 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 4)) +
                    (20 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 5)) +
                    (15 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 6)) +
                    (20 * (SELECT PrecioUni FROM Alimentos WHERE Id_alimento = 7));

    INSERT INTO Caja (FechaOperacion, TipoOperacion, Monto)
    VALUES (NOW(), 'gasto', totalGasto);
END$$

DROP PROCEDURE IF EXISTS `InsertarEmpleado`$$
CREATE DEFINER=`root`@`%` PROCEDURE `InsertarEmpleado` (IN `p_Nombre` VARCHAR(255), IN `p_Paterno` VARCHAR(255), IN `p_Materno` VARCHAR(255), IN `p_Edad` INT, IN `p_IdPuesto` INT)   BEGIN
    INSERT INTO Empleados (Nombre, Paterno, Materno, Edad, Id_puesto)
    VALUES (p_Nombre, p_Paterno, p_Materno, p_Edad, p_IdPuesto);

    SELECT 'Empleado insertado correctamente.' AS Mensaje;
END$$

DELIMITER ;
