<?php

/*
Crea el código PHP para inicializar los siguientes arrays y realizar las operaciones
indicadas.
a) Declara un array de enteros de nombre $coches e introduce en él 8 elementos
cuyos valores sean 32, 11, 45, 22, 78, -3, 9, 66, 5. A continuación muestra por
pantalla el elemento con localizador 5. Deberás obtener por pantalla que se
visualiza -3.
b) Declara un array de numéricos decimales tipo double de nombre $importe e
introduce en él cuatro elementos que sean 32.583, 11.239, 45.781, 22.237. A
continuación muestra por pantalla el elemento con localizador 1 y el 3..
c) Declara un array de booleanos de nombre $confirmado e introduce en él seis
elementos que sean true, true, false, true, false, false. A continuación muestra por
pantalla el elemento con localizador cero. Deberás obtener por pantalla que se
muestra “true”.
d) Declara un array de strings de nombre $jugador e introduce en él 5 elementos
que sean "Crovic", "Antic", "Malic", "Zulic" y "Rostrich". A continuación usando el
operador de concatenación haz que se muestre la frase: <<La alineación del
equipo está compuesta por Crovic, Antic, Malic, Zulic y Rostrich.>>
 */

$coches = [32,11,45,22,78, -3,9,66,5];
echo $coches[5];


// --- APARTADO B: Array de numéricos double ---

// Declaración del array
$importe = array(32.583, 11.239, 45.781, 22.237);

echo "<h3>Apartado B:</h3>";
// Muestra el elemento con localizador (índice) 1
echo "Elemento 1: " . $importe[1] . "<br>";

// Muestra el elemento con localizador (índice) 3
echo "Elemento 3: " . $importe[3] . "<br>";


// --- APARTADO C: Array de booleanos ---

// Declaración del array
$confirmado = array(true, true, false, true, false, false);

echo "<h3>Apartado C:</h3>";
// NOTA: En PHP, si haces 'echo true' se imprime un '1'. 
// Para que salga la palabra "true" literalmente como pide el ejercicio, 
// debemos hacer una conversión condicional.

echo "Elemento 0: ";
if ($confirmado[0] === true) {
    echo "true";
} else {
    echo "false";
}
echo "<br>";


// --- APARTADO D: Array de strings ---

/ Declaración del array
$jugador = ["Crovic", "Antic", "Malic", "Zulic", "Rostrich"];

// PASO 1: Extraemos el último elemento ("Rostrich") para tratarlo aparte
// array_pop saca el último elemento y lo elimina del array original
$ultimoJugador = array_pop($jugador);

// PASO 2: Unimos los elementos que quedan ("Crovic", "Antic"...) con comas
// implode() es la función estándar en PHP para "unir" arrays (igual que join)
$listaConComas = implode(", ", $jugador);

// PASO 3: Concatenamos todo con el texto final
echo "La alineación del equipo está compuesta por " . $listaConComas . " y " . $ultimoJugador . ".";


?>