<?php

// EJERCICIO 17: Array merge de 3 arrays
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 17: Merge de 3 arrays</h3>";

$a1 = ["Lagartija", "Araña", "Perro", "Gato", "Ratón"];
$a2 = ["12", "34", "45", "52", "12"];
$a3 = ["Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34"];

$resultado = array_merge($a1, $a2, $a3);

// print_r muestra el array de forma legible para debug
echo "<pre>";
print_r($resultado);
echo "</pre>";

?>