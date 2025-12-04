<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
</head>
<body>
    <h1>Simón</h1>
    <?php
        session_start();
        require_once 'pintarCirculos.php';

        // Datos de la Sesion
        $hn = 'localhost';
        $db = 'bdsimon';
        $un = 'root';
        $pw = ''; 

        // Conectar a la BBDD
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) {
            die("Fatal Error: " . $conn->connect_error);
        }

        // Recuperar el ID del usuario de la sesión
        $codusu = $_SESSION['id'];

        // Recuperar config sesion
        $nCirculos = $_SESSION['numCirculos'];
        $nColores = $_SESSION['numColores'];
        

        $sql = "INSERT INTO jugadas (codigousu, acierto, numCirculos, numColores) VALUES ('$codusu', 0, '$nCirculos', '$nColores')"; // 0 para fallo
        $conn->query($sql);
        $conn->close();

        $solucion = $_SESSION["solucion"];
        $intentos = $_SESSION["intentos"] ?? [];
    ?>

    <p>La secuencia correcta es:</p>
    <?php 
        pintarCirculos($solucion);
    ?>

    <p>Tu secuencia fue:</p>
    <?php 
        pintarCirculos($intentos);
    ?>

    <form action="inicio.php" method="post"><input type="submit" value="Volver a jugar">
    </form>

    <form action="estadistica.php" method="post"><input type="submit" value="Ver estadisticas">
    </form>
    
</body>
</html>