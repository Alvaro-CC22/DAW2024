<?php
//Ordena el array asociativo $estaturas en orden descendente de acuerdo a la clave.

$estaturas = [
    "Juan" => 186,
    "Alberto" => 172,
    "Marta" => 173
];
ksort($estaturas, SORT_DESC);

foreach ($estaturas as $item => $value){
    echo "$item:  $value cm<br>";
}
?>