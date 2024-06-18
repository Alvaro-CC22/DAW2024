<?php
// Escribe un programa que resuelva ecuaciones de segundo grado (ax2 + bx + c = 0). Si la ecuación
//no tiene soluciones reales, hay que mostrar un mensaje de error. Usa funciones para ello. La función
//recibirá los coeficientes de la ecuación y devolverá un array con las soluciones reales. Si no hay
//soluciones devolverá false

$a = 1;

$b = 2;

$c = 2;

$calculo = ($b*$b)-(4*$a*$c);
if($a == 0){
    echo "Error. No tiene solución.";
    
}
else{
    if($calculo < 0){
        echo "Error. No tiene solución.";
    }
    else{
        $x = ((-$b) - sqrt($calculo)) / (2*$a);
        $x2 = ((-$b) + sqrt($calculo)) / (2*$a);
        echo $x, "<br>", $x2;
    }
}
?>