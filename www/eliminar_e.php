<?php
include("db.php");
include("includes/header.php");

if(isset($_GET['id'])) {
  $id_empleado = $_GET['id'];

  // Llamar al stored procedure para eliminar el empleado con su dirección
  $query_eliminar_empleado = "CALL DeleteEmpleado($id_empleado)";
  mysqli_query($conn, $query_eliminar_empleado);

  
}

?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1>Lista de empleados</h1>

      <?php
      // Obtener los datos de la tabla empleados con el nombre del puesto
      $query = "SELECT e.Id_empleado, e.Nombre, e.Paterno, e.Materno, p.Puesto, e.Salario, e.Telefono, e.RFC 
                FROM Empleados e
                INNER JOIN Puestos p ON e.Id_puesto = p.Id_puesto";
      $result = mysqli_query($conn, $query);

      // Verificar si se encontraron registros
      if ($result && mysqli_num_rows($result) > 0) {
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>ID</th><th>Nombre</th><th>Paterno</th><th>Materno</th><th>Puesto</th><th>Salario</th><th>Teléfono</th><th>RFC</th><th>Acciones</th></tr></thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['Id_empleado'] . "</td>";
          echo "<td>" . $row['Nombre'] . "</td>";
          echo "<td>" . $row['Paterno'] . "</td>";
          echo "<td>" . $row['Materno'] . "</td>";
          echo "<td>" . $row['Puesto'] . "</td>";
          echo "<td>" . $row['Salario'] . "</td>";
          echo '<td><a href="eliminar_e.php?id=' . $row['Id_empleado'] . '" class="btn btn-danger">Eliminar</a></td>';
          echo "</tr>";
        }

        echo '</tbody>';
        echo "</table>";
      } else {
        echo "No se encontraron empleados.";
      }
      ?>
      <button class="btn btn-primary" onclick="history.back()">Regresar</button>

    </div>
  </div>
</div>

<?php
include("includes/footer.php");
?>
