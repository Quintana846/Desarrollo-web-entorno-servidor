<?php

session_start();
require_once 'pintarCirculos.php';
require_once 'login.php';

if (!isset($_SESSION['Usuario'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['Usuario'];
$solucion = $_SESSION['solucion'];
$codusu = $_SESSION['Codigo'];


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['jugada'])) {
    $_SESSION['ultimaJugada'] = $_SESSION['jugada'];   // ← guardo copia para pintar

    $stmt = $conn->prepare("INSERT INTO jugadas (codigousu, acierto) VALUES (?, 0)");
    $stmt->bind_param("i", $codusu);
    $stmt->execute();
    $stmt->close();

    unset($_SESSION['jugada']);   // ← borro la activa (para que no reinserte)
}

$jugada = $_SESSION['ultimaJugada'] ?? [];   // para pintar




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fallo</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h2><?php echo $usuario; ?> lo sentimos has fallado.</h2> <br>
    <p>LA COMBINACIÓN ERA:</p> <br>
    <div><?php pintarCirculos($solucion); ?></div>
    <p>SU COMBINACIÓN ELEGIDA FUE:</p> <br>
    <div><?php pintarCirculos($jugada); ?></div>
    <p>Se ha guardado en la base de datos</p>
    <a href="inicio.php">Volver a jugar</a>
    <a href="estadisticas.php">Ver estadísticas</a>
</body>
</html>
