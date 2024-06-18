<?php
//Ordena alfabéticamente en orden inverso (de la Z a la A) el siguiente array:
$colores = array("rojo", "verde", "azul", "amarillo");

rsort($colores);

foreach ($colores as $value ){
    echo "$value <br>";
}
?>