<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Binario</title>
</head>
<body>
    <h1>Adivina el Juego en Binario</h1>
    <?php
        session_start();
        $binario = [];
        for ($i = 0; $i <= 3; $i++) {
            $num = rand(0, 1);
            $binario[$i] = $num;
        }

        $_SESSION["binario"] = $binario; //guarda en sesion

        echo "El número binario generado es: " . implode("", $binario) ."<br><br>"; // .implode devuelve los 4 numeros del array como un string
        foreach ($binario as $i => $bin){
            switch($i){
                case 0:
                    $img = ($bin == 1) ? "Imagenes/Rombo8.jpg" : "Imagenes/Negri.JPG";
                    break;
                case 1:
                    $img = ($bin == 1) ? "Imagenes/Rombo4.jpg" : "Imagenes/Negri.JPG";
                    break;
                case 2:
                    $img = ($bin == 1) ? "Imagenes/Rombo2.jpg" : "Imagenes/Negri.JPG";
                    break;
                case 3:
                    $img = ($bin == 1) ? "Imagenes/Rombo1.jpg" : "Imagenes/Negri.JPG";
                    break; 
            }
            echo "<img src='$img' width='80' height='100'> ";
        }
    ?>
    <form action = "binario.php" method = "post">
        <label for="num">Introduce el numero en decimal:</label>
        <input type ="number" name="num"><br>

        <input type="submit" value="Comprobar">
    </form>
</body>
</html>