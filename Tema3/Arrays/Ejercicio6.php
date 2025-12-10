<?php

// EJERCICIO 6: Matriz 4x5 y elemento mayor
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 6: Matriz 4x5 y mayor elemento</h3>";

$matriz4x5 = [];
$mayor = -1; // Inicializamos con un valor bajo
$posFila = 0;
$posCol = 0;

echo "<strong>Matriz:</strong><br>";
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $valor = rand(1, 100);
        $matriz4x5[$i][$j] = $valor;
        echo "$valor ";
        
        // Comprobamos si es el mayor encontrado hasta ahora
        if ($valor > $mayor) {
            $mayor = $valor;
            $posFila = $i;
            $posCol = $j;
        }
    }
    echo "<br>";
}

echo "<br>El elemento mayor es <strong>$mayor</strong> y está en la Fila $posFila, Columna $posCol.<br>";

?>