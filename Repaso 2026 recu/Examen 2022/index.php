<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";

if(isset($_POST['Usuario']) && isset($_POST['Clave'])) {

session_start();

session_unset();

$usuario = $_POST['Usuario'];
$contrasenia = $_POST['Clave'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE Nombre = ? AND Clave = ?");
$stmt->bind_param("ss", $usuario, $contrasenia);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc();
    $_SESSION['Usuario'] = $fila['Nombre'];
    $_SESSION['Codigo'] = $fila['Codigo'];
    header("Location: inicio.php");
    exit();
} else {
    $error = "Error: Usuario o contraseña incorrectos.";
}

$stmt->close();
$conn->close();
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Simón - Login</title>
</head>
<body>
    <form action="index.php" method="post">
        <h1>VAMOS A JUGAR AL SIMON!!!!</h1><br>
        
        <?php 
            if ($error != "") {
                echo "<p style='color:red; font-weight:bold;'>$error</p>";
            }
        ?>
        
        Usuario: <input type="text" name="Usuario" required><br><br>
        Clave: <input type="password" name="Clave" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>