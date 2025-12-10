<?php

// EJERCICIO 11: Películas por mes
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 11: Películas vistas</h3>";

// Array asociativo Mes => Cantidad
$peliculas = [
    "Enero" => 9,
    "Febrero" => 12,
    "Marzo" => 0,
    "Abril" => 17
];

foreach ($peliculas as $mes => $cantidad) {
    // Solo mostramos si se ha visto alguna película (cantidad distinta de 0)
    if ($cantidad != 0) {
        echo "En $mes se han visto $cantidad películas.<br>";
    }
}

?>