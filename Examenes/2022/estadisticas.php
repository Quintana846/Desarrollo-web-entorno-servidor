<?php
session_start();
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Error fatal de conexión");

// SQL CORREGIDA: 
// 1. LEFT JOIN para incluir a TODOS los usuarios (incluso los que no tienen jugadas)
// 2. La condición 'jugadas.acierto = 1' va en el ON para no filtrar filas del lado izquierdo (usuarios)
$sql = "SELECT usuarios.Nombre, usuarios.Codigo, COUNT(jugadas.acierto) as total_aciertos
        FROM usuarios 
        LEFT JOIN jugadas ON usuarios.Codigo = jugadas.codigousu AND jugadas.acierto = 1
        GROUP BY usuarios.Codigo, usuarios.Nombre";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Estadísticas</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background-color: #f2f2f2; }
        .barra-grafica { background-color: blue; height: 20px; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Estadísticas</h1>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Aciertos</th>
                <th>Gráfica</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $result->fetch_assoc()): ?>
                <?php $ancho = $fila['total_aciertos'] * 20; ?>
                <tr>
                    <td><?php echo $fila['Codigo']; ?></td>
                    <td><?php echo $fila['Nombre']; ?></td>
                    <td><?php echo $fila['total_aciertos']; ?></td>
                    <td style="text-align: left;">
                        <div class="barra-grafica" style="width: <?php echo $ancho; ?>px;"></div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div style="text-align: center;">
        <a href="inicio.php">Volver a jugar</a>
    </div>
</body>
</html>
<?php $conn->close(); ?>