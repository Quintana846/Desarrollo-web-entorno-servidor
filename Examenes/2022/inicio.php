<?php
session_start();
require_once 'pinta-circulos.php'; // Asegúrate que el nombre coincide con el archivo

if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['nombre'];

// CORRECCIÓN: Solo generamos nueva combinación si no existe 'solucion'
// Esto evita que al recargar la página cambie el patrón a memorizar.
if (!isset($_SESSION['solucion'])) {
    $colors = ["green", "red", "blue", "yellow"];
    $solucion = [];
    for ($i = 0; $i < 4; $i++) {
        $solucion[$i] = $colors[rand(0, 3)];
    }
    $_SESSION['solucion'] = $solucion;
}

$solucion = $_SESSION['solucion'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Simón - Inicio</title>
</head>
<body>
    <h1><strong>SIMÓN</strong></h1>
    <h2 style='font-weight:bold;'>Hola <?php echo $usuario; ?>, memoriza la combinación</h2>
    <br>
    
    <?php echo pintarCirculos($solucion); ?>
    
    <br>
    <form action="jugar.php" method="post">
        <button type="submit">JUGAR</button>
    </form>
</body>
</html>