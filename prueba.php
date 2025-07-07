<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Datos Personales - Juan Perez</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Datos Personales</h1>
    <?php
      // Conexión a la base de datos
      $conexion = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), "UNS");

      // Consulta solo para Juan Perez
      $cadenaSQL = "SELECT nombre, historial_crediticio, direccion, ciudad, provincia, pais, codigo_postal 
                    FROM cliente WHERE nombre = 'Juan Perez' LIMIT 1";

      $resultado = mysqli_query($conexion, $cadenaSQL);

      if ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<div class='card'>";
        echo "<div class='card-header bg-primary text-white'>Información de Juan Perez</div>";
        echo "<div class='card-body'>";
        echo "<p><strong>Nombre:</strong> " . htmlspecialchars($fila['nombre']) . "</p>";
        echo "<p><strong>Historial Crediticio:</strong> " . htmlspecialchars($fila['historial_crediticio']) . "</p>";
        echo "<p><strong>Dirección:</strong> " . htmlspecialchars($fila['direccion']) . "</p>";
        echo "<p><strong>Ciudad:</strong> " . htmlspecialchars($fila['ciudad']) . "</p>";
        echo "<p><strong>Provincia:</strong> " . htmlspecialchars($fila['provincia']) . "</p>";
        echo "<p><strong>País:</strong> " . htmlspecialchars($fila['pais']) . "</p>";
        echo "<p><strong>Código Postal:</strong> " . htmlspecialchars($fila['codigo_postal']) . "</p>";
        echo "</div></div>";
      } else {
        echo "<div class='alert alert-warning'>No se encontraron datos para Juan Perez.</div>";
      }

      mysqli_close($conexion);
    ?>
  </div>
</body>
</html>