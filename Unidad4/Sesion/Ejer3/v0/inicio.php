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

        $colores = ["red", "blue", "yellow", "green"];
        $col1 = $colores[array_rand($colores)]; // da a $col1 un color aleatorio del array $colores
        $col2 = $colores[array_rand($colores)];
        $col3 = $colores[array_rand($colores)];
        $col4 = $colores[array_rand($colores)];

        $solucion = [$col1, $col2, $col3, $col4];
        $_SESSION["solucion"] = $solucion;
        $_SESSION["intentos"] = []; // reinicia la secuencia del jugador

        pintarCirculos($col1, $col2, $col3, $col4);
    ?>

    <!--Boton Vamos a Jugar-->
    <form  action="jugar.php" method="post">
        <br><input type="submit" value="VAMOS A JUGAR">
    </form>
    
</body>
</html>