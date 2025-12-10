<?php

// EJERCICIO 15: Nombres en lista HTML
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 15: Lista de nombres</h3>";

$nombres = ["Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa"];

// count() cuenta elementos del array
echo "Número de elementos: " . count($nombres) . "<br>";

echo "<ul>";
foreach ($nombres as $nombre) {
    echo "<li>$nombre</li>";
}
echo "</ul>";

?>