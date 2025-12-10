<?php

// EJERCICIO 21: Ordenar array asociativo
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 21: Ordenar números</h3>";

$numeros = [3, 2, 8, 123, 5, 1];

// sort() ordena de menor a mayor y reindexa los números
sort($numeros);

echo "<table border='1'><tr><th>Valor</th></tr>";
foreach ($numeros as $num) {
    echo "<tr><td>$num</td></tr>";
}
echo "</table>";

?>