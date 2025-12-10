<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
</head>
<body>
    <h1>Simón</h1>
    <?php
        session_start();
        require_once 'pintarCirculos.php';

        $solucion = $_SESSION["solucion"];
        $intentos = $_SESSION["intentos"] ?? [];
    ?>

    <p>La secuencia correcta es:</p>
    <?php 
        pintarCirculos($solucion);
    ?>

    <p>Tu secuencia fue:</p>
    <?php 
        pintarCirculos($intentos);
    ?>

    <form 
    action="dificultad.php" method="post"><input type="submit" value="Volver a jugar">
    </form>
    
</body>
</html>