<?php

/*
Crear un programa partir de 3 valores, a b y c que corresponden a los tres
coeficientes de una ecuación de segundo grado muestre las soluciones de la
misma La solución de la ecuación de segundo grado depende del signo de b2-4ac:
 si b2-4ac es negativo no hay soluciones
 si es nulo, hay sólo una solución -b/2a
 si es positivo, hay dos soluciones: (-b+sqrt(b2-4ac))/(2a) y (-bsqrt(b2-4ac))/(2a)
*/

// Evitamos que 'a' sea 0 usando un bucle o range, 
// porque si a=0 no es ecuación de 2º grado y daría error de división.
do {
    $a = rand(-10, 10);
} while ($a == 0);

$b = rand(-10, 10);
$c = rand(-10, 10);

// Es útil mostrar los números generados para comprobar el resultado
echo "Valores: a=$a, b=$b, c=$c <br><br>";

$operacion = ($b * $b) - (4 * $a * $c);

if ($operacion < 0) {
    echo ("No hay soluciones reales (discriminante negativo: $operacion)");
} elseif ($operacion == 0) {
    // Solución única
    echo ("Al ser nulo, la solución es: " . (-$b) / (2 * $a));
} else {
    echo ("Dos soluciones (discriminante: $operacion): <br>");
    
    // CORRECCIÓN: Usamos la variable $operacion que ya calculaste
    // SOLUCIÓN 1 (Suma)
    $solucion1 = ((-$b) + sqrt($operacion)) / (2 * $a);
    echo ("Primera solucion: " . $solucion1 . "<br>");
    
    // CORRECCIÓN: Cambiado el * por - en la fórmula
    // SOLUCIÓN 2 (Resta)
    $solucion2 = ((-$b) - sqrt($operacion)) / (2 * $a);
    echo ("Segunda solucion: " . $solucion2 . "<br>");
}
?>