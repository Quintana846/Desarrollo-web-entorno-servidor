<?php

session_start();
require_once 'pintarCirculos.php';

if (!isset($_SESSION['Usuario'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['Usuario'];
$solucion = $_SESSION['solucion'];

if(!isset($_SESSION['jugada'])) {
    $_SESSION['jugada'] = [];
}

if (isset($_POST['color'])) {
    $_SESSION['jugada'][] = $_POST['color'];
}

if (count($_SESSION['jugada']) == 4) {
    if ($_SESSION['jugada'] === $solucion) {
        header("Location: acierto.php");
    } else {
        header("Location: fallo.php");
    }
    exit();
}

$circulo_a_pintar = ['black', 'black', 'black', 'black']; // Inicializa el juego con colores neutros

for ($i = 0; $i < count($_SESSION['jugada']); $i++) {
    $circulo_a_pintar[$i] = $_SESSION['jugada'][$i];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Simón</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h2><?php echo $usuario; ?>, pulsa los botones en el orden correspondiente</h2>
    <div><?php pintarCirculos($circulo_a_pintar); ?></div>
    <form action="jugar.php" method="post">
        <button type="submit" value="red" name="color" style="background-color:red; color:white; padding:10px; border:none; cursor:pointer;">ROJO</button>
        <button type="submit" value="blue" name="color" style="background-color:blue; color:white; padding:10px; border:none; cursor:pointer;">AZUL</button>
        <button type="submit" value="yellow" name="color" style="background-color:gold; padding:10px; border:none; cursor:pointer;">AMARILLO</button>
        <button type="submit" value="green" name="color" style="background-color:green; color:white; padding:10px; border:none; cursor:pointer;">VERDE</button>
    </form>
</body>
</html>
