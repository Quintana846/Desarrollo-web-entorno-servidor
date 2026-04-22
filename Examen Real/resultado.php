<?php
session_start();
require_once('conexion.php');

if (!isset($_SESSION["nombre"]) || !isset($_SESSION["jugadas"])) {
    header("Location: entrada.php");
    exit();
}

// CORTAFUEGOS: Si le da al botón de reiniciar (que es POST), purga todo y se pira
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reiniciar'])) {
    unset($_SESSION["jugadas"], $_SESSION["cartas"], $_SESSION["carta_actual"]);
    unset($_SESSION["pos1"], $_SESSION["pos2"], $_SESSION["pareja_encontrada"]);
    unset($_SESSION['msg_frase'], $_SESSION['msg_acierto'], $_SESSION['pendiente_update']);
    
    header("Location: mostrarcartas.php");
    exit();
}

// --- LA MAGIA DEL UPDATE (A TU MANERA) ---
// En vez de mirar si es POST, miramos si traemos el ticket de la otra página
if (isset($_SESSION['pendiente_update'])) {
    $nombre = $_SESSION["nombre"];
    $pos1 = $_SESSION["pos1"];
    $pos2 = $_SESSION["pos2"];
    $intentos = $_SESSION["jugadas"];
    $pareja_encontrada = $_SESSION["pareja_encontrada"];

    $acierto = $pareja_encontrada ? 1 : -1;

    // ACTUALIZAMOS LA BD
    $stmt = $conn->prepare("UPDATE jugador SET puntos = puntos + ?, extra = extra + ? WHERE nombre = ?");
    $stmt->bind_param("iis", $acierto, $intentos, $nombre);
    $stmt->execute();
    $stmt->close();

    // Guardamos los mensajes en sesión por si pulsa F5 luego
    $_SESSION['msg_frase'] = $pareja_encontrada ? "Acierto posiciones " . ($pos1 + 1) . " y " . ($pos2 + 1) . " despues de $intentos intentos." : "Fallo posiciones " . ($pos1 + 1) . " y " . ($pos2 + 1) . " despues de $intentos intentos.";
    $_SESSION['msg_acierto'] = $acierto;

    // QUEMAMOS EL TICKET. Importantísimo bro, esto evita que el F5 reviente la BD
    unset($_SESSION['pendiente_update']);
}

// --- PREPARAMOS LO QUE SE VE EN PANTALLA ---
$nombre = $_SESSION["nombre"];
$intentos = $_SESSION["jugadas"];
$frase = $_SESSION['msg_frase'] ?? "Aún no hay resultados.";
$acierto = $_SESSION['msg_acierto'] ?? 0;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <style>
        table { border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        .boton-reiniciar { margin-top: 20px; padding: 10px 20px; background-color: #ff4444; color: white; font-weight: bold; border: none; cursor: pointer; }
        .boton-reiniciar:hover { background-color: #cc0000; }
    </style>
</head>
<body>
    <h2>Bienvenid@, <?php echo htmlspecialchars($nombre); ?></h2>
    <p><b><?php echo $frase; ?></b></p>
    <p>Se le <?php echo $acierto === 1 ? "sumará" : "restará"; ?> 1 punto así como <?php echo htmlspecialchars($intentos) . " intentos."; ?></p>
    
    <h2>Puntos por jugador</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Puntos</th>
                <th>Extra</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->prepare("SELECT nombre, puntos, extra FROM jugador");
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["nombre"]) . "</td>
                        <td>" . htmlspecialchars($row["puntos"]) . "</td>
                        <td>" . htmlspecialchars($row["extra"]) . "</td>
                      </tr>";
            }
            $stmt->close();
            $conn->close();
            ?>
        </tbody>
    </table>

    <form action="" method="post">
        <button type="submit" name="reiniciar" class="boton-reiniciar">VOLVER A JUGAR</button>
    </form>
</body>
</html>