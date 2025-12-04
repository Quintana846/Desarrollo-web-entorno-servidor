<?php
    function pintarCirculos($colores){
        echo "<div style='display: flex; margin-top: 20px;'>"; // contenedor para crear los circulos
        foreach($colores as $color){
            echo "<div style='width:90px; height:90px; border-radius:50%; background-color:$color; margin:10px; border: 1.5px solid #000;'></div>";
            // por cada valor de colores (almacenado en color) se imprime un circulo coloreado y separado por margin
        }
        echo "</div>";
    }   
?>