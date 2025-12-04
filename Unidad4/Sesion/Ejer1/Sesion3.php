<?php
    session_start();
    $_SESSION["j1"] = $_POST["j1"] ;      
    $_SESSION["j2"] = $_POST["j2"] ;
    $_SESSION["j3"] = $_POST["j3"] ;
    echo "Buenos dias " . $_SESSION["name"] .", los jugadores que has elegido son " .$_SESSION["j1"] . ", " . $_SESSION["j2"] . " y " . $_SESSION["j3"] . ".<br>"; 
?>