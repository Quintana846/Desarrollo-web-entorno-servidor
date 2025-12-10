<?php

/*
Repite el ejercicio anterior pero ahora si se han de crear índices asociativos,
ejemplo:
El índice del array que contiene como valor Madrid es MD. 
*/


// 1. Crear el array sin asignar índices manualmente
$ciudades = [
    "Madrid" => "MD", 
    "Barcelona" => "BCL", 
    "Londres" => "LND", 
    "New York" => "NY", 
    "Los Ángeles" => "LA", 
    "Chicago" => "CHG"];

// 2. Recorrer el array mostrando índice y valor
foreach ($ciudades as $indice => $nombre) {
    echo "La ciudad con el índice $indice tiene el nombre de $nombre <br>";
}
?>