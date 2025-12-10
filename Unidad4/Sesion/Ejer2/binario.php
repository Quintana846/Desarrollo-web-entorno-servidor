<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    $_SESSION["num"] = $_POST["num"] ;

    // Recupera el binario desde la sesion
    $binario = $_SESSION["binario"];
    $binarioN = implode("", $binario);

    $decimal = bindec($binarioN); // convierte el binario a decimal 

    if($_SESSION["num"] == $decimal){
        echo "Correcto, el numero ".$_SESSION ["num"]. " en binario es: ". $binarioN;
    } else{
        echo "Incorrecto, el numero ".$_SESSION["num"]. " NO es en binario ".$binarioN .", el numero correcto es: ".$decimal;
    }
    ?>
    <br><a href="juegoBinario.php" title="Ir la página anterior">Volver</a>
</body>
</html>
