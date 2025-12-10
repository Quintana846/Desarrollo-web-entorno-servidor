<?php

// EJERCICIO 4: Matriz 4x4 aleatoria y diagonales
// -------------------------------------------------------------------------
echo "<h3>Ejercicio 4: Matriz 4x4 y diagonales</h3>";

$matriz4x4 = [];
echo "<strong>Matriz generada:</strong><br>";

// Generamos y mostramos la matriz visualmente
echo "<table border='1' cellpadding='5' style='border-collapse:collapse; text-align:center;'>";
for ($i = 0; $i < 4; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 4; $j++) {
        $valor = rand(1, 99); // Números aleatorios entre 1 y 99
        $matriz4x4[$i][$j] = $valor;
        echo "<td>$valor</td>";
    }
    echo "</tr>";
}
echo "</table><br>";

// Extraemos diagonales
$diagonalPrincipal = [];
$diagonalSecundaria = [];

for ($i = 0; $i < 4; $i++) {
    // Diagonal principal: índices iguales [0][0], [1][1]...
    $diagonalPrincipal[] = $matriz4x4[$i][$i];
    
    // Diagonal secundaria: fila i, columna (longitud - 1 - i) => [0][3], [1][2]...
    $diagonalSecundaria[] = $matriz4x4[$i][3 - $i];
}

// Mostramos resultados en renglones
echo "Diagonal Principal: " . implode(", ", $diagonalPrincipal) . "<br>";
echo "Diagonal Secundaria: " . implode(", ", $diagonalSecundaria) . "<br>";

?>