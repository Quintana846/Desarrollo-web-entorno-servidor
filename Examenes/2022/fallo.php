<?php
session_start();
require_once 'pinta-circulos.php';
require_once 'login.php';

// Verificamos si hay sesión activa
if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

$jugada = $_SESSION['jugada'];
$solucion = $_SESSION['solucion'];
$usuario = $_SESSION['nombre'];
$codigouser = $_SESSION['codigousu'];

// --- CORRECCIÓN PARA EL 1.5 PUNTOS ---
// Solo insertamos si NO hemos guardado esta partida todavía.

if (!isset($_SESSION['partida_guardada'])) {
    
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error fatal de conexión");

    // Acierto = 1
    $sql = "INSERT INTO jugadas (codigousu, acierto) VALUES ($codigouser, 1)";
    $conn->query($sql);
    $conn->close();

    // Marcamos la partida como guardada para que si refresca (F5) no sume puntos extra
    $_SESSION['partida_guardada'] = true;
}
// -------------------------------------

if(isset($_POST['accion'])){
    if($_POST['accion'] == "jugar"){
        // Limpiamos variables para la nueva partida
        unset($_SESSION['solucion']);
        unset($_SESSION['jugada']);
        unset($_SESSION['partida_guardada']); // Importante borrar esto para poder guardar la siguiente
        header("Location: inicio.php");
    } else {
        unset($_SESSION['solucion']);
        unset($_SESSION['jugada']);
        unset($_SESSION['partida_guardada']);
        header("Location: estadisticas.php");
    }
    exit();
}
?>

<form method="post">

    <h1><strong>SIMÓN</strong></h1>
    <?php
        if($usuario != ""){
            echo "<h2 style='font-weight:bold;'>$usuario lo sentimos, has fallado.</p> <br>";
        } 
        echo "<p>LA COMBINACIÓN ERA:</p><br>". pintarCirculos($solucion);
        echo "<p>SU COMBINACIÓN ELEGIDA FUE:</p><br>". pintarCirculos($jugada);
    ?>
        <button type="submit" name="accion" value="jugar">Volver a jugar</button>
        <button type="submit" name="accion" value="estadistica">Estadisticas</button>

</form>