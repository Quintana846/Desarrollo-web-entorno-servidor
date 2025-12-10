<?php
session_start();
require_once 'pinta-circulos.php'; // Asegúrate de que el nombre del archivo es correcto

// 1. Seguridad: Si no hay login o solución generada, volver al inicio
if (!isset($_SESSION['nombre']) || !isset($_SESSION['solucion'])) {
    header("Location: index.php");
    exit();
}

$nombre = $_SESSION['nombre'];
$solucion = $_SESSION['solucion']; // La combinación correcta (array de 4 colores)

// 2. Inicializar jugada del usuario si no existe
if (!isset($_SESSION['jugada'])) {
    $_SESSION['jugada'] = [];
}

// 3. Procesar pulsación (Si el usuario ha pulsado un botón)
if (isset($_POST['color'])) {
    // AÑADIR el color a la jugada sin comprobar si es correcto todavía
    $_SESSION['jugada'][] = $_POST['color'];
}

// 4. Lógica de Finalización: Solo comprobamos cuando llevamos 4 pulsaciones
if (count($_SESSION['jugada']) == 4) {
    
    // Comparamos el array completo del usuario con la solución
    if ($_SESSION['jugada'] === $solucion) {
        // Si son idénticos -> Acierto
        header("Location: acierto.php");
    } else {
        // Si hay cualquier diferencia -> Fallo
        header("Location: fallo.php");
    }
    exit(); // Importante detener el script tras la redirección
}

// 5. Lógica Visual: Preparar los círculos para pintar
// Inicializamos 4 negros
$colores_a_pintar = ["black", "black", "black", "black"];

// Rellenamos las posiciones que el usuario ya ha pulsado
// Si lleva 1 pulsación, el índice 0 será su color. Si lleva 2, el 0 y el 1.

for ($i = 0; $i < count($_SESSION['jugada']); $i++) {
    $colores_a_pintar[$i] = $_SESSION['jugada'][$i];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Jugar - Simón</title>
</head>
<body>
    <h1><strong>SIMÓN</strong></h1>
    
    <h2 style='font-weight:bold;'>
        <?php echo $nombre; ?>, pulsa los botones en el orden correspondiente
    </h2>
    <br>
    
    <?php echo pintarCirculos($colores_a_pintar); ?>
    
    <br><br>
    
    <form action="jugar.php" method="post">
        <button type="submit" value="red" name="color" style="background-color:red; color:white; padding:10px; border:none; cursor:pointer;">ROJO</button>
        <button type="submit" value="blue" name="color" style="background-color:blue; color:white; padding:10px; border:none; cursor:pointer;">AZUL</button>
        <button type="submit" value="yellow" name="color" style="background-color:gold; padding:10px; border:none; cursor:pointer;">AMARILLO</button>
        <button type="submit" value="green" name="color" style="background-color:green; color:white; padding:10px; border:none; cursor:pointer;">VERDE</button>
    </form>
</body>
</html>