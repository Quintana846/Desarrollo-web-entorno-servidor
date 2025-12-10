<?php

// 1. Generamos un número aleatorio entre 1 y 1000
$numero = rand(1, 1000);

// Variable para acumular la suma de los divisores
$sumaDivisores = 0;

// 2. Buscamos los divisores
// Recorremos desde 1 hasta la mitad del número. 
// (No hace falta llegar hasta el final, porque ningún divisor propio 
// es mayor que la mitad del número).
for ($i = 1; $i <= $numero / 2; $i++) {
    
    // Si el resto de la división es 0, es un divisor
    if ($numero % $i == 0) {
        $sumaDivisores += $i; // Lo sumamos
    }
}

// 3. Comprobamos si es perfecto
echo "Número generado: <b>$numero</b><br>";
echo "Suma de sus divisores: <b>$sumaDivisores</b><br><br>";

if ($numero == $sumaDivisores) {
    echo "✅ El número $numero <strong>ES PERFECTO</strong>.";
} else {
    echo "❌ El número $numero <strong>NO ES PERFECTO</strong>.";
}

?>