<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simón (solo HTML)</title>
</head>
<body>
    <h1>Simón</h1>
    <form action="inicio.php" method="post">
        <!-- Control de Círculos -->
        <label for="num">Círculos:</label><br>
        <input type="number" id="num" name="num" min="4" max="8" value="6"><br>
        <input type="range" id="numSlider" name="numSlider" min="4" max="8" value="6"><br><br>

        <!-- Control de Colores -->
        <label for="numColores">Colores:</label><br>
        <input type="number" id="numColores" name="numColores" min="4" max="8" value="6"><br>
        <input type="range" id="colSlider" name="colSlider" min="4" max="8" value="6"><br><br>

        <!-- Botón para enviar -->
        <input type="submit" value="VAMOS A JUGAR">
    </form>
</body>
</html>
