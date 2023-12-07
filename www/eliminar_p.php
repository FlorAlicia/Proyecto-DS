<?php
include("db.php");
include("includes/header.php");

// Verificar si se ha enviado el formulario de eliminación
if(isset($_POST['eliminar'])) {
    $id_puesto = $_POST['id_puesto'];
    
    // Eliminar el puesto de la tabla
    $eliminar_query = "DELETE FROM Puestos WHERE Id_puesto = $id_puesto";
    $eliminar_result = mysqli_query($conn, $eliminar_query);
    
    if($eliminar_result) {
        echo "<div class='alert alert-success'>El puesto ha sido eliminado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar el puesto: " . mysqli_error($conn) . "</div>";
    }
}

// Obtener la lista de puestos
$query = "SELECT * FROM Puestos";
$result = mysqli_query($conn, $query);

// Verificar si se encontraron registros
if(mysqli_num_rows($result) > 0) {
    echo "<h1>Puestos</h1>";
    echo "<table class='table table-striped'>";
    echo "<thead class='thead-dark'>";
    echo "<tr><th>ID</th><th>Puesto</th><th>Acciones</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while($row = mysqli_fetch_assoc($result)) {
        $id_puesto = $row['Id_puesto'];
        $puesto = $row['Puesto'];
        
        echo "<tr>";
        echo "<td>$id_puesto</td>";
        echo "<td>$puesto</td>";
        echo "<td>
                <form method='POST' onsubmit='return confirm(\"¿Estás seguro de que deseas eliminar este puesto?\")'>
                    <input type='hidden' name='id_puesto' value='$id_puesto'>
                    <button type='submit' class='btn btn-danger' name='eliminar'>Eliminar</button>
                </form>
              </td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<div class='alert alert-info'>No se encontraron puestos.</div>";
}

mysqli_free_result($result);
?>

<div class="text-center">
    <button class="btn btn-primary" onclick="history.back()">Regresar</button>
</div>

<?php include("includes/footer.php") ?>
