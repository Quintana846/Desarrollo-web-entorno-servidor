<?php
session_start();

// Datos de conexión
$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

// Variables para controlar que mostrar
$mostrarTabla = false;
$filtroCirculos = 4;
$filtroColores = 4;
$data = [];

// Comprobamos si el usuario envio el formulario
if (isset($_POST['filtrar'])){
    $mostrarTabla = true;
    $filtroCirculos = $_POST['numCirculos'];
    $filtroColores = $_POST['numColores'];

    // Consulta para obtener estadísticas por usuario
    $sql = "
        SELECT
            j.codjugada,
            u.Codigo AS codigousu,
            u.Nombre AS nombre,
            j.acierto,
            j.numCirculos,
            j.numColores
        FROM jugadas j
        JOIN usuarios u ON u.Codigo = j.codigousu
        WHERE j.numCirculos = $filtroCirculos
            AND j.numColores = $filtroColores
        ORDER BY nombre
    ";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    }
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
    <h1>Simón</h1>
    <h2>Estadísticas de Jugadas</h2>

    <?php if (!$mostrarTabla): ?> <!--Sirve para alternar entre dos pantallas-->
        <form action="estadistica.php" method="post">
            <label>Número de Circulos:</label>
            <select name="numCirculos">
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select> <br>

            <label>Número de Colores:</label>
            <select name="numColores">
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>

            <br><br><input type="submit" name="filtrar" value="Ver Estadísticas">
        </form>

    <?php endif; ?>

    <?php if ($mostrarTabla): ?>
        <h3>Jugadas con <?=$filtroCirculos?> círculos y <?=$filtroColores?> colores</h3>

        <table border="1" cellpadding="5">
            <tr>
                <th>Código Jugada</th>
                <th>Código Usuario</th>
                <th>Nombre Usuario</th>
                <th>Acierto</th>

            </tr>

            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $row['codjugada'] ?></td>
                    <td><?= $row['codigousu'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= ($row['acierto'] == 1 ? "Acierto" : "Fallo") ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <table>
        <tr>
            <td>
                <form action="estadistica.php" method="post">
                    <br><input type="submit" value="Consultar otra dificultad">
                </form>
            </td>
            <td>
                <form action="login.php" method="post">
                    <br><input type="submit" value="Iniciar Sesion">
                </form>
            </td>
            <td>
                <form action="inicio.php" method="post">
                    <br><input type="submit" value="Volver a Jugar">
                </form>
            </td>
        </tr>
    </table>
</body> 
</html>