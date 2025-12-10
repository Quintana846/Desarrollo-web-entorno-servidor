<?php

/*
Crea un array multidimensional para poder guardar los componentes de dos
familias: “Los Simpson” y “Los Griffin” dentro de cada familia ha de constar el
padre, la madres y los hijos, donde padre, madre e hijos serán los índices y los
índices y los nombres serán los valores. Esta estructura se ha de crear en un solo
array asociativo de tres dimensiones.
Muestra los valores de las dos familias en una lista no numerada.
*/



// 1. Definición del array multidimensional (Tu estructura estaba perfecta)
$familias = [
    "Los Simpson" => [
        "Padre" => "Homer",
        "Madre" => "Marge",
        "Hijos" => ["Bart", "Lisa", "Maggie"]
    ],
    "Los Griffin" => [
        "Padre" => "Peter",
        "Madre" => "Lois",
        "Hijos" => ["Chris", "Meg", "Stewie"]
    ],
];

// 2. Mostrar los datos
echo "<ul>"; // Abrimos la lista principal de familias

foreach($familias as $nombreFamilia => $datos) {
    // $nombreFamilia = "Los Simpson"
    echo "<li><strong>$nombreFamilia:</strong>"; 
    
    echo "<ul>"; // Abrimos sub-lista para los integrantes
    
    // Aquí está el truco: recorremos los datos obteniendo la CLAVE ($rol)
    foreach($datos as $rol => $valor) {
        
        // Comprobamos si el valor es un array (Caso de "Hijos")
        if (is_array($valor)) {
            echo "<li>$rol:"; // Imprime "Hijos:"
            
            echo "<ul>"; // Abrimos sub-lista para los nombres de los hijos
            foreach($valor as $hijo) {
                echo "<li>$hijo</li>";
            }
            echo "</ul>";
            
            echo "</li>";
        } else {
            // Caso normal (Padre y Madre), el valor es solo texto
            echo "<li>$rol: $valor</li>"; 
        }
    }
    
    echo "</ul>"; // Cerramos lista de integrantes
    echo "</li><br>";
}

echo "</ul>"; // Cerramos lista principal



?>