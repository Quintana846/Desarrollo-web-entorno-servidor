<?php

// 1. Crear el array sin asignar índices manualmente
$ciudades = ["Madrid", "Barcelona", "Londres", "New York", "Los Ángeles", "Chicago"];

// 2. Recorrer el array mostrando índice y valor
foreach ($ciudades as $indice => $nombre) {
    echo "La ciudad con el índice $indice tiene el nombre de $nombre <br>";
}

?>