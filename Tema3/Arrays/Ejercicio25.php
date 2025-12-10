<?php

// EJERCICIO 25: Matriz de amigos por ciudades
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 25: Amigos por ciudad</h3>";

$agenda = [
    "Madrid" => [
        "Nombre" => "Pedro",
        "Edad" => 32,
        "Teléfono" => "91-999.99.99"
    ],
    "Barcelona" => [
        "Nombre" => "Susana",
        "Edad" => 34,
        "Teléfono" => "93-000.00.00"
    ],
    "Toledo" => [
        "Nombre" => "Sonia",
        "Edad" => 42,
        "Teléfono" => "925-09.09.09"
    ]
];

// Recorrido anidado con listas HTML
echo "<ul>";
foreach ($agenda as $ciudad => $datosAmigo) {
    echo "<li><strong>Amigos en $ciudad:</strong>";
    
    echo "<ul>";
    foreach ($datosAmigo as $clave => $valor) {
        echo "<li>$clave: $valor</li>";
    }
    echo "</ul>";
    
    echo "</li><br>";
}
echo "</ul>";

?>