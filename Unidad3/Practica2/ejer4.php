<?php
    $matriz = [];
    for($i = 0; $i <4; $i++){
        for($j = 0; $j <4; $j++){
            $matriz[$i][$j] = rand(1,100);
        }
    }

    echo "Matriz 4x4<br>";
    for($i = 0; $i <4; $i++){
        for($j = 0; $j <4; $j++){
          //echo str_pad($matriz[$i][$j], 4, " ", STR_PAD_LEFT);
            echo $matriz[$i][$j] ."\n";
        }
        echo "<br>";
    }

    echo "<br>Diagonal Principal: "; // Matriz principal Posicion = 1,1 2,2 3,3 4,4
    for($i = 0; $i < 4; $i++){
        echo $matriz[$i][$i] ."\n";
    }

    echo "<br>Diagonal Secundaria: "; // Matriz secundaria Posicion = 1,4 2,3 3,2 4,1
    for($i = 0; $i < 4; $i++){
        $diagonalSe = $matriz[$i][3 - $i];
        echo $diagonalSe ."\n";
    }
?>