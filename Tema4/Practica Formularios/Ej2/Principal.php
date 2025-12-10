<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Resultado.php" method="post">

        <input type="radio" name="opcion_edad" value="13" required> menos de 14 años<br>
        <input type="radio" name="opcion_edad" value="18"> entre 15 y 20 años<br>
        <input type="radio" name="opcion_edad" value="30"> entre 21 y 40 años<br>
        <input type="radio" name="opcion_edad" value="50"> entre 41 y 60 años<br>
        <input type="radio" name="opcion_edad" value="70"> mas de 60 años<br>
        <br>
        <input type="submit" value="enviar">

    </form>
</body>
</html>