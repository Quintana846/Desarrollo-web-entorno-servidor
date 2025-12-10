<?php
session_start();
if(isset($_POST['cerrar'])){
    header("Location: Ejercicio1.php");
    session_destroy();
    exit();
}
if(!isset($_SESSION['dni']) || $_SESSION['rol'] != "profesor"){
    header("Location: ejercicio1.php");
    exit();
} 

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Error fatal de conexión");

$nombre = $_SESSION['usuario'];
$dni = $_SESSION['dni'];

// OJO AQUI: He puesto comillas simples '$dni' rodeando la variable
$consulta = "SELECT * FROM curso WHERE profesor = '$dni'";

// Ejecutamos directamente sin preparar
$result = $conn->query($consulta); 

$totalHoras = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>PROFESOR:  <?php echo $dni ?>         </h2> <h2>PROFESOR:  <?php echo $nombre ?></h2>

<?php if ($result->num_rows > 0): ?>
        
        <table>
            <thead>
                <tr>
                    <th>Código Curso</th>
                    <th>Nombre del Curso</th>
                    <th>Max alumnos</th>
                    <th>fechaini</th>
                    <th>fechafin</th>
                    <th>Horas</th>
                    <th>profesor</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // AQUI ESTÁ EL BUCLE
                while($fila = $result->fetch_assoc()) {
                    // Sumamos las horas de este curso al total
                    $totalHoras += $fila['numhoras']; 
                    
                    echo "<tr>";
                    echo "<td>" . $fila['codigocurso'] . "</td>";
                    echo "<td>" . $fila['nombrecurso'] . "</td>"; 
                    echo "<td>" . $fila['maxalumnos'] . "</td>";
                    echo "<td>" . $fila['fechaini'] . "</td>";
                    echo "<td>" . $fila['fechafin'] . "</td>"; 
                    echo "<td>" . $fila['numhoras'] . "</td>";
                    echo "<td>" . $fila['profesor'] . "</td>";
                    echo "</tr>";
                } 
                ?>
                <tr style="font-weight: bold; background-color: #e0e0e0;">
                    <td colspan="2" style="text-align: right;">TOTAL HORAS:</td>
                    <td><?php echo $totalHoras; ?></td>
                </tr>
            </tbody>
        </table>

    <?php else: ?>
        <p>No tiene cursos asignados actualmente.</p>
    <?php endif; ?>

    <?php
    // Cerramos todo al final
    $conn->close();
    ?>


    <h2>Total horas impartidas:       <?php   echo $totalHoras   ?></h2> <br>
    <button type="Submit" name="cerrar">Cerrar sesion</button>
</body>
</html>