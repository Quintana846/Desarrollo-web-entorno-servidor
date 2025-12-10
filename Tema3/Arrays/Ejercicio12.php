<?php

// EJERCICIO 12: Datos de una persona (Array asociativo)
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 12: Datos personales</h3>";

$persona = [
    "Nombre" => "Pedro Torres",
    "Dirección" => "C/Mayor, 37",
    "Teléfono" => 123456789
];

foreach ($persona as $dato => $valor) {
    echo "<strong>$dato:</strong> $valor <br>";
}

?>