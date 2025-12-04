<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>AGENDA</h1>
    <!-- Inicio -->
    <?php
        session_start();
        echo "Hola " .$_SESSION["nombre"] ." cuantos usuarios deseas grabar?";
        echo "<br>Puedes grabar entre 1 y 5. Por cada pulsacion en INCREMENTAR grabaras un usuario mas.";
        echo "<br>Cuando el número sea el deseado pulsa GRABAR.<br>";

        $imagenes = [
            1 => 'imagenes/OIP0.jfif',
            2 => 'imagenes/OIP1.jfif',
            3 => 'imagenes/OIP2.jfif',
            4 => 'imagenes/OIP3.jfif',
            5 => 'imagenes/OIP4.jfif'
        ];
        $incre = array_rand($imagenes);
        echo $incre;
    ?>

    <!-- Botones -->
    <form methop="post">
        <input type="submit" name="incrementar" value="INCREMENTAR">
        <input type="submit" name="grabar" value="GRABAR">
    </form>
</body>
</html>