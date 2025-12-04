<?php
    $matriz = [];
    // Cargar la matriz
    for($i = 0; $i <3; $i++){
        for($j = 0; $j <5; $j++){
            $matriz[$i][$j] = rand(1, 100);
        }
    }

    // Mostrar el array por columnas
    echo "Matriz 3x5 (por columnas)<br>";

    $filas = count($matriz);
    $columnas = count($matriz[0]); 

    for($i = 0; $i <$columnas; $i++){
        for($j = 0; $j <$filas; $j++){
            echo $matriz[$j][$i] ."\n";
        }
        echo "<br>";
    }

    // Mostrar el array por filas
    echo "Matriz 3x5 (por filas)<br>";
    for($i = 0; $i < 3; $i++){
        for($j = 0; $j <$columnas; $j++){
            echo $matriz[$i][$j] ."\n";
        }
        echo "<br>";
    }
?>
