<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
</head>
<body>
    <h1>Agenda De Contactos</h1>
    <form action="index.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre">

        <br><br>
        <label for="calve">Clave: </label>
        <input type="password" id="clave" name="clave">

        <br><br>
        <input type="submit" name="boton" value="Entrar">
    </form>

    <?php
        session_start();
        if(isset($_POST["boton"])){
            $nombre = $_POST["nombre"] ?? '';
            $clave = $_POST["clave"] ?? '';

            // Datos de conexión
            $hn = 'localhost';
            $db = 'agenda';
            $un = 'root';
            $pw = '';

            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

            $sql = "SELECT * FROM usuarios WHERE nombre = ? AND clave = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $nombre, $clave);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if($resultado->num_rows == 1){
                $_SESSION["nombre"] = $nombre;
                header("Location: inicio.php");
                exit;
            }
        }        
    ?>
</body>
</html>