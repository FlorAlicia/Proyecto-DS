<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Tabla de Vacunas</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="inicio.php">Ganadería Gómez</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Tabla de Vacunas</h2>

    <?php
    $servername = "db";
    $username = "root";
    $password = "clave";
    $dbname = "Ganaderia";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT id_vacuna, nombre, cantidad, PrecioUni FROM Vacunas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table'>
                <thead>
                    <tr>
                        <th>ID Vacuna</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_vacuna']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['cantidad']}</td>
                    <td>{$row['PrecioUni']}</td>
                </tr>";
        }

        echo "</tbody>
            </table>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No hay vacunas disponibles.</div>";
    }

    $conn->close();
    ?>

    <a href="inicio.php" class="btn btn-primary">Volver a Inicio</a>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
