<?php
session_start();
require_once 'login.php';

if (!isset($_SESSION["nombre"])) {
    header("Location: entrada.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reiniciar'])) {
    unset($_SESSION["jugadas"], $_SESSION["numtirada"]);
    unset($_SESSION["girar"], $_SESSION["resultado"], $_SESSION["fruta"]);
    unset($_SESSION["puntos"], $_SESSION["frase"], $_SESSION["combinacion"]);  
    
    header("Location: jugar.php");
    exit();
}

if(!isset($_SESSION["frase"])){
    $_SESSION["frase"] = $_SESSION["resultado"] ? "Buena suerte. Has ganado " . $_SESSION["puntos"] . " punto/s." : "Mala suerte. Has perdido " . $_SESSION["puntos"] . " punto/s.";
}
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
    <h2>Bienvenid@, <?php echo htmlspecialchars($_SESSION["nombre"]); ?></h2>
    <p><b><?php echo $_SESSION["frase"]; ?></b></p>
    <p>Se han acumulado <?php echo $_SESSION["numtirada"];  ?> tiradas a su historial</p>
    
    <h2>Puntos por jugador</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Puntos</th>
                <th>Extra (Tiradas)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->prepare("SELECT nombre, puntos, extra FROM jugadores");
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
        <form action="resultado.php" method="post">
        <button type="submit" name="reiniciar" class="boton-reiniciar">VOLVER A JUGAR</button>
    </form>
</body>
</html>