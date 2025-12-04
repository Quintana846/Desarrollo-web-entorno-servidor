<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simón</title>
</head>
<body>
    <h1>Simón</h1>
    <form action="inicio.php" method="post">
        <label for="num">Elige el numero de circulos:</label>
        <select name="num" id="num">
            <?php // Hacer option sin ir escribiendolo uno a uno 
                for($i = 4; $i <= 8; $i++){
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>
        <br><br><label for="numColores">Elige el numero de colores:</label>
        <select name="numColores" id="numColores">
            <?php // Hacer option sin ir escribiendolo uno a uno 
                for($j = 4; $j <= 8; $j++){
                    echo "<option value='$j'>$j</option>";
                }
            ?>
        </select>
        <br><br><input type="submit" value="VAMOS A JUGAR">
    </form>
</body> 
</html>