<?php

session_start();

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);

if(isset($_SESSION['jugador'])){
    $jugador = $_SESSION['jugador'];
    echo <<<_END
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>!Bienvenid@, $jugador ¡</h1>
    <img src="20240216.jpg "><br>
    Solucion al jeroglifico: <input type="text" name="solución"><br>
    <a href="">Ver puntos por jugador</a><br>
    <a href="">Resultados del día</a>
</body>
</html>
_END;
}