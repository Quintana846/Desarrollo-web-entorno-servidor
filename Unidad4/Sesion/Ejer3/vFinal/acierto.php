<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
</head>
<body>
    <h1>Simon</h1>
    <h3>Enhorabuena, has ganado</h3>
    <?php
        session_start();
        require_once 'pintarCirculos.php';

        // Datos de la Sesion
        $hn = 'localhost';
        $db = 'bdsimon';
        $un = 'root';
        $pw = '';   

        // Conectar la BBDD
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error){
            die("Fatal Error: " .$conn->connect_error);
        }
        // Recuperar ID del usuario de la sesion
        $codusu = $_SESSION['id'];

        // Recuperar config sesion
        $nCirculos = $_SESSION['numCirculos'];
        $nColores = $_SESSION['numColores'];
        
        $sql = "INSERT INTO jugadas (codigousu, acierto, numCirculos, numColores) VALUES ('$codusu',1, '$nCirculos', '$nColores')";
        $conn->query($sql);
        $conn->close();

        $solucion = $_SESSION["solucion"];
        pintarCirculos($solucion);

    ?>
    <form action="inicio.php" method="post"><input type="submit" value="Volver a jugar">
    </form>

    <br><form action="estadistica.php" method="post"><input type="submit" value="Ver estadisticas">
    </form>
</body>
</html>