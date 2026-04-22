<?php
if(isset($_SESSION["nombre"])) {
    $_SESSION = array(); // Limpiar la sesión actual
    session_destroy(); // Destruir la sesión para limpiar los datos de la partida actual
}
session_start(); // Iniciar una nueva sesión para el proceso de autenticación
require_once('autenticacion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $clave = $_POST["clave"];

    if (autenticarUsuario($login, $clave)) {
        // Usuario autenticado, establecer la sesión y redirigir a la página principal
        header("Location: mostrarcartas.php");
        exit();
    } else {
        // Usuario no autenticado, mostrar mensaje de error
        $error = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>

    <h2>Iniciar sesión</h2>

    <?php if(isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="login">Usuario:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required><br>

        <input type="submit" value="Entrar">
    </form>

</body>
</html>
