<?php

session_start();

$valor = $_POST['valor'];

if(!empty($_POST['valores'])){
    $valores = explode(" ,". $_POST['valores']);
} else {
    $valores = [];
}

array_push($valores, $valor);

$_SESSION['data'] = $valores;

foreach ($valores as $key => $value) {
    echo $value ."<br>";
}

?>

<a href="index.php">Volver</a>