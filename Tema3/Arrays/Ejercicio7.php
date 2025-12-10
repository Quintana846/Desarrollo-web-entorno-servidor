<?php

/*Generar una matriz de 3x4 y generar un vector que contenga los valores máximos
de cada fila y otro que contenga los promedios de los mismos. Imprimir ambos
vectores a razón de uno por renglón.*/

// Configuración de la matriz
$filas = 3;
$columnas = 4;
$matriz = [];

// Vectores de resultados
$vectorMaximos = [];
$vectorPromedios = [];

echo "<h3>1. Matriz Generada ($filas x $columnas):</h3>";
echo "<table border='1' cellpadding='5' style='border-collapse:collapse; text-align:center'>";

// --- PASO 1 y 2: Generar y Mostrar la Matriz ---
for ($i = 0; $i < $filas; $i++) {
    echo "<tr>";
    
    // Variables temporales para calcular los datos de ESTA fila
    $sumaFila = 0;
    $maxFila = null; // Iniciamos en null para asignar el primer valor luego

    for ($j = 0; $j < $columnas; $j++) {
        // Generamos número aleatorio entre 1 y 100
        $valor = rand(1, 100);
        $matriz[$i][$j] = $valor;

        // Visualización
        echo "<td>$valor</td>";

        // --- LÓGICA DE CÁLCULO ---
        
        // 1. Acumulamos para el promedio
        $sumaFila += $valor;

        // 2. Buscamos el máximo
        // Si es el primer elemento o es mayor que el máximo actual, lo guardamos
        if ($j == 0 || $valor > $maxFila) {
            $maxFila = $valor;
        }
    }
    
    // Al terminar la fila, guardamos los resultados en los vectores
    $vectorMaximos[] = $maxFila;
    $vectorPromedios[] = $sumaFila / $columnas;

    echo "</tr>";
}
echo "</table>";


// --- PASO 3: Imprimir los vectores resultantes ---

echo "<h3>2. Resultados:</h3>";

// Imprimir Vector de Máximos
echo "<strong>Vector de Máximos (uno por fila):</strong><br>";
echo "[ ";
foreach ($vectorMaximos as $max) {
    echo $max . " ";
}
echo "]<br><br>";

// Imprimir Vector de Promedios
echo "<strong>Vector de Promedios (uno por fila):</strong><br>";
echo "[ ";
foreach ($vectorPromedios as $promedio) {
    // number_format para redondear a 2 decimales y que se vea bonito
    echo number_format($promedio, 2) . " ";
}
echo "]";

?>