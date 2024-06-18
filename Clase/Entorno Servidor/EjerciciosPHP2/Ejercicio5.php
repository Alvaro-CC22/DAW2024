<?php
    //Write a PHP program to compute the sum of the digits of a number.
    $num = 14597 ;  
    $suma = 0; 
    $res = 0;  
    echo "La suma de ", $num, " es ";
    for ($i = 0; $i <= strlen($num);$i++)  
    {  
      $res = $num % 10;  
      $suma = $suma + $res;  
      $num = $num / 10;  
    }  

    echo $suma;
?>