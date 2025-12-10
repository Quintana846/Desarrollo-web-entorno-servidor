<?php

// EJERCICIO 5: Matriz 3x5 por filas y columnas
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 5: Matriz 3x5 recorrido</h3>";

$matriz3x5 = [];
echo "<strong>Matriz generada:</strong><br>";
// Generación visual simple
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matriz3x5[$i][$j] = rand(1, 50);
        echo $matriz3x5[$i][$j] . " ";
    }
    echo "<br>";
}

echo "<br><strong>a. Recorrido por Fila:</strong><br>";
// Recorremos fila a fila (bucle externo i, interno j)
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 5; $j++) {
        echo $matriz3x5[$i][$j] . " ";
    }
}

echo "<br><br><strong>b. Recorrido por Columna:</strong><br>";
// Recorremos columna a columna (bucle externo j, interno i)
// Nota: j va hasta 5 (columnas), i hasta 3 (filas)
for ($j = 0; $j < 5; $j++) {
    for ($i = 0; $i < 3; $i++) {
        echo $matriz3x5[$i][$j] . " ";
    }
}

?>