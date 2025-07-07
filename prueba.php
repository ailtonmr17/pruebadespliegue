<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Datos Personales - Juan Perez</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Datos Personales de Juan Perez</h1>
    <?php
      // Conexión a la base de datos 'prueba'
      $conexion = mysqli_connect(
        getenv('34.71.232.220'),
        getenv('root'),
        getenv(''),
        "pruebas"
      );

      if (!$conexion) {
        echo "<div class='alert alert-danger'>Error de conexión: " . mysqli_connect_error() . "</div>";
        exit();
      }

      // Consulta JOIN para Juan Perez
      $cadenaSQL = "
        SELECT 
          dp.nombre,
          dp.apellido,
          dp.fecha_nac,
          dp.numero,
          dp.direccion,
          p.origen,
          p.ocupacion
        FROM detalle_persona dp
        JOIN persona p ON dp.id_persona = p.id_persona
        WHERE dp.nombre = 'Juan' AND dp.apellido = 'Perez'
        LIMIT 1
      ";

      $resultado = mysqli_query($conexion, $cadenaSQL);

      if ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<div class='card'>";
        echo "<div class='card-header bg-primary text-white'>Información de Juan Perez</div>";
        echo "<div class='card-body'>";
        echo "<p><strong>Nombre:</strong> " . htmlspecialchars($fila['nombre']) . " " . htmlspecialchars($fila['apellido']) . "</p>";
        echo "<p><strong>Fecha de Nacimiento:</strong> " . htmlspecialchars($fila['fecha_nac']) . "</p>";
        echo "<p><strong>Número:</strong> " . htmlspecialchars($fila['numero']) . "</p>";
        echo "<p><strong>Dirección:</strong> " . htmlspecialchars($fila['direccion']) . "</p>";
        echo "<p><strong>Origen:</strong> " . htmlspecialchars($fila['origen']) . "</p>";
        echo "<p><strong>Ocupación:</strong> " . htmlspecialchars($fila['ocupacion']) . "</p>";
        echo "</div></div>";
      } else {
        echo "<div class='alert alert-warning'>No se encontraron datos para Juan Perez.</div>";
      }

      mysqli_close($conexion);
    ?>
  </div>
</body>
</html>
