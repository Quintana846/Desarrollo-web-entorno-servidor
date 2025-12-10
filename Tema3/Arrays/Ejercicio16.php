<?php

// EJERCICIO 16: Lenguajes cliente/servidor
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 16: Lenguajes web</h3>";

$lenguajes_cliente = ["C1" => "HTML", "C2" => "CSS", "C3" => "JavaScript"];
$lenguajes_servidor = ["S1" => "PHP", "S2" => "Python", "S3" => "Java"];

// array_merge une los arrays (si las claves son string no numéricas y no se repiten, se mantienen)
$lenguajes = array_merge($lenguajes_cliente, $lenguajes_servidor);

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Código</th><th>Lenguaje</th></tr>";
foreach ($lenguajes as $codigo => $lenguaje) {
    echo "<tr><td>$codigo</td><td>$lenguaje</td></tr>";
}
echo "</table>";

?>