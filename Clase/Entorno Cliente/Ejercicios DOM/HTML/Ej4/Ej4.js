function anade() {
    var lista = document.getElementById('lista');

    var nuevoElemento = document.createElement('li');

    var contenido = document.createTextNode('Nuevo elemento');

    nuevoElemento.appendChild(contenido);

    lista.appendChild(nuevoElemento);
}