<?php

// 1. Generamos un número entero aleatorio (por ejemplo, entre 1 y 100)
$numero = rand(1, 100);

echo "Número generado: <b>$numero</b><br><br>";

// 2. Lógica para determinar si es primo
// Asumimos que es primo (true) hasta demostrar lo contrario
$esPrimo = true;

if ($numero <= 1) {
    // El 1 y los negativos no se consideran primos por definición
    $esPrimo = false;
} else {
    // 3. Buscamos divisores desde el 2 hasta la raíz cuadrada del número.
    // Si encontramos algún divisor en este rango, ya sabemos que NO es primo.
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            $esPrimo = false; // Encontramos un divisor, no es primo
            break;            // Salimos del bucle para ahorrar recursos
        }
    }
}

// 4. Mostramos el resultado final
if ($esPrimo) {
    echo "El número $numero <strong>ES PRIMO</strong>.";
} else {
    echo "El número $numero <strong>NO ES PRIMO</strong>.";
}

?>