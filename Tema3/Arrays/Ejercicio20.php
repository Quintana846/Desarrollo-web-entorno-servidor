<?php

// EJERCICIO 20: Estadios de fútbol
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 20: Estadios de fútbol</h3>";

$estadios_futbol = [
    "Barcelona" => "Camp Nou",
    "Real Madrid" => "Santiago Bernabeu",
    "Valencia" => "Mestalla",
    "Real Sociedad" => "Anoeta"
];

// Mostrar tabla original
echo "<table border='1'><tr><th>Equipo</th><th>Estadio</th></tr>";
foreach ($estadios_futbol as $equipo => $estadio) {
    echo "<tr><td>$equipo</td><td>$estadio</td></tr>";
}
echo "</table><br>";

// Eliminar Real Madrid usando unset() y la clave
unset($estadios_futbol["Real Madrid"]);

echo "<strong>Lista tras eliminar Real Madrid:</strong><br>";
echo "<ol>";
foreach ($estadios_futbol as $equipo => $estadio) {
    echo "<li>$equipo juega en $estadio</li>";
}
echo "</ol>";

?>