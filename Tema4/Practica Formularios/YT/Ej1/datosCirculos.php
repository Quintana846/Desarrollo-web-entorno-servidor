<?php

session_start();

$figura = $_POST['figura'];

$resultado = 0;  //inicializamos

switch ($figura) {
    case 'cuadrado':
        $lado = $_POST['lado'];
        $resultado = $lado ** 2;
        break;
    
    case 'circulo':
        $radio = $_POST['radio'];
        $resultado = ($radio ** 2) * M_PI;
        break;

    case 'triangulo':
        $base = $_POST['base'];
        $altura = $_POST['altura'];
        $resultado = ($base * $altura) / 2;
        break;

}

$_SESSION['resultado'] = $resultado;

header("Location: Circulos.php");

?>