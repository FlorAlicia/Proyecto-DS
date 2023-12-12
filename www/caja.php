<?php
include("includes/header.php");

$servername = "db";
$username = "root";
$password = "clave";
$dbname = "Ganaderia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sqlVentas = "SELECT SUM(Monto) AS TotalVentas FROM Caja WHERE TipoOperacion = 'Venta'";
$resultVentas = $conn->query($sqlVentas);
$rowVentas = $resultVentas->fetch_assoc();
$totalVentas = $rowVentas["TotalVentas"];

$sqlGastosDieta = "SELECT SUM(Monto) AS TotalGastos FROM Caja WHERE TipoOperacion = 'Gasto'";
$resultGastosDieta = $conn->query($sqlGastosDieta);
$rowGastosDieta = $resultGastosDieta->fetch_assoc();
$totalGastos = $rowGastosDieta["TotalGastos"];

$saldo = $totalVentas - $totalGastos;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ver Caja</title>
</head>
<body>

<div class="container mt-5">
    <h2>Ventas Realizadas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Fecha de Operación</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultVentas = $conn->query("SELECT * FROM Caja WHERE TipoOperacion = 'Venta'");
            while ($rowVenta = $resultVentas->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $rowVenta["FechaOperacion"] . "</td>";
                echo "<td>$" . number_format($rowVenta["Monto"], 2) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Gastos por Dieta</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Fecha de Operación</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resultGastosDieta = $conn->query("SELECT * FROM Caja WHERE TipoOperacion = 'Gasto'");
            while ($rowGastoDieta = $resultGastosDieta->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $rowGastoDieta["FechaOperacion"] . "</td>";
                echo "<td>$" . number_format($rowGastoDieta["Monto"], 2) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Total Ventas</h2>
    <p>$<?php echo number_format($totalVentas, 2); ?></p>

    <h2>Total Gastos</h2>
    <p>$<?php echo number_format($totalGastos, 2); ?></p>

    <h2>Saldo</h2>
    <p>$<?php echo number_format($saldo, 2); ?></p>
</div>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-bz3htznfnCJUiN+ouzWEhA0J6i/DOTt8Y5FzhKG6z13MiWBKRl0pMb7OoBydSMIk" crossorigin="anonymous"></script>
</body>
</html>
