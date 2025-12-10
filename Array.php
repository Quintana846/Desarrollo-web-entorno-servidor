<?php
// Ejemplo 1
    echo "<b>Ejemplo 1<br></b>";
    
    $personas = array(
                $persona1 = array(
                    'Nombre' => "Yolanda",
                    'Apellido1' => "Iglesias",
                    'Apellido2' => "Suarez"
                ),
                $persona2 = array(
                    'Nombre' => "Funko",
                    'Apellido1' => "Bomba",
                    'Apellido2' => "Amago"
                )
    );

    foreach($personas as $indice => $valor) //$valor = valor de un array de una persona completa
    {
        echo"Persona " .($indice + 1) .":<br>";
        foreach($valor as $clave => $dato){ // $valor = persona1, $clave = 'Nombre', 'Apellido1'..., $dato = 'Yolanda', 'Iglesias'
            echo"$clave: $dato<br>";
        }
        echo "<br>";
    }

// Ejemplo 2
    echo "<b><br><br>Ejemplo 2<br></b>";

    $gente = array(
        array(
            'Familia' => 'Los Simpson',
            'Padre' => 'Homer',
            'Madre' => 'Marge',
            'Hijos' => array('Bart', 'Lisa', 'Maggie')
        ),
        array(
            'Familia' => 'Los Griffin',
            'Padre' => 'Peter',
            'Madre' => 'Lois',
            'Hijos' => array('Chris', 'Meg', 'Stewie')
        )
    );

    foreach($gente as $indice => $valor){
        echo"Familia " .($indice + 1); 
        echo "<ul>";
        foreach($valor as $clave => $dato){
            if(is_array($dato)){
                echo "<li>$clave:<br></li>";
                foreach ($dato as $hijo) { 
                    echo "<ul><li>$hijo<br></li></ul>";
                }
                echo "<br>";
            } else {
                echo "<li>$clave: $dato<br></li>";
            }
        }
        echo "<br>";
        echo "</ul>";
    };

// Ejemplo 3
    echo "<b><br><br>Ejemplo 3<br></b>";
    $arrayNum = array(32, 85, 2, 76,56);
    $arrayString = array("Hola", "Adios", "Pepe", "Juan", "Perro", "Gato");

    sort($arrayString, SORT_STRING);
    sort($arrayNum, SORT_NUMERIC);

    echo "Array Numerico<br>";
    foreach($arrayNum as $num){
        echo $num ." ";
    }

    echo "<br>Array String<br>";
    foreach($arrayString as $string){
        echo $string ." ";
    }

// Ejemplo 4
    echo "<b><br><br>Ejemplo 4<br></b>";
    
    $cad = explode(' ', "Morenito tiene una buena correa");
    print_r($cad);

    echo "<br>";
    $cad2 = "Morenito tiene una buena correa";
    $letras = str_split($cad2);
    print_r($letras); 

    // Opcion 2
    /*    foreach($letras as $op2){
            echo $op2 ."<br>";
        }
    */

// Ejemplo 5 
    echo "<b><br><br>Ejemplo 5<br></b>";
    $ej5 = array("hola", 7, "mi", 2, "hola", "mario");
    print_r(array_count_values($ej5)); // array de valores a contar

?>