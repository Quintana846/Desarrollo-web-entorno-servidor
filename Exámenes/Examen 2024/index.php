<?php

session_start();

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);; 

if (!isset($_POST['login'])) {
        $_SESSION['jugador'] = '';
        $_POST['jugador'] = '';
    echo <<<_END
    <form action="index.php" method="post">
        Usuario:<input name="nombre" type="text" placeholder="Nombre de usuario"><br><br>
        Contraseña:<input name="contraseña" type="passwd" placeholder="Contraseña"><br>
        <button type="submit" name="login">Enviar</button>
    </form>
    _END;
} else if (isset($_POST['login'])) {

    $nombre = $_POST['nombre'];

    $sql = "SELECT name FROM jugador WHERE name LIKE $nombre";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['jugador'] = $nombre;
        header("Location: Ejercicio3.php");
        exit();
    else {
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
}
$conn->close();
?>