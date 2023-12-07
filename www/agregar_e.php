<?php
include("db.php");


include("includes/header.php");
include("includes/footer.php");

$query = "SELECT * FROM Puestos";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conn));
}

$puestos = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $id_puesto = $_POST['id_puesto'];
    $salario = $_POST['salario'];
    $telefono = $_POST['telefono'];
    $rfc = $_POST['rfc'];
 
    $query = "INSERT INTO Empleados (Nombre, Paterno, Materno, Id_puesto, Salario, Telefono, RFC) 
              VALUES ('$nombre', '$paterno', '$materno', '$id_puesto', '$salario', '$telefono', '$rfc')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error al ejecutar la consulta: " . mysqli_error($conn));
    }

    $id_empleado = mysqli_insert_id($conn);

    if (!$result) {
        die("Error al ejecutar la consulta: " . mysqli_error($conn));
    }

    echo "Empleado agregado exitosamente.";
}
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Agregar empleado</h1>

            <form method="POST" action="agregar_e.php">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="paterno">Apellido Paterno</label>
                    <input type="text" class="form-control" id="paterno" name="paterno" required>
                </div>
                <div class="form-group">
                    <label for="materno">Apellido Materno</label>
                    <input type="text" class="form-control" id="materno" name="materno" required>
                </div>
                <div class="form-group">
                    <label for="id_puesto">Puesto</label>
                    <select class="form-control" id="id_puesto" name="id_puesto" required>
                        <?php foreach ($puestos as $puesto) { ?>
                            <option value="<?php echo $puesto['Id_puesto']; ?>"><?php echo $puesto['Puesto']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="salario">Salario</label>
                    <input type="text" class="form-control" id="salario" name="salario" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="rfc">RFC</label>
                    <input type="text" class="form-control" id="rfc" name="rfc" required>
                </div>  
                <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </div>
</div>
<button class="btn btn-primary" onclick="history.back()">Regresar</button>

<?php
include("includes/footer.php");
?>
