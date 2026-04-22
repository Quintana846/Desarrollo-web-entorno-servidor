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
$numhoras = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulos Profesor</title>
</head>
<style>
    th, td {
        border: 1px solid black;
        text-align: center;
        padding: 3px;
    }
</style>
<body>
    <p>PROFESOR: <?php echo $_SESSION['dni']; ?></p>
    <p>NOMBRE: <?php echo strtoupper($_SESSION['nombre']); ?></p>
    <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
            <thead style="background-color: lightgray; border: 1px solid black;">
        <tr>
            <th>codigocurso</th>
            <th>nombrecurso</th>
            <th>maxalumnos</th>
            <th>fechaini</th>
            <th>fechafin</th>
            <th>numhoras</th>    
            <th>profesor</th>          
        </tr>
    </thead>
    <tbody style="border: 1px solid black;">
        <?php
        $stmt = $conn->prepare("SELECT * FROM curso WHERE profesor = ?");
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['codigocurso']; ?></td>
                <td><?php echo $row['nombrecurso']; ?></td>
                <td><?php echo $row['maxalumnos']; ?></td>
                <td><?php echo $row['fechaini']; ?></td>
                <td><?php echo $row['fechafin']; ?></td>
                <td><?php echo $row['numhoras']; $numhoras += $row['numhoras']; ?></td>
                <td><?php echo $row['profesor']; ?></td>
            </tr>
        <?php endwhile; 
        $stmt->close();
        $conn->close(); ?>
    </tbody>
    </table>
    <p>Total horas impartidas: <?php echo $numhoras; ?></p>
</html>