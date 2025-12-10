<?php

echo "<h3>Números primos entre 1 y 50:</h3>";

// 1. Recorremos los números del 1 al 50
for ($numero = 1; $numero <= 50; $numero++) {
    
    // El número 1 no se considera primo por definición matemática
    if ($numero <= 1) {
        continue; // Saltamos a la siguiente iteración del bucle
    }

    $esPrimo = true; // Asumimos que es primo hasta que se demuestre lo contrario

    // 2. Comprobamos si tiene algún divisor aparte de 1 y él mismo.
    // Solo hace falta probar hasta la mitad del número ($numero / 2) 
    // o hasta su raíz cuadrada para ser más eficientes.
    for ($i = 2; $i <= $numero / 2; $i++) {
        
        // Si el resto de la división es 0, significa que es divisible
        if ($numero % $i == 0) {
            $esPrimo = false; // Ya no es primo
            break; // Rompemos el bucle interno, no hace falta seguir probando
        }
    }

    // 3. Si la bandera $esPrimo sigue siendo verdadera, lo mostramos
    if ($esPrimo) {
        echo $numero . " ";
    }
}

?>