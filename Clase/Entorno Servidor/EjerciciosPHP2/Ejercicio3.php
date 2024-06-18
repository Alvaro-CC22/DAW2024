<?php
    //Write a PHP program to compute the sum of the prime numbers less than 100.
    //Note: There are 25 prime numbers are there in less than 100.
    //2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97 and
    //sum of all these numbers is 1060.
    $suma = 0;
    $div = 0;

    for($i = 2; $i < 100; $i++){
        $div = 0;
        for($j = 1; $j < $i; $j++){
            if($i % $j == 0){
                $div++;
            }
        }
        if($div == 1){
            echo $i, ".", "<br>";
            $suma = $suma + $i;
        }
    }

    echo $suma;
?>