<!--Formulario Dinamico-->
<!--
    '' no interpreta variables
    "" si interpreta variables
-->
<?php
    $tope = isset($_POST['tope']);
    // isset comprueba si las variables existen y no son nulas
    if(isset($_POST['num'])){
        $numeros = $_POST['num'];
        foreach($numeros as $index => $valor){
            echo "El numero ".($index+1) . " es: " .$valor ."<br>";
        }
    } else {
        echo <<<END
            <html>
                <body>
                    <form action="Formulario3.php" method="post">
END;
                    for($i = 1; $i <=$_POST['tope']; $i++){
                        echo '<label for="num' . $i . '">Número ' . $i . ':</label>';
                        echo '<input type="number" id="num' . $i . '" name="num[]" placeholder="Ingresa el Número :" required><br>';
                                                        //name="num[]" array de valores que se almacenan en $_POST['num']
                    }
        echo <<<END
                        <input type="submit" value="Enviar">
                    </form>
                </body>
            </html>
END;
    }
?>