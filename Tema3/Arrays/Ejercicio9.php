<?php

// EJERCICIO 9: Matriz 20x20 y suma de columnas
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 9: Matriz 20x20 máxima suma columna</h3>";

// Nota: 20x20 es grande para mostrar en pantalla, solo mostraremos el resultado
$matriz20x20 = [];
// Llenamos la matriz
for ($i = 0; $i < 20; $i++) {
    for ($j = 0; $j < 20; $j++) {
        $matriz20x20[$i][$j] = rand(1, 10);
    }
}

$maxSuma = -1;
$columnaMax = -1;

// Sumamos columnas: Bucle externo J (columnas), interno I (filas)
for ($j = 0; $j < 20; $j++) {
    $sumaActual = 0;
    for ($i = 0; $i < 20; $i++) {
        $sumaActual += $matriz20x20[$i][$j];
    }
    
    // Comparamos si esta columna suma más que la anterior máxima
    if ($sumaActual > $maxSuma) {
        $maxSuma = $sumaActual;
        $columnaMax = $j;
    }
}

echo "La columna con la máxima suma es la número <strong>$columnaMax</strong> con un total de <strong>$maxSuma</strong>.<br>";

?>