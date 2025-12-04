<?php
session_start();

// Datos de conexión
$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

// Consulta para obtener estadísticas por usuario
$sql = "
    SELECT
        u.Codigo AS codigousu,
        u.Nombre AS nombre,
        SUM(j.acierto = 1) AS aciertos,
        SUM(j.acierto = 0) AS fallos,
        COUNT(j.codjugada) AS total
    FROM usuarios u
    LEFT JOIN jugadas j ON u.Codigo = j.codigousu
    GROUP BY u.Codigo, u.Nombre
    ORDER BY u.Codigo
";
$result = $conn->query($sql);

// Guardamos datos para la tabla y la gráfica
$usuarios = [];
$aciertos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row['nombre'];
        $aciertos[] = $row['aciertos'];
        $data[] = $row;
    }
} else {
    echo "No hay datos disponibles.";
}

$conn->close();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Estadísticas</title>
</head>
<body>
    <h1>Simón</h1><h2>Estadísticas de Jugadas</h2>

    <table border="1">
        <tr>
            <th>Código Usuario</th>
            <th>Nombre</th>
            <th>Número aciertos</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['codigousu'] ?></td>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['aciertos'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br><form action="inicio.php" method="post" style="display:inline;">
        <input type="submit" value="Volver a jugar">
    </form>
    <form action="login.php" method="post" style="display:inline;">
        <input type="submit" value="Cerrar sesión">
    </form>
</body>
</html>