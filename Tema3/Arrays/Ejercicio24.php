<?php

// EJERCICIO 24: Deportes y puntero
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 24: Punteros de array</h3>";

$deportes = ["futbol", "baloncesto", "natación", "tenis"];

// Recorrido con FOR estándar
echo "Recorrido FOR: ";
for ($i = 0; $i < count($deportes); $i++) {
    echo $deportes[$i] . " ";
}
echo "<br>";

echo "Total valores: " . count($deportes) . "<br>";

// Operaciones con punteros
// current() muestra valor actual, next() avanza, end() va al final, prev() retrocede
echo "Posición inicial (reset): " . current($deportes) . "<br>";
echo "Avanzamos uno (next): " . next($deportes) . "<br>";
echo "Última posición (end): " . end($deportes) . "<br>";
echo "Retrocedemos uno (prev): " . prev($deportes) . "<br>";

?>