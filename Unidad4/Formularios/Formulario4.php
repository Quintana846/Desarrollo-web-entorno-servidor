<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 4</title>
</head>
<body>
    <?php // si no se enviaron los datos muestra el formulario
        if($_SERVER["REQUEST_METHOD"] != "POST"){
    ?>
    <form action = "Formulario4.php" method = "post">
        <!--Nombre-->
            <label for="nombre">Nombre:</label>
            <input type ="text" name="nombre"><br>
        <!--Apellidos-->
            <label for="apellidos">Apelldios:</label>
            <input type ="text" name="apellidos"><br>
        <!--Edad-->
            <label for="edad">Edad:</label>
            <input type ="number" name="edad" id="edad" min="0" max="110"><br>
        <!--Profesion-->
            <label for="profesion">Profesion:</label>
            <select name="profesion" id="profesion">
                <option value="" selected disabled>--Seleccione una Opcion--</option>
                <option value="Informatico">Informatico</option>
                <option value="Medico">Medico</option>
                <option value="Policia">Policia</option>
                <option value="Bombero">Bombero</option>
                <option value="Mecanico">Mecanico</option>
            </select><br>
        <!--Sexo-->
            <label for="sexo">Sexo:</label>
            <input type ="radio" name="sexo" value="Hombre">Hombre
            <input type="radio" name="sexo" value="Mujer">Mujer<br>
    <!--Navegador Usado-->
            <label for="navegador">Navegador Usado:</label>
            <input type="checkbox" name="navegador[]" value="Chrome">Chrome
            <input type="checkbox" name="navegador[]" value="Safari">Safari
            <input type="checkbox" name="navegador[]" value="Opera">Opera<br>
    <!--Enviar-->
        <input type="submit" value="Enviar">
    </form>

<!--PHP-->
    <?php // si se enviaron muestra las respuestas 
        } else{
            echo "<h2>Datos Introducidos: </h2>";
            echo "Nombre: " .$_POST["nombre"] ."<br>";
            echo "Apellidos: " .$_POST["apellidos"] ."<br>";
            echo "Edad: " .$_POST["edad"] ."<br>";
            echo "Profesion: " .$_POST["profesion"] ."<br>";
            echo "Sexo: " .$_POST["sexo"] ."<br>";

            if(isset($_POST["navegador"])){
                echo "Navegador Usado: " . implode(", ", $_POST["navegador"]) . "<br>";
            }  
        }      
    ?>

</body>
</html>