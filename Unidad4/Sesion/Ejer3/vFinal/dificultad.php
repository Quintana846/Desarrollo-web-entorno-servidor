<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simón</title>
</head>
<body>
    <form action="inicio.php" method="post">
        <!-- Control de Círculos -->
        <label for="num">Círculos:</label><br>
        <button type="button"
            onclick="num.value = Math.max(4, parseInt(num.value) - 1); numSlider.value = num.value; numOut.value = num.value;">◀</button>
            <!--
                parseInt(num.value) -> convierte el valor actual a num entero
                Math.max(4,..) -> asegura valor nunca baje de 4
                Math.min(8,..) -> asegura valor nunca suba de 8
                Se sincroniza 3 elementos:
                    num.value 
                    numSlider.value
                    numOut.value
            -->
        <input type="number" id="num" name="num" min="4" max="8" value="6" readonly> <!--readonly -> solo lectura-->

        <button type="button"
            onclick="num.value = Math.min(8, parseInt(num.value) + 1); numSlider.value = num.value; numOut.value = num.value;">▶</button>

        <br><input type="range" id="numSlider" name="numSlider" min="4" max="8" value="6" oninput="num.value = this.value; numOut.value = this.value">
        <output id="numOut">6</output>

        <!-- Control de Colores -->  
        <label for="numColores"><br><br>Colores:</label><br>
        <button type="button"
            onclick="numColores.value = Math.max(4, parseInt(numColores.value) - 1); colSlider.value = numColores.value; colOut.value = numColores.value;">◀</button>
        
            <input type="number" id="numColores" name="numColores" min="4" max="8" value="6" readonly>
        
        <button type="button"
            onclick="numColores.value = Math.min(8, parseInt(numColores.value) + 1); colSlider.value = numColores.value; colOut.value = numColores.value;">▶</button>

        <br><input type="range" id="colSlider" name="colSlider" min="4" max="8" value="6" oninput="numColores.value = this.value; colOut.value = this.value">
        <output id="colOut">6</output>

        <br><br><input type="submit" value="VAMOS A JUGAR">
    </form>
</body>
</html>
