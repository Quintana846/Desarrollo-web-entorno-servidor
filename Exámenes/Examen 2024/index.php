<?php

session_start();

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);

if (!isset($_POST['login'])) {
        $_SESSION['jugador'] = '';
        $_POST['jugador'] = '';
    echo <<<_END
    <form action="index.php" method="post">
        <h1>Iniciar Sesión</h1><br><br>
        Usuario:<input name="nombre" type="text" placeholder="Nombre de usuario"><br><br>
        Contraseña:<input name="contraseña" type="passwd" placeholder="Contraseña"><br>
        <button type="submit" name="login">Enviar</button>
    </form>
    _END;
} else if (isset($_POST['login'])) {

    $nombre = $_POST['nombre'];

    $sql = "SELECT nombre, login FROM jugador WHERE nombre = '$nombre'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['jugador'] = $nombre;
        $_SESSION['log'] = $row['login'];
        header("Location: inicio.php");
        exit();
    } else {
        echo <<<_END
    <form action="index.php" method="post">
        <label for="usuario" style="color: red">Credenciales incorrectas. Inténtelo de nuevo.</label><br><br>
        Usuario:<input name="nombre" type="text" placeholder="Nombre de usuario"><br><br>
        Contraseña:<input name="contraseña" type="passwd" placeholder="Contraseña"><br>

        <br><button type="submit" name="login">Enviar</button>
    </form>
    _END;
    }
}
$conn->close();
?>