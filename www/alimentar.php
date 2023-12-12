<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Alimentar y Vacunar Lotes</title>
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
    <h2>Alimentar Lotes</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["alimentarLotes"])) {
        $loteId = $_POST["lote"];
        $dieta = $_POST["dieta"];

        $servername = "db";
        $username = "root";
        $password = "clave";
        $dbname = "Ganaderia";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $procedureName = ($dieta == "Crecimiento") ? "GastoDieta1" : (($dieta == "Engorda") ? "GastoDieta2" : "");

        if (!empty($procedureName)) {
            $sql = "CALL $procedureName()";

            $result = $conn->query($sql);

            if ($result) {
                echo "<div class='alert alert-success' role='alert'>Procedimiento almacenado ejecutado con éxito.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al ejecutar el procedimiento almacenado: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Dieta no válida.</div>";
        }

        $conn->close();
    }
    ?>

    <form action="alimentar.php" method="post">
        <div class="form-group">
            <label for="lote">Seleccione el Lote:</label>
            <select class="form-control" id="lote" name="lote">
                <?php
                $servername = "db";
                $username = "root";
                $password = "clave";
                $dbname = "Ganaderia";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT Id_lote, Razonsocial, CantidadAnimales, PesoLote, PrecioKilo, FechaEntrada, PrecioTotal FROM Lotes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['Id_lote']}'>
                                {$row['Razonsocial']} - Cantidad: {$row['CantidadAnimales']}
                              </option>";
                    }
                } else {
                    echo "<option value='' disabled>No hay lotes disponibles</option>";
                }

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

<div class="container mt-4">
    <h2>Vacunar Lotes</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vacunarLote"])) {
        $loteIdVacuna = $_POST["lote"];
        $vacunaId = $_POST["vacuna"];

        $servername = "db";
        $username = "root";
        $password = "clave";
        $dbname = "Ganaderia";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $getCantidadSql = "SELECT CantidadAnimales FROM Lotes WHERE Id_lote = $loteIdVacuna";
        $resultCantidad = $conn->query($getCantidadSql);

        if ($resultCantidad->num_rows > 0) {
            $rowCantidad = $resultCantidad->fetch_assoc();
            $cantidadAnimales = $rowCantidad['CantidadAnimales'];

            $updateSql = "UPDATE Vacunas SET cantidad = cantidad - $cantidadAnimales WHERE id_vacuna = $vacunaId";

            if ($conn->query($updateSql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'>Vacunación realizada con éxito.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al vacunar el lote: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al obtener la cantidad de animales del lote.</div>";
        }

        $conn->close();
    }
    ?>

    <form action="alimentar.php" method="post">
        <div class="form-group">
            <label for="lote">Seleccione el Lote:</label>
            <select class="form-control" id="lote" name="lote">
                <?php
                $servername = "db";
                $username = "root";
                $password = "clave";
                $dbname = "Ganaderia";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT Id_lote, Razonsocial, CantidadAnimales, PesoLote, PrecioKilo, FechaEntrada, PrecioTotal FROM Lotes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['Id_lote']}'>
                                {$row['Razonsocial']} - Cantidad: {$row['CantidadAnimales']}
                              </option>";
                    }
                } else {
                    echo "<option value='' disabled>No hay lotes disponibles</option>";
                }

                $conn->close();
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="vacuna">Seleccione la Vacuna:</label>
            <select class="form-control" id="vacuna" name="vacuna">
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
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id_vacuna']}'>
                                {$row['nombre']} - Cantidad: {$row['cantidad']}
                              </option>";
                    }
                } else {
                    echo "<option value='' disabled>No hay vacunas disponibles</option>";
                }

                $conn->close();
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="vacunarLote">Vacunar Lote</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
