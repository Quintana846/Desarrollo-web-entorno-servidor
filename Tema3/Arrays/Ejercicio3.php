<?php
// EJERCICIO 3: Array con los 10 primeros números pares
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 3: 10 primeros números pares</h3>";

$pares = []; // Inicializamos el array

// Llenamos el array con los 10 primeros números pares (empezando desde 2)
for ($i = 1; $i <= 10; $i++) {
    $pares[] = $i * 2;
}

// Imprimimos cada número en una línea nueva
foreach ($pares as $numero) {
    echo $numero . "<br>";
}
?>