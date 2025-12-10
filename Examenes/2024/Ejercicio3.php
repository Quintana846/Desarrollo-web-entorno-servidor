<?php
session_start();

// LOGOUT
if(isset($_POST['cerrar'])){
    session_destroy(); // Mejor destruir sesión antes de redirigir
    header("Location: Ejercicio1.php");
    exit();
}

// SEGURIDAD DE SESIÓN
if(!isset($_SESSION['dni']) || $_SESSION['rol'] != "alumno"){
    header("Location: ejercicio1.php");
    exit();
} 

require_once 'login.php';

$error = "";
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Error fatal de conexión");

$nombre = $_SESSION['usuario']; 
$dni = $_SESSION['dni'];

if(isset($_POST['codcurso'])){

    $codigoCurso = $_POST['codcurso'];

    // 1. COMPROBAR SI EL CURSO EXISTE
    $consulta = "SELECT * FROM curso WHERE codigocurso = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param('s', $codigoCurso);
    $stmt->execute();
    $result = $stmt->get_result(); 

    if($result->num_rows > 0){
        // El curso existe, procedemos a matricular
        $pruebaA = $_POST['pruebaA'];
        $pruebaB = $_POST['pruebaB'];
        $tipo = $_POST['tipo'];
        $inscripcion = $_POST['inscripcion'];

        // CORRECCIÓN IMPORTANTE AQUÍ:
        // 1. Añadido el punto y coma final ;
        // 2. Añadidas comillas simples '' alrededor de las variables de texto/fecha
        // Nota: dni, codigo, tipo e inscripcion suelen ser strings/fechas, necesitan comillas.
        // Nota 2: Lo ideal sería usar prepare() también aquí, pero para arreglar tu error rápido:
        
        $sql = "INSERT INTO matricula VALUES ('$dni', '$codigoCurso', $pruebaA, $pruebaB, '$tipo', '$inscripcion')";
        
        // Ejecutamos la consulta. Usamos try/catch o control de error por si ya está matriculado
        if($conn->query($sql) === TRUE) {
            $error = "Proceso de matrícula realizado correctamente";
        } else {
            $error = "Error al matricular: " . $conn->error;
        }

    } else { 
        // AÑADIDO EL 'ELSE' QUE FALTABA
        $error = "El código de curso introducido es erróneo";
    }
    
    $stmt->close();
} 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula Alumno</title>
</head>
<body>
    <h1>ALUMNO: <?php echo $dni ?></h1>
    
    <?php if($error != "") echo "<p style='color:blue; font-weight:bold;'>$error</p>"; ?>

    <form method="post">
        DNI <input type="text" name="dniA" value="<?php echo $dni ?>" readonly><br>
        
        COD CURSO <input type="text" name="codcurso" required><br>
        PRUEBA A <input type="number" name="pruebaA" maxlength="2" required><br>
        PRUEBA B <input type="number" name="pruebaB" maxlength="2" required><br>
        TIPO <input type="text" name="tipo" required><br>
        INSCRIPCION <input type="date" name="inscripcion" required><br>
        
        <br>
        <button type="submit">GUARDAR</button>
        <button type="submit" name="cerrar">Cerrar sesión</button>
    </form>
</body>
</html>