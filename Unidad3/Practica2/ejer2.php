<?php
    $academia = array(
        array(1, 6, 3),
        array(14, 19, 13),
        array(8, 7, 4),
        array(3, 2, 1)
    );

    $filas = count($academia);
    $columnas = count($academia[0]); // devuelve el numero de elementos en ese subarray

    for($i = 0; $i <$columnas; $i++){
        for($j = 0; $j <$filas; $j++){
            echo $academia[$j][$i]. " ";
        }
        echo "<br>";
    }

?>