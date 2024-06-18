
var tabla = document.createElement("table");
tabla.setAttribute("border",1);
var contador = 0;

window.onload = function() {

for (var i = 0; i < 100; i++) {
    var fila = document.createElement("tr");

    
    for (var j = 1; j <= 100; j++){

        var bloque = document.createElement("td");
        bloque.textContent = j + contador;

        fila.appendChild(bloque);

    }

    tabla.appendChild(fila);

    contador += 100;
    
}

document.body.appendChild(tabla);

}
    
function esCasiPrimo(num) {
    var contador = 0;

    for (var i = 1; i <= num; i++) {
        if (num % i === 0) {
            contador++;
        }
    }

    if (contador === 3) {
        return true;
    } else {
        return false;
    }
}

function marcarCasiPrimos() {
    
    var tdElements = document.querySelectorAll("table td");

    tdElements.forEach((td) => {

        var value = parseInt(td.textContent);

        if (esCasiPrimo(value)) {

            td.style.backgroundColor = "yellow";
        }
    });
}