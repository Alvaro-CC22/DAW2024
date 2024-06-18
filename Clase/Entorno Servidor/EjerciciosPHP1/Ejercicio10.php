<?php
//A partir de la variable $cadena que se muestra en el código siguiente obtén los siguientes datos:
//- Número de caracteres que almacena la cadena
//- Número de palabras que almacena la cadena
//- Devuelve la cadena escrita en mayúscula


$cadena="Esto es un string de varias palabras";
echo "Cadena original: $cadena";
echo "Esta cadena tiene ", strlen($cadena), " caracteres.<br>";
echo "Esta cadena tiene ", str_word_count($cadena,0), " palabras.<br>";
echo strtoupper($cadena);

?>