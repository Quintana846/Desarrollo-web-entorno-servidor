<?php

    // Recogemos los valores enviados por el formulario usando los "name" definidos en el HTML
    // Usamos $_POST porque el método del formulario es POST
    $a = $_POST['numero_a'];
    $b = $_POST['numero_b'];

    // Realizamos la operación matemática
    $resultado = $a + $b;

    // Mostramos el resultado con el formato exacto de la imagen
    echo "la suma de $a + $b es $resultado";

?>