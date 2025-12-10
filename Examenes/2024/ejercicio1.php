<?php
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

$error= "";
if(isset($_POST['dni'])){
    
    $dni = sanitizeString($_POST['dni']);

    $consultaAlumno = "SELECT nombreA , dniA FROM alumno WHERE dniA=?";
    $consultaProfe = "SELECT nombreP ,dniP FROM profesor WHERE dniP=?";

    $stmtA = $conn->prepare($consultaAlumno);
    $stmtP = $conn->prepare($consultaProfe);

    $stmtA->bind_param('s', $dni);
    $stmtP->bind_param('s', $dni);

    // 1. Ejecutamos ALUMNO y recogemos resultado INMEDIATAMENTE
    $stmtA->execute();
    $resultA = $stmtA->get_result(); // <--- Al hacer esto, liberamos la conexión

    // 2. AHORA podemos ejecutar PROFESOR y recoger resultado
    $stmtP->execute();
    $resultP = $stmtP->get_result();

    if(($resultA->num_rows < 1) && ($resultP->num_rows < 1)){
        
        $error = "El dni introducido no ha sido encontrado. Vuelve a introducir un DNI válido.";

    } else {

        if ($resultA->num_rows > 0) {
            $filas = $resultA->fetch_assoc();
        session_start();
        $_SESSION['usuario'] = $filas['nombreA'];

        $_SESSION['dni'] = $dni;
        $_SESSION['rol'] = "alumno";
        header("Location: Ejercicio3.php");
        exit();
    } else if($resultP->num_rows > 0){
            $filas = $resultP->fetch_assoc();
            
        session_start();
        
        $_SESSION['usuario'] = $filas['nombreP'];   
        $_SESSION['dni'] = $dni;
        $_SESSION['rol'] = "profesor";
        header("Location: Ejercicio2.php");
        exit();
    }
    }  

    $stmtP->close();
    $stmtA->close();
$conn->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <?php
        if($error!="") echo "<p style='color:red; font-weight:bold;'>$error</p>";
    ?>
    DNI <br>
    <input type="text" name="dni" placeholder="Ej: 1234"><br>
    <button type="submit">Entrar</button>
    </form>
</body>
</html>