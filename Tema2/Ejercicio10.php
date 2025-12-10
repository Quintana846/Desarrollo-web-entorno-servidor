<?php

/*

Generar todos los pares de números formados por combinaciones de dígitos del 1
al 9, siendo además los dos componentes del par distintos.

*/

/*$array = [
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
];

foreach ($array as $key => $value) {
    echo "Clave: $key => Valor: $value\n";
}
*/
$array2 = [
    "one" => [1,4,8],
    "two" => [1,300,8],
    "three" => [45,4,87],
    "seventeen" => [146,2,86]
];

foreach ($array2 as $clave => $valor){
    echo "<br>Nombre: $clave <br>";
    foreach($valor as $content){
        echo "Valores: ". $content ." ";
    }
}

?>