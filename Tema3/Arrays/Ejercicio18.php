<?php

// EJERCICIO 18: Array push
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 18: Array push</h3>";

// Reutilizamos los arrays del ejercicio anterior
$nuevoArray = []; // Empezamos vacío

$a1 = ["Lagartija", "Araña", "Perro", "Gato", "Ratón"];
$a2 = ["12", "34", "45", "52", "12"];
$a3 = ["Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34"];

$resultado = array_merge($a1, $a2, $a3);

// array_push añade elementos al final. 
// Nota: array_push espera elementos individuales, si le pasamos arrays enteros 
// los meterá como sub-arrays. Para aplanarlo como en el 17 necesitaríamos un operador 'spread' (...)
// Pero seguiremos la lógica básica de ir metiendo los arrays uno a uno para simular la unión.

// Forma 1 (Más manual, elemento a elemento)
foreach ($a1 as $elem) array_push($nuevoArray, $elem);
foreach ($a2 as $elem) array_push($nuevoArray, $elem);
foreach ($a3 as $elem) array_push($nuevoArray, $elem);

echo "<pre>";
print_r($nuevoArray);
echo "</pre>";

?>