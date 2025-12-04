<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon Dice</title>
</head>
<body>
    <h1>Simón</h1>
    <?php
        session_start();
        require_once 'pintarCirculos.php';

        $colores = ["red", "blue", "yellow", "green", "purple", "brown", "pink", "orange"];

        // Se guarda el color que eligio el usuario
        foreach($colores as $color){
            if(isset($_POST[$color])){
                $_SESSION["intentos"][] = $color;
            }
        }

        $intentos = $_SESSION["intentos"];
        $solucion = $_SESSION["solucion"];

        $mostrar = array_fill(0, count($solucion), "black");
        for($i = 0; $i < count($intentos); $i++){
            $mostrar[$i] = $intentos[$i];
        }

        pintarCirculos($mostrar);

        // Envia la solucion sin boton
        if(count($intentos) >= count($solucion)){ // >= comprueba si $intentos es igual o mayor a $solucion
            if($intentos === $solucion){
                header("Location: acierto.php");
                exit;
            } else {
                header("Location: fallo.php");
                exit;
            }
        }      
    ?>

    <p>Pulsa los Botones en el Orden Correcto: </p>
    <form action="jugar.php" method="post">
        <button type="submit" name="red" style ="background-color:red; color:white; width:75px; height:35px; border-radius: 2px">ROJO</button>
        <button type="submit" name="blue" style ="background-color:blue; color:white; width:75px; height:35px; border-radius: 2px">AZUL</button>
        <button type="submit" name="yellow" style ="background-color:yellow; color:black; width:80px; height:35px; border-radius: 2px">AMARILLO</button>
        <button type="submit" name="green" style ="background-color:green; color:white; width:75px; height:35px; border-radius: 2px">VERDE</button>
        <button type="submit" name="purple" style ="background-color:purple; color:white; width:75px; height:35px; border-radius: 2px">MORADO</button>
        <button type="submit" name="brown" style ="background-color:brown; color:white; width:75px; height:35px; border-radius: 2px">MARRON</button>
        <button type="submit" name="pink" style ="background-color:pink; color:black; width:75px; height:35px; border-radius: 2px">ROSA</button>
        <button type="submit" name="orange" style ="background-color:orange; color:white; width:75px; height:35px; border-radius: 2px">NARANJA</button>
    </form>
    <!--
    <form action="jugar.php" method="post" >
        <br><input type="submit" name="comprobar" value="COMPROBAR">
    </form>
    -->
</body>
</html>