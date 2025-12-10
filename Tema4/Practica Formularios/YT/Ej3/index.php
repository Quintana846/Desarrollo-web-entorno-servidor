<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

session_start();

if(!isset($_SESSION['alumnos'])){
    $_SESSION['alumnos'] = [];
}

if(isset($_POST['insertar'])){

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];

    $alumno = [
        "dni" => $dni,
        "nombre" => $nombre,
        "apellido1" => $apellido1,
        "apellido2" => $apellido2
    ];

    if(isset($_SESSION['alumnos'][$dni])){
        echo "Se ha modificado el alumno con DNI:". $dni;
    } else {
        echo "Se ha creado el nuevo alumno";
        }

    $_SESSION['alumnos'][$dni] = $alumno;

    
} else if(isset($_POST['vaciar'])){

}


?>

    <form action="" method="post">
        DNI: <input type="text" name="dni"> <br>
        Nombre: <input type="text" name="nombre"> <br>
        Apellido1: <input type="text" name="apellido1"> <br>
        Apellido2: <input type="text" name="apellido2"> <br>

        <button type="submit" name="insertar" >Insertar</button>
        <button type="submit" name="mostrar" >Mostrar</button>
        <button type="submit" name="vaciar" >Vaciar</button>
        <button type="submit" name="volcar" >Volcar</button>

    </form>

    <?php

    if(isset($_POST['mostrar'])){

    foreach ($_SESSION['alumnos'] as $alumno => $dni) {
        echo "Info alumno: ". $dni['nombre'] ."<br>";
        foreach ($dni as $campo => $value) {
            echo $campo .": ". $value ."<br>";
        } echo "<br>";
    }
}



?>
</body>
</html>