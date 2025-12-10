<?php
session_start();

require_once 'mysql.php';

$conn = new mysqli($hn, $un, $pw, $db);; 

if (!isset($_POST['login'])) {
        $_SESSION['dni'] = '';
        $_POST['dni'] = '';
    echo <<<_END
    <form action="Ejercicio1.php" method="post">
        <label for="dni">DNI</label><br><br>
        <input id="dni" name="dni" type="text" placeholder="Introduce tu DNI"><br>

        <br><button type="submit" name="login">Enviar</button>
    </form>
    _END;
} else if (isset($_POST['login'])) {

    $dni = $_POST['dni'];

    $alumno = "SELECT dniA FROM alumno WHERE dniA = '$dni'";
    $profesor = "SELECT dniP FROM profesor WHERE dniP = '$dni'";

    $result1 = $conn->query($alumno);

    $result2 = $conn->query($profesor);

    if ($result1->num_rows > 0) {
        $_SESSION['dni'] = $dni;
        header("Location: Ejercicio3.php");
        exit();
    } elseif ($result2->num_rows > 0) {
        $_SESSION['dni'] = $dni;
        header("Location: Ejercicio2.php");
        exit();
    } else {
        echo <<<_END
    <form action="Ejercicio1.php" method="post">
        <label for="dni">DNI NO ENCONTRADO. INTRODUCE DE NUEVO TU DNI</label><br><br>
        <input id="dni" name="dni" type="text" placeholder="Introduce tu DNI"><br>

        <br><button type="submit" name="login">Enviar</button>
    </form>
    _END;
    }
}
$conn->close();
?>

