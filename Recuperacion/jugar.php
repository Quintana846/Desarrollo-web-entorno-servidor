<?php
session_start();
require_once 'login.php';


// Si el usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
if (!isset($_SESSION["nombre"])) {
    header("Location: entrada.php");
    exit();
}

// Inicialización de la partida si no existe

if (!isset($_SESSION["numtirada"])) {

    $frutabase = array('fruta0.png','fruta1.png','fruta2.png','fruta3.png');
    $_SESSION["fruta"] = $frutabase;
    $_SESSION["combinacion"] = [];
    $_SESSION["numtirada"] = 0;
    $_SESSION["puntos"] = 0;

}

if (isset($_POST["tirada"])) {
            
            $_SESSION["numtirada"]++; // Incrementar en una unidad las cartas levantadas
            $_SESSION["girar"] = true;

        }

if(isset($_POST["cobrar"])){

    $stmt = $conn->prepare("UPDATE jugadores SET puntos = puntos +  ? , extra = extra + ? WHERE nombre = ?");
    $stmt->bind_param("iis", $_SESSION["puntos"], $_SESSION["numtirada"], $_SESSION["nombre"]);
    $stmt->execute();
    $stmt->close();

    if($_SESSION["puntos"] >= 0){
        $_SESSION["resultado"] = true;
        header("Location: resultado.php");
        exit();
    }
    $_SESSION["resultado"] = false;
    header("Location: resultado.php");
    exit();
}

    if(!isset($_POST["tirada"])){
        $_SESSION["pintar"] = false;
    } else if($_SESSION["girar"]) {
        $_SESSION["pintar"] = true;
            for ($i=0; $i < 3; $i++) { 
            $numrandom = rand(0,3);
            $_SESSION["combinacion"][$i] = $_SESSION["fruta"][$numrandom];
        }
        $iguales = 0;
        for ($i=0; $i < 3; $i++) { 
            for ($j=0; $j < 3; $j++) { 
                if($i == $j){
                    break;
                } else if($_SESSION["combinacion"][$i] == $_SESSION["combinacion"][$j]){
                    $iguales++;
                }
                
            }
        }
    switch ($iguales) {
        case 0:
            $_SESSION["puntos"] = $_SESSION["puntos"] - 1;
            break;

        case 1:
            $_SESSION["puntos"] = $_SESSION["puntos"] + 5;
            break;

        case 2:
            $_SESSION["puntos"] = $_SESSION["puntos"] + 10;
            break;

        default:
            break;
    }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar</title>
</head>
<style>
            button {
            margin: 5px;
            padding: 5px;
            font-size: 16px;
        }
        img {
            margin: 2px;
            padding: 5px;
            height: 300px;
            width: 540px;
        }
</style>
<body>
    <h1>Bienvenid@, <?php  echo htmlspecialchars($_SESSION["nombre"]); ?> </h1>
    <h2>Puntos ganados en esta partida: <?php echo $_SESSION["puntos"]; ?> </h2>
    <p>Tiradas: <?php echo $_SESSION["numtirada"] ?></p> 
    
    <?php
        if($_SESSION["pintar"] === false){
            for ($i=0; $i < 3; $i++) { 
            echo "<img src='cubierta.png' alt='cubierta de la foto'>";
        }
        } else {
        if(isset($_SESSION["girar"])){
        for ($i=0; $i < 3; $i++) { 
            echo "<img src='".$_SESSION['combinacion'][$i]. "' alt='cubierta de la foto'>";
        } }
        }
        

    ?>

    <form action="jugar.php" method="post">
        <button type="submit" name="tirada">Girar Máquina</button>
        <button type="submit" name="cobrar">Cobrar</button>
    </form>
</body>
</html>