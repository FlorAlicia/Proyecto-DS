<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>Tabla de Alimentos</title>
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
+      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h2>Tabla de Alimentos</h2>
  
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Unidad de Medida</th>
        <th>Precio Unitario</th>
        <th>Precio Total</th>
      </tr>
    </thead>
    <tbody>
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

        // Consulta para obtener todos los datos de la tabla Alimentos
        $sql = "SELECT * FROM Alimentos";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['nombre'] . "</td>";
          echo "<td>" . $row['cantidad'] . "</td>";
          echo "<td>" . $row['UnidadMedida'] . "</td>";
          echo "<td>" . $row['PrecioUni'] . "</td>";
          echo "<td>" . $row['PrecioTotal'] . "</td>";
          echo "</tr>";
        }

        // Cerrar la conexión
        $conn->close();
      ?>
    </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
