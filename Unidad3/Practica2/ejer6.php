<?php
    $matriz = [];
    $mayor = 0;
    // Cargar la matriz
    for($i = 0; $i <4; $i++){
        for($j = 0; $j <5; $j++){
            $matriz[$i][$j] = rand(100, 1000);
            echo $matriz[$i][$j] ."\n";

            if($matriz[$i][$j] > $mayor){ 
                $mayor = $matriz[$i][$j];
                $fila = $i +1;
                $columna = $j +1;
            }
        }
        echo "<br>";
    }

    echo "<br>El numero mayor es: " .$mayor;
    echo "<br>Esta en la fila: " .$fila;
    echo "<br>Esta en la columna: " .$columna;
?>