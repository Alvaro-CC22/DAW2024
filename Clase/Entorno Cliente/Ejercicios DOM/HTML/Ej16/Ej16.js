var p1 = document.createElement("p");
var p2 = document.createElement("p");
var pResultado = document.createElement("p");

var div1 = document.getElementById("primero");
var div2 = document.getElementById("segundo");
var divResultado = document.getElementById("resultado");

div1.appendChild(p1);
div2.appendChild(p2);
divResultado.appendChild(pResultado);


function genera() {
    
    var nRandom1 = Math.floor(Math.random() * 50);
    var nRandom2 = Math.floor(Math.random() * 50);

    if (p1.textContent === "" && p2.textContent === "") {

        var texto1 = document.createTextNode(nRandom1);
        var texto2 = document.createTextNode(nRandom2);

        p1.appendChild(texto1);
        p2.appendChild(texto2);

    } else if (p1.textContent === "") {

        var texto1 = document.createTextNode(nRandom1);
    
        p1.appendChild(texto1);

    } else if (p2.textContent === "") {

        var texto2 = document.createTextNode(nRandom2);

        p2.appendChild(texto2);
    }
}

function compara() {
    var numero1 = parseInt(p1.textContent);
    var numero2 = parseInt(p2.textContent);

    if (numero1 > numero2) {
        mover(p1);
        limpiarContenido(p1);
    } else if (numero1 < numero2) {
        mover(p2);
        limpiarContenido(p2);
    }
}

function limpiarContenido(elemento) {
    while (elemento.firstChild) {
        elemento.removeChild(elemento.firstChild);
    }
}

function mover(parrafo) {

    var numeroMayor = parrafo.textContent;
    var resultado = document.createTextNode(numeroMayor);

    if (pResultado.firstChild) {

        pResultado.replaceChild(resultado, pResultado.firstChild);

    } else {

        pResultado.appendChild(resultado);
    }
}