<?php

// 1. Definimos los "diccionarios" para traducir los índices numéricos a texto
$niveles = ["Básico", "Medio", "Perfeccionamiento"]; // Filas (0, 1, 2)
$idiomas = ["Inglés", "Francés", "Alemán", "Ruso"];  // Columnas (0, 1, 2, 3)

// 2. Declaramos la matriz (3 filas x 4 columnas)
$alumnos = array();

// 3. Rellenamos la matriz con datos
// (En un caso real vendrían de una base de datos, aquí usamos aleatorios entre 5 y 30)
for ($fila = 0; $fila < 3; $fila++) {
    for ($columna = 0; $columna < 4; $columna++) {
        $alumnos[$fila][$columna] = rand(5, 30);
    }
}

// 4. MOSTRAR DATOS (Modo Lista)
echo "<h3>Listado de alumnos por Nivel e Idioma:</h3>";

for ($i = 0; $i < count($niveles); $i++) {     // Recorremos filas (Niveles)
    echo "<strong>Nivel " . $niveles[$i] . ":</strong><br>";
    echo "<ul>";
    
    for ($j = 0; $j < count($idiomas); $j++) { // Recorremos columnas (Idiomas)
        // Accedemos a la matriz usando [$i][$j]
        echo "<li>" . $idiomas[$j] . ": " . $alumnos[$i][$j] . " alumnos</li>";
    }
    
    echo "</ul>";
}

// 5. MOSTRAR DATOS (Modo Matriz visual)
echo "<hr>";
echo "<h3>Representación visual de la Matriz:</h3>";
echo "<table border='1' cellpadding='10' style='border-collapse: collapse; text-align: center;'>";

// Cabecera de la tabla (Idiomas)
echo "<tr style='background-color: #f2f2f2;'><th>Niveles \ Idiomas</th>";
foreach ($idiomas as $idioma) {
    echo "<th>$idioma</th>";
}
echo "</tr>";

// Cuerpo de la tabla
for ($i = 0; $i < 3; $i++) {
    echo "<tr>";
    // Primera celda de la fila es el nombre del nivel
    echo "<td style='background-color: #f2f2f2; font-weight: bold;'>" . $niveles[$i] . "</td>";
    
    // Celdas de datos
    for ($j = 0; $j < 4; $j++) {
        echo "<td>" . $alumnos[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>