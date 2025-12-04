<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion 2</title>
</head>
<body>
    <?php // si no se enviaron los datos muestra el formulario
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $_SESSION["name"] = $_POST["name"]; 
        }
    ?>

    <form action = "Sesion3.php" method = "post">
    <!--Nombre-->
            <label for="j1">Jugador 1:</label>
            <input type ="text" name="j1"><br>

            <label for="j2">Jugador 2:</label>
            <input type ="text" name="j2"><br>

            <label for="j3">Jugador 3:</label>
            <input type ="text" name="j3"><br>
    <!--Jugar-->
        <input type="submit" value="Ver">
    </form>
</body>
</html>