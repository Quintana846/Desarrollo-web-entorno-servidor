<?php
// Corrección: Eliminamos la comprobación de get_magic_quotes_gpc()
function sanitizeString($var) {
    // Si quisieras mantener stripslashes por seguridad extra (aunque no por magic_quotes):
    // $var = stripslashes($var); 
    
    $var = strip_tags($var);       // Elimina etiquetas HTML/PHP
    $var = htmlentities($var);     // Convierte caracteres especiales
    return $var;
}

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Error fatal de conexión");

// Variable para controlar si mostramos el error
$error = "";

// Verificamos si enviaron datos
if (isset($_POST['usuario']) && isset($_POST['contrasenia'])) {

    session_start();

    // Ahora la función ya no dará error
    $usuario_limpio = sanitizeString($_POST['usuario']);
    $clave_limpia   = sanitizeString($_POST['contrasenia']);

    $query = "SELECT * FROM usuarios WHERE Nombre=?";

    $stmt = $conn->prepare($query);

    $stmt->bind_param('s', $usuario_limpio);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();
        
        // Verificamos contraseña (recuerda que en el examen puede ser texto plano o hash)
        // Si en tu BD las claves son texto plano (ej: '1234'), usa: if ($clave_limpia == $fila['Clave'])
        if ($clave_limpia == $fila['Clave']) {
            $_SESSION['nombre'] = $fila['Nombre'];
            $_SESSION['codigousu'] = $fila['Codigo'];
            header("Location: inicio.php");
            exit(); 
        } else {
            $error = "Usuario o contraseña inválidos.";
        }
    } else {
        $error = "Usuario o contraseña inválidos.";
    }

    $stmt->close();
}
$conn->close();
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
        
        Usuario: <input type="text" name="usuario" required><br><br>
        Clave: <input type="password" name="contrasenia" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>