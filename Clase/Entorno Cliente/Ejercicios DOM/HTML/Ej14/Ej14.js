function ocultar(parrafo) {
    setTimeout(() => {parrafo.classList.add("oculto");}, 1);
}

function eliminar(parrafo){
    parrafo.remove();
}

function reaparecer() {
    var parrafos = document.getElementsByTagName("p");

    for (var i = 0; i < parrafos.length; i++) {
        parrafos[i].classList.remove("oculto");
    }
}