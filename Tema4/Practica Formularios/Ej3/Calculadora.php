<?php
// Inicializamos variables vacías para la primera ejecución
$num1 = "";
$num2 = "";
$resultado = "";

// Verificamos si se ha enviado el formulario
if (isset($_POST['op'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacion = $_POST['op'];

    // Validamos que sean números para evitar errores
    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operacion) {
            case 'Suma':
                $resultado = "$num1 + $num2 = " . ($num1 + $num2);
                break;
            case 'Resta':
                $resultado = "$num1 - $num2 = " . ($num1 - $num2);
                break;
            case 'Mult':
                $resultado = "$num1 * $num2 = " . ($num1 * $num2);
                break;
            case 'Divsion': // Mantenemos tu "typo" del name, pero cuidado
                if ($num2 != 0) {
                    $resultado = "$num1 / $num2 = " . ($num1 / $num2);
                } else {
                    $resultado = "Error: No se puede dividir por cero.";
                }
                break;
        }
    } else {
        $resultado = "Por favor, introduce valores numéricos válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora PHP</title>
</head>
<body>

    <?php if ($resultado != ""): ?>
        <h3>Resultado: <?php echo $resultado; ?></h3>
    <?php endif; ?>

    <form action="Calculadora.php" method="post">
        A: <input type="number" name="num1" value="<?php echo $num1; ?>" required>
        B: <input type="number" name="num2" value="<?php echo $num2; ?>" required><br><br>
        
        <input type="submit" name="op" value="Suma">
        <input type="submit" name="op" value="Resta">
        <input type="submit" name="op" value="Mult">
        <input type="submit" name="op" value="Divsion">
    </form>

</body>
</html>