<?php
    // (A)
    $coches = array(32, 11, 45, 22, 78, -3, 9, 66, 5);
    echo "$coches[5]<br>";

    // (B)
    $importe = array(32.583, 11.239, 45.781, 22.237);
    echo "$importe[1], $importe[3]<br>";

    // (C)
    $confirmado = array(true, true, false, true, false, false);
    echo $confirmado[0]? 'true' : 'false<br>';
   /* 
        if ($confirmado = 1){
            echo "true";
        } else {
            echo "false";
        }
    */

    // (D)
    $jugador = array("Crovic", "Antic", "Malic", "Zulic", "Rostrich");
    echo "<br>La alineacion del equipo esta compuesta por ";
    foreach($jugador as $i){
        echo $i ." ";
    }
?>