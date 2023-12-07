<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Alimentar Lotes</title>
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
                <!-- Puedes agregar aquí más elementos del menú si es necesario -->
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Alimentar Lotes</h2>

    <form action="procesar_alimentacion.php" method="post">
        <div class="form-group">
            <label for="lote">Seleccione el Lote:</label>
            <select class="form-control" id="lote" name="lote">
                <?php
                $servername = "db";
                $username = "root";
                $password = "clave";
                $dbname = "Ganaderia";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consulta para obtener todos los datos de la tabla Lotes
                $sql = "SELECT Id_lote, Razonsocial, CantidadAnimales, PesoLote, PrecioKilo, FechaEntrada, PrecioTotal, Id_etapa FROM Lotes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['Id_lote']}'>
                                {$row['Razonsocial']} - Cantidad: {$row['CantidadAnimales']}, Peso: {$row['PesoLote']} kg, Precio Total: {$row['PrecioTotal']}
                              </option>";
                    }
                } else {
                    echo "<option value='' disabled>No hay lotes disponibles</option>";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="dieta">Seleccione la Dieta:</label>
            <select class="form-control" id="dieta" name="dieta">
                <option value="Crecimiento">Crecimiento</option>
                <option value="Engorda">Engorda</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="alimentarLotes">Alimentar Lotes</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
