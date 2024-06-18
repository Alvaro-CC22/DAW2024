<?php
    //Write a PHP program to remove duplicates from a sorted list.
    //Input: (1,1,2,2,3,4,5,5)
    //Output: (1,2,3,4,5)
    $lista = array(1,1,2,2,3,3,4,5,5);
    $listaLimpia = array();
    echo "Lista: ";
    for($i = 0; $i < sizeof($lista); $i++){
        if($i == sizeof($lista) - 1){
            echo $lista[$i];
        }
        else{
            echo $lista[$i], ", ";
        }
    }

    echo "<br>";

    for($i = 0; $i < sizeof($lista); $i++){
        if($i > 0){
            if($lista[$i] != $lista[$i - 1]){
                array_push($listaLimpia, $lista[$i]);
            }
        }else{
            array_push($listaLimpia, $lista[$i]);
        }
    }
    echo "Lista sin repetidos: ";
    for($i = 0; $i < sizeof($listaLimpia); $i++){
        if($i == sizeof($listaLimpia) - 1){
            echo $listaLimpia[$i];
        }
        else{
            echo $listaLimpia[$i], ", ";
        }
    }
?>