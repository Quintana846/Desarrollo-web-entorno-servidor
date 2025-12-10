<?php

// EJERCICIO 10: Foreach con array asociativo
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 10: Carga e impresión con foreach</h3>";

// Carga manual del vector según enunciado
$v[1] = 90;
$v[30] = 7;
$v['e'] = 99;
$v['hola'] = 43;

// Imprimimos clave y valor
foreach ($v as $clave => $valor) {
    echo "Clave: $clave -> Valor: $valor <br>";
}

?>