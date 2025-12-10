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

        $colores = ["red", "blue", "yellow", "green", "purple", "brown", "pink", "orange"];

        /* 
            Obtiene num circulos de dificultad.php
            ?? 4 si $_POST['num'] no existe el num es 4
        */
        $numCirculos = $_POST['num'] ?? 4; 
        $numColores = $_POST['numColores'] ?? 4;

        // Guardar configuracion 
        $_SESSION['numCirculos'] = $numCirculos;
        $_SESSION['numColores'] = $numColores;

        $solucion = [];

        for($i = 0; $i <$numCirculos; $i++){
            $solucion[] = $colores[array_rand($colores)]; // toma un color aleatorio del array $colores
        }

        $_SESSION["solucion"] = $solucion;
        $_SESSION["intentos"] = []; // reinicia la secuencia del jugador

        pintarCirculos($solucion);
    ?>

    <!--Boton Vamos a Jugar-->
    <form  action="jugar.php" method="post">
        <br><input type="submit" value="VAMOS A JUGAR">
    </form>
    
</body>
</html>