<?php
include("includes/header.php");
include("class/Conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $razonSocial = $_POST["razonSocial"];
    $fechaVenta = $_POST["fechaVenta"];
    $precioKilo = $_POST["precioKilo"];

    $conexion = new Conexion();
    $conn = $conexion->conectar();

    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sqlIdGanadero = "SELECT Id_ganadero FROM Ganaderos WHERE Razonsocial = ?";
    $stmtIdGanadero = $conn->prepare($sqlIdGanadero);
    $stmtIdGanadero->bind_param("s", $razonSocial);
    $stmtIdGanadero->execute();
    $resultIdGanadero = $stmtIdGanadero->get_result();

    if ($resultIdGanadero->num_rows > 0) {
        $rowIdGanadero = $resultIdGanadero->fetch_assoc();
        $idGanadero = $rowIdGanadero["Id_ganadero"];

        $sqlFechaEntrada = "SELECT FechaEntrada, Id_lote FROM Lotes WHERE Id_ganadero = ? ORDER BY FechaEntrada ASC LIMIT 1";
        $stmtFechaEntrada = $conn->prepare($sqlFechaEntrada);
        $stmtFechaEntrada->bind_param("Id_ganadero", $idGanadero);
        $stmtFechaEntrada->execute();
        $resultFechaEntrada = $stmtFechaEntrada->get_result();

        if ($resultFechaEntrada->num_rows > 0) {
            $rowFechaEntrada = $resultFechaEntrada->fetch_assoc();
            $fechaEntrada = $rowFechaEntrada["FechaEntrada"];
            $idLote = $rowFechaEntrada["Id_lote"];

            // Calcular el gasto por dieta
            $diasTranscurridos = (strtotime($fechaVenta) - strtotime($fechaEntrada)) / (60 * 60 * 24);
            $gastoDieta = 405 * $diasTranscurridos;

            // Calcular el peso
            $peso = 0.70 * $diasTranscurridos;

            // Calcular el precio total
            $sqlCantidadAnimales = "SELECT CantidadAnimales FROM Lotes WHERE Id_lote = ?";
            $stmtCantidadAnimales = $conn->prepare($sqlCantidadAnimales);
            $stmtCantidadAnimales->bind_param("i", $idLote);
            $stmtCantidadAnimales->execute();
            $resultCantidadAnimales = $stmtCantidadAnimales->get_result();

            if ($resultCantidadAnimales->num_rows > 0) {
                $rowCantidadAnimales = $resultCantidadAnimales->fetch_assoc();
                $cantidadAnimales = $rowCantidadAnimales["CantidadAnimales"];

                $precioTotal = $cantidadAnimales * $precioKilo * $peso;
                $precioVenta = $precioTotal + $gastoDieta;

                $conn->begin_transaction();

                $sqlInsertVenta = "INSERT INTO Ventas (FechaVenta, PrecioVenta, GastoDieta, Peso, PrecioKilo, PrecioTotal)
                   VALUES (?, ?, ?, ?, ?, ?)";
                $stmtInsertVenta = $conn->prepare($sqlInsertVenta);
                $stmtInsertVenta->bind_param("ssdddd", $fechaVenta, $precioVenta, $gastoDieta, $peso, $precioKilo, $precioTotal);

                if ($stmtInsertVenta->execute()) {
                    $sqlEliminarLote = "DELETE FROM Lotes WHERE Id_lote = ?";
                    $stmtEliminarLote = $conn->prepare($sqlEliminarLote);
                    $stmtEliminarLote->bind_param("i", $idLote);

                    if ($stmtEliminarLote->execute()) {
                        $conn->commit();

                        echo "<div class='container mt-5'><p>Venta registrada con éxito. Lote eliminado.</p></div>";
                        exit();
                    } else {
                        throw new Exception("Error al eliminar el lote: " . $stmtEliminarLote->error);
                    }
                } else {
                    throw new Exception("Error al registrar la venta: " . $stmtInsertVenta->error);
                }
            } else {
                throw new Exception("Error: No se encontró información para el Id_lote seleccionado.");
            }
        } else {
            throw new Exception("Error: No se encontró información para el Id_lote seleccionado.");
        }
    } else {
        throw new Exception("Error: No se encontró información para la Razonsocial seleccionada.");
    }

    $conn->close();
}

$conexion = new Conexion();
$conn = $conexion->conectar();

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sqlRazonSocial = "SELECT Razonsocial FROM Ganaderos";
$resultRazonSocial = $conn->query($sqlRazonSocial);
?>

<div class="container mt-5">
    <h2>Vender Lote</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="razonSocial" class="form-label">Razón Social</label>
            <select class="form-select" id="razonSocial" name="razonSocial" required>
                <?php
                while ($rowRazonSocial = $resultRazonSocial->fetch_assoc()) {
                    echo "<option value='" . $rowRazonSocial["Razonsocial"] . "'>" . $rowRazonSocial["Razonsocial"] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="fechaVenta" class="form-label">Fecha de Venta</label>
            <input type="date" class="form-control" id="fechaVenta" name="fechaVenta" required>
        </div>
        <div class="mb-3">
            <label for="precioKilo" class="form-label">Precio por Kilo</label>
            <input type="text" class="form-control" id="precioKilo" name="precioKilo" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Registrar Venta</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-bz3htznfnCJUiN+ouzWEhA0J6i/DOTt8Y5FzhKG6z13MiWBKRl0pMb7OoBydSMIk" crossorigin="anonymous"></script>
</body>
</html>
