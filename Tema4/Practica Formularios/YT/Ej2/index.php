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
        if(!isset($_SESSION['data'])){
            $_SESSION['data'] = [];
        }


    ?>

    <form action="mostrarArray.php" method="post">
        Valor: <input type="text" name="valor"><br>
        <input type="submit" value="Añadir al array">
        <input type="text" name="valores" value="<?php echo implode(' ,'. $_SESSION['data']) ?>">

        
    </form>
</body>
</html>