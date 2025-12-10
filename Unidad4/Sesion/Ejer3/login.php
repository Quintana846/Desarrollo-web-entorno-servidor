<?php
    $hn = 'localhost';
    $db = 'bdsimon';
    $un = 'root';
    $pw = '';   

    // Conexion a Base De Datos MySQL
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db); //Orden: servidor, usuario, contraseña y base de datos
    if($conn->connect_error) die ("Fatal Error"); // Comprueba si se puede hacer la conexion

    $query = "SELECT * FROM usuarios";
    $result = $conn->query($query);
    if (!$result) die("Fatal Error");
    $rows = $result->num_rows;

    for ($j = 0 ; $j < $rows ; ++$j){
        $result->data_seek($j);

        echo '<br>Codigo: ' .htmlspecialchars($result->fetch_assoc()['Codigo']) .'<br>';
        $result->data_seek($j);

        echo 'Nombre: ' .htmlspecialchars($result->fetch_assoc()['Nombre']) .'<br>';
        $result->data_seek($j);

        echo 'Clave: ' .htmlspecialchars($result->fetch_assoc()['Clave']) .'<br>';
        $result->data_seek($j);
    } 

    $result->close();
    $conn->close(); 
?>
