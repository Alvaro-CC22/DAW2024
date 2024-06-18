<?php
//Recorre el array asociativo estaturas y muestra los pares clave/valor.

$estaturas = [
    "Juan" => 186,
    "Alberto" => 172,
    "Marta" => 173
];

foreach ($estaturas as $item => $value){
    echo "$item:  $value cm<br>";
}
?>