<?php

session_start();
require_once 'login.php';

if (!isset($_SESSION['dni']) || !isset($_SESSION['nombre'])) {
    header("Location: Ejercicio1.php");
    exit();
}

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nombre = $_SESSION['nombre'];
$dni = $_SESSION['dni'];
$error = "";

if(isset($_POST['codcurso'])){

    $codigoCurso = $_POST['codcurso'];

    $consulta = "SELECT * FROM matricula WHERE codcurso = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param('s', $codigoCurso);
    $stmt->execute();
    $result = $stmt->get_result(); 

    if($result->num_rows > 0){
        // El curso existe, procedemos a matricular
        $pruebaA = $_POST['prueba_a'];
        $pruebaB = $_POST['prueba_b'];
        $tipo = $_POST['tipo'];
        $inscripcion = $_POST['inscripcion'];
        $stmtInsert = $conn->prepare("INSERT INTO matricula VALUES (?, ?, ?, ?, ?, ?)");
        $stmtInsert->bind_param('ssddss', $dni, $codigoCurso, $pruebaA, $pruebaB, $tipo, $inscripcion);
        $stmtInsert->execute();
        $stmtInsert->close();
        $error = "Matriculación exitosa.";

    } else {
        $error = "El curso con código $codigoCurso no existe.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricular</title>
</head>
<style>
    label {
        display: block;
        margin-bottom: 10px;
    }
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        text-align: left;
    }
</style>
<body>
    <p>ALUMNO: <?php echo $_SESSION['dni']; ?></p>
    <p>NOMBRE: <?php echo strtoupper($_SESSION['nombre']); ?></p>
    <p style="color:green;"><?php echo $error; ?></p>
    <form action="Ejercicio3.php" method="post">
    <label for="dni">DNI    <input type="text" name="dni" value="<?php echo $dni; ?>" readonly></label>
    <br><br>
    <label for="">COD CURSO   <input type="text" name="codcurso" required></label>
    <br><br>
    <label for="">PRUEBA A   <input type="number" name="prueba_a" required></label>
    <br><br>
    <label for="">PRUEBA B   <input type="number" name="prueba_b" required></label>
    <br><br>
    <label for="">TIPO    <input type="text" placeholder="Oficial/Libre" name="tipo" required></label>
    <br><br>
    <label for="">INSCRIPCIÓN   <input type="date" name="inscripcion" required></label>
    <br><br>
    <button type="submit">GUARDAR</button>
    </form>
</body>
</html>