<?php
session_start();
require_once 'login.php';

if (!isset($_SESSION['Usuario'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['Usuario'];
$codusu = $_SESSION['Codigo'];

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
</style>
<body>
    <h1>SIMÓN</h1>
    <h2><?php echo $usuario; ?>, los resultados son:</h2>
    <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
        <thead style="background-color: lightgray; border: 1px solid black;">
        <tr>
            <th>Codigo usuario</th>
            <th>Nombre</th>
            <th>Número aciertos</th>
            <th>Gráfica</th>
        </tr>
        </thead>
        <tbody style="border: 1px solid black;">
            <?php
            $stmt = ("SELECT u.Codigo, u.Nombre, sum(j.acierto) AS acierto 
            FROM usuarios u LEFT JOIN jugadas j 
            ON u.Codigo = ? GROUP BY u.Codigo");
            $stmt = $conn->prepare($stmt);
            $stmt->bind_param("i", $codusu);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Codigo'] . "</td>";
                    echo "<td>" . $row['Nombre'] . "</td>";
                    echo "<td>" . $row['acierto'] . "</td>";
                    echo "<td><div style='width: " . ($row['acierto'] * 20) . "px; height: 20px; background-color: blue; border: 1px solid black;'></div></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay datos disponibles</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>