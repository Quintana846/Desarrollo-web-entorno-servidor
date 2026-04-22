<?php
session_start();
// Si el usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
if (!isset($_SESSION["nombre"])) {
    header("Location: entrada.php");
    exit();
}

// Inicialización de la partida si no existe

if (!isset($_SESSION["jugadas"])) {

    // Generar una combinación aleatoria de 6 cartas con combinaciones de 2 

    $cartas_base = array("copas_02.jpg", "copas_03.jpg", "copas_05.jpg");
    $cartas = array_merge($cartas_base, $cartas_base); 
    shuffle($cartas); // Aleatorizamos las posiciones
    
    $_SESSION["cartas"] = $cartas;
    $_SESSION["jugadas"] = 0; // El número de CARTAS LEVANTADAS estará a 0
    $_SESSION["carta_actual"] = -1; // Guardamos qué carta está visible ahora mismo (ninguna al empezar)
}

if(isset($_POST['comprobar'])) {

    $_SESSION["pos1"] = $_POST["pareja1"] - 1; // Restamos 1 para ajustar a índice de array
    $_SESSION["pos2"] = $_POST["pareja2"] - 1; // Restamos 1 para ajustar a índice de array

    if ($_SESSION["cartas"][$_SESSION["pos1"]] === $_SESSION["cartas"][$_SESSION["pos2"]]) {

        $_SESSION["pareja_encontrada"] = true;
    } else {
        $_SESSION["pareja_encontrada"] = false;
    }

    $_SESSION["pendiente_update"] = true;
    
    header("Location: resultado.php");
    exit(); 
}

// Procesar pulsaciones de botones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hubo_jugada = false;

    for ($i = 1; $i <= 6; $i++) {
        if (isset($_POST["carta$i"])) {
            $_SESSION["jugadas"]++; // Incrementar en una unidad las cartas levantadas
            
            // OJO AQUÍ: Guardamos SOLO la carta que se acaba de pulsar. 
            // Esto garantiza que el resto se pongan boca abajo automáticamente 

            $_SESSION["carta_actual"] = $i - 1; 
            
            $hubo_jugada = true;
        }
    }

    // Patrón PRG para evitar que el F5 reviente el contador de jugadas

    if ($hubo_jugada) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Cartas</title>
    <style>
        button {
            margin: 5px;
            padding: 5px;
            font-size: 16px;
        }
        img {
            margin: 5px;
            padding: 5px;
            height: 100px;
            width: 70px;
        }
    </style>
</head>
<body>
    <h2>Bienvenid@, <?php echo htmlspecialchars($_SESSION["nombre"]); ?></h2>
    
    <p>Cartas levantadas: <input type="number" name="jugadas" value="<?php echo $_SESSION['jugadas']; ?>" readonly></p>
    
    <form action="" method="post">
        <?php
        // Generar los 6 botones de Levantar carta en un formulario dinámico
        for ($i = 1; $i <= 6; $i++) {
            echo '<button type="submit" name="carta' .$i.'" value="'.$i.'">Levantar carta ' . $i . '</button>';
        }
        ?>
    </form>
    <br>

    <form action="mostrarcartas.php" method="post">
        Pareja: 
        <input type="number" name="pareja1" min="1" max="6" required>
        <input type="number" name="pareja2" min="1" max="6" required>
        <button type="submit" name="comprobar">Comprobar</button>
    </form>
    <br>

    <div>
    <?php
    // Bucle para pintar las 6 cartas
    for ($i = 0; $i < 6; $i++) {
        // Solo mostramos la carta real si es la que acabamos de pulsar
        if (isset($_SESSION["carta_actual"]) && $_SESSION["carta_actual"] === $i) {
            echo '<img src="' . $_SESSION["cartas"][$i] . '" alt="Carta levantada">';
        } else {
            // Si no es la pulsada, generamos una secuencia boca abajo
            echo '<img src="boca_abajo.jpg" alt="Carta boca abajo">';
        }
    }
    ?>
    </div>
</body>
</html>