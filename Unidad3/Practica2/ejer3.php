<?php
    $numPar = [];
    for($i = 0; $i <= 20; $i+=2){
        $num = $i;
        $numPar[] = $num;
    }
    foreach($numPar as $j){
        echo $j ."<br>";
    }
?>