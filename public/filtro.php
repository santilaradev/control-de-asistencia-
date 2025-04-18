<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Filtro | CBAV</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f6ff;
      padding: 30px;
      text-align: center;
    }

    h1 {
      color: #002855;
    }

    .filtro-form {
      max-width: 700px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: left;
    }

    label {
      font-weight: bold;
      color: #0047ab;
      display: block;
      margin-top: 15px;
    }

    select {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 20px;
      padding: 10px 25px;
      border: none;
      background: #0047ab;
      color: white;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
    }

    .resultados {
      margin-top: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #0047ab;
      color: white;
    }

    .acciones {
      margin-top: 20px;
    }

    .acciones button {
      background-color: #e60000;
      margin-right: 10px;
    }
  </style>
</head>
<body>

  <h1>Filtrar Registros | CBAV</h1>

  <form class="filtro-form" method="GET">
    <?php
    function crearSelect($conn, $campo) {
      $sql = "SELECT DISTINCT $campo FROM registros ORDER BY $campo ASC";
      $res = $conn->query($sql);
      echo "<label for='$campo'>" . ucfirst($campo) . "</label>";
      echo "<select name='$campo'>";
      echo "<option value=''>-- Todos --</option>";
      while ($row = $res->fetch_assoc()) {
        $selected = ($_GET[$campo] ?? '') == $row[$campo] ? 'selected' : '';
        echo "<option value='{$row[$campo]}' $selected>" . htmlspecialchars($row[$campo]) . "</option>";
      }
      echo "</select>";
    }

    $campos = ['conductor', 'vehiculo', 'color', 'matricula', 'muelle', 'ruta'];
    foreach ($campos as $campo) {
      crearSelect($conn, $campo);
    }
    ?>
    <button type="submit">Buscar</button>
  </form>

  <?php
  // Construir la consulta con filtros
  if ($_GET) {
    $filtros = [];
    foreach ($campos as $campo) {
      if (!empty($_GET[$campo])) {
        $valor = $conn->real_escape_string($_GET[$campo]);
        $filtros[] = "$campo = '$valor'";
      }
    }

    $condicion = count($filtros) > 0 ? "WHERE " . implode(" AND ", $filtros) : "";
    $sql = "SELECT * FROM registros $condicion";
    $res = $conn->query($sql);
    echo "<div class='resultados'>";
    echo "<h2>Resultados</h2>";

    if ($res->num_rows > 0) {
      echo "<div class='acciones'>";
      echo "<button onclick='window.print()'>Imprimir</button>";
      // Aquí se puede agregar exportar a PDF
      echo "</div>";

      echo "<table>";
      echo "<tr><th>Conductor</th><th>Vehículo</th><th>Color</th><th>Matrícula</th><th>Muelle</th><th>Ruta</th></tr>";
      while ($row = $res->fetch_assoc()) {
        echo "<tr>
                <td>{$row['conductor']}</td>
                <td>{$row['vehiculo']}</td>
                <td>{$row['color']}</td>
                <td>{$row['matricula']}</td>
                <td>{$row['muelle']}</td>
                <td>{$row['ruta']}</td>
              </tr>";
      }
      echo "</table>";
    } else {
      echo "<p>No se encontraron resultados con los filtros seleccionados.</p>";
    }
    echo "</div>";
  }
  ?>

</body>
</html>