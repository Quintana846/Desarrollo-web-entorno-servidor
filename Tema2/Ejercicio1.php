<?php
/*
Dados 2 números asignados dentro del código a variables realizar el siguiente
cálculo: si son iguales que los multiplique, si el primero es mayor que el segundo
que los reste y si no que los sume. Mostrar el resultado en pantalla.
*/

$num1 = random_int(1, 100);
$num2 = random_int(1, 100);

echo ($num1." y ");
echo ($num2."<br>");

switch ($num1>$num2) {
    case true:
        echo (" Restar: ".$num1-$num2);
        break;
    
    default:
       echo ("Sumar: ".$num1+$num2);
        break;
}

?>