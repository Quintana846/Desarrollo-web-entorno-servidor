<?php

session_start();

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);

/*
Crear un módulo llamado resultado.php en el que a partir de la fecha del sistema se obtengan los resultados de los jugadores que han
solucionado correctamente el jeroglífico en ese día. La pantalla ha de mostrar el número de jugadores que han acertado y los que han
fallado hasta el momento, según se vayan incrementando las jugadas en el día los resultados se han de ver reflejados en esta pantalla.
Además este módulo ha de sumar un punto a cada jugador que haya acertado en el campo de puntos de la tabla jugador.



SELECT r.login as 'Acierto', r.hora
FROM respuestas r INNER JOIN solucion s 
WHERE r.respuesta = s.solucion AND r.fecha = s.fecha;

SELECT r.login as 'Error', r.hora
FROM respuestas r INNER JOIN solucion s 
WHERE r.respuesta NOT LIKE s.solucion AND r.fecha = s.fecha;

UPDATE jugador j 
SET puntos = puntos + 1 where login in 
( SELECT login 
FROM respuestas r, solucion 
WHERE respuesta = solucion AND r.fecha = CURDATE() );
*/

if(isset($_SESSION['jugador']) && !isset($_POST['solucion'])){
    $jugador = $_SESSION['jugador'];
    echo <<<_END
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>!Bienvenid@, $jugador ¡</h1>
    <img src="20240216.jpg "><br>
    <form action="inicio.php" method="post">
        Respuesta al jeroglifico: <br><input type="text" name="solucion"><br>
        <button type"submit">Enviar</button>
        <a href="">Ver puntos por jugador</a><br>
        <a href="">Resultados del día</a>
    </form>
</body>
</html>
_END;
} else if(isset($_SESSION['jugador']) && isset($_POST['solucion'])){

    $jugador = $_SESSION['jugador'];
    $solucion = $_POST['solucion'];
    $log = $_SESSION['log'];
    $sql = "INSERT INTO respuestas (fecha, login, hora, respuesta) VALUES (CURDATE(), '$log', CURTIME(), '$solucion')";

    $insertar = $conn->query($sql);



    echo <<<_END
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>!Bienvenid@, $jugador ¡</h1>
    <img src="20240216.jpg "><br>
    <form action="inicio.php" method="post">
        Respuesta al jeroglifico: <br><input type="text" name="solucion">
        <p style="color: red">Respuesta enviada correctamente...</p>
        <button type"submit">Enviar</button>
        <a href="">Ver puntos por jugador</a><br>
        <a href="resultado.php">Resultados del día</a>
    </form>
</body>
</html>
_END;
}