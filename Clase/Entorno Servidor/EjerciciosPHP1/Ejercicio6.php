<?php
//Ordena el array asociativo $estaturas en orden descendente de acuerdo al valor

$estaturas = [
    "Juan" => 186,
    "Alberto" => 172,
    "Marta" => 173
];
array_multisort($estaturas, SORT_DESC);

foreach ($estaturas as $item => $value){
    echo "$item:  $value cm<br>";
}
?>