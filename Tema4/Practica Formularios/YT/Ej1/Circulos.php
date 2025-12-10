<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="datosCirculos.php" method="post">
        <input type="radio" name="figura" value="circulo"> Circulo <br>
        <input type="radio" name="figura" value="triangulo"> Triangulo <br>
        <input type="radio" name="figura" value="cuadrado"> Cuadrado <br>

        Radio: <input type="number" name="radio">
        Lado: <input type="number" name="lado">
        Base: <input type="number" name="base">
        Altura: <input type="number" name="altura">
        <br>
        <input type="submit">
    </form>

    <?php
    session_start();

    if(isset($_SESSION['resultado'])){
        echo "Resultado: ". $_SESSION['resultado'];
        session_destroy();
    }

    ?>
</body>
</html>