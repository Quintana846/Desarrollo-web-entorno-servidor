<?php

session_start();
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";

if (isset($_POST['dni'])) {

    $stmtA = $conn->prepare("SELECT * FROM alumno WHERE dniA = ?");
    $stmtA->bind_param("s", $_POST['dni']);
    $stmtA->execute();
    $resultA = $stmtA->get_result();
    $stmtA->close();

    $stmtP = $conn->prepare("SELECT * FROM profesor WHERE dniP = ?");
    $stmtP->bind_param("s", $_POST['dni']);
    $stmtP->execute();
    $resultP = $stmtP->get_result();
    $stmtP->close();

    if($resultA->num_rows > 0) {
        $rowA = $resultA->fetch_assoc();
        $_SESSION['dni'] = $_POST['dni'];
        $_SESSION['nombre'] = $rowA['nombreA'];
        header("Location: Ejercicio3.php");
        exit();
    } elseif ($resultP->num_rows > 0) {
        $rowP = $resultP->fetch_assoc();
        $_SESSION['dni'] = $_POST['dni'];
        $_SESSION['nombre'] = $rowP['nombreP'];
        header("Location: Ejercicio2.php");
        exit();
    } else {
        $error = "DNI no encontrado. Por favor, inténtalo de nuevo.";
    }

}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="Ejercicio1.php" method="post">
    <h2>DNI</h2>
    <p style="color:red;"><?php echo $error; ?></p>
    <input type="text" name="dni" maxlength="4" required style="width: 200px; border: 3px solid blue; border-radius: 6px; padding: 8px;" > <br><br>
    <button type="submit">Entrar</button>
    </form>

</body>
</html>