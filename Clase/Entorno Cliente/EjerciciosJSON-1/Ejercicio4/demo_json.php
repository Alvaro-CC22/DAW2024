<?php
// Recibir el JSON enviado desde la página HTML
$jsonData = $_GET['x'];

// Decodificar el JSON a un array de PHP
$dataArray = json_decode($jsonData, true);

// Acceder a la propiedad 'nombre' del array
$demo = $dataArray['nombre'];

// Realizar alguna operación con el valor recibido (en este caso, simplemente mostrarlo)
echo $demo;
?>
