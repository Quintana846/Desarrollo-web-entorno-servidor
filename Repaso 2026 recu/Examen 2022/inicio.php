<?php

session_start();
require_once 'pintarCirculos.php';

if (!isset($_SESSION['Usuario'])) {

    header("Location: index.php");
    exit();

} else {

unset($_SESSION['jugada']); // Limpia la jugada para el próximo juego
unset($_SESSION['ultimaJugada']); // Limpia la última jugada para el próximo juego
$usuario = $_SESSION['Usuario'];

$colores = ['red', 'green', 'blue', 'yellow'];
$solucion = [];

for ($i=0; $i < 4 ; $i++) { 
    $solucion[$i] = $colores[array_rand($colores)];
}

$_SESSION['solucion'] = $solucion; // Guarda la solución en la sesión para usarla en jugar.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Simón</title>
</head>
<body>
    <h1>SIMÓN</h1> <br>
    <h2>Hola <?php echo $usuario; ?>, memoriza la combinación</h2><br>
    <div> <?php pintarCirculos($solucion); ?> </div>
    <form action="jugar.php" method="post">
    <button type="submit">Vamos a jugar</button>
    </form>
</body>
</html>

<?php
}