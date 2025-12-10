<?php

// EJERCICIO 22: Manipulación array flecha
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 22: Array con flechas</h3>";

// Nota: El enunciado usa notación flecha "5->1", entendemos que es "Clave => Valor"
$miArray = [
    5 => 1,
    12 => 2,
    13 => 56,
    "x" => 42
];

echo "Contenido inicial:<br>";
print_r($miArray);
echo "<br>";

echo "Número de elementos: " . count($miArray) . "<br>";

// Borrar contenido de posición (clave) 5
unset($miArray[5]);

echo "Contenido tras borrar clave 5:<br>";
print_r($miArray);
echo "<br>";

// Eliminar el array completo
unset($miArray);
echo "Array eliminado (si intentamos mostrarlo dará error/aviso).<br>";

?>