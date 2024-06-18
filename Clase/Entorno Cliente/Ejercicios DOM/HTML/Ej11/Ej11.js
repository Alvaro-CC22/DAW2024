function nuevoNum() {
    
    var nRandom = Math.floor(Math.random() * 1001);

    var lista = document.getElementById("lista");

    var nuevoEle = document.createElement("li");
    var textoEle = document.createTextNode(nRandom);

    nuevoEle.appendChild(textoEle);
    lista.appendChild(nuevoEle);
}