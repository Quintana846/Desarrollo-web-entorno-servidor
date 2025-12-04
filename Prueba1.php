<?php
// Ejemplo 1
    echo "Ejemplo 1<br>";
    $paper[] = "Copier";
    $paper[] = "Inkjet";
    $paper[] = "Laser";
    $paper[] = "Photo";
    
    print_r($paper); 
    echo "<br>";
    var_dump($paper);

    $longuitud = count($paper);
    echo "<br>$longuitud";

// Ejemplo 2
    echo "<br><br>Ejemplo 2<br>";
    $paper['copier'] = "Copier & Multipurpose";
    $paper['inkjet'] = "Inkjet Printer";
    $paper['laser'] = "Laser Printer";
    $paper['photo'] = "Photographic Paper";

    echo $paper['inkjet'];
    echo "<br>";
    var_dump ($paper['photo']);

// Ejemplo 3
    echo "<br><br>Ejemplo 3<br>";
    $paper = array("Copier", "Inkjet", "Laser", "Photo");
    foreach($paper as $indice => $valor)
    {
        echo "$indice: $valor<br>";
    }

    for($i = 1; $i <= 5; $i++){
        echo "Hello World <br>"; 
        echo $i;
    }

// Arrays
    $animales = array( // 1º Array que dentro tiene a: 
                    array( // Array dentro del primer array (Amarillo)
                        // Arrays dentro del array (Morado) que a su vez esta dentro del array amarillo
                        array("Kevin", "Tobby"),

                        array("Pepito", "Nomavi")
                    ),

                    array( // Array dentro del primer array (Amarillo)
                        // Arrays dentro del array (Morado) que a su vez esta dentro del array amarillo
                        array("Misfu", "Minguito"),
                    
                        array("Bigotes", "Sebastian")
                    )
    );
    
// Redondeo 
    echo "<br> <br>";
    $valor_redondear = 50.525;
    
    $var_up = round($valor_redondear, 2, PHP_ROUND_HALF_UP);
    echo "<br>Redondea el valor alejandose de cero cuando esta a mitad de camino <br>";
    echo "El numero redondeado es: $var_up <br>";

    $var_down = round($valor_redondear, 2, PHP_ROUND_HALF_DOWN);
    echo "<br>Redondea el valor acercandose a cero cuando esta a mitad de camino <br>";
    echo "El numero redondeado es: $var_down <br>";

    $var_even = round($valor_redondear, 2, PHP_ROUND_HALF_EVEN);
    echo "<br> Redondea el valor par mas cercano cuando esta a mitad de camino <br>";
    echo "El numero redondeado es: $var_even";
?>