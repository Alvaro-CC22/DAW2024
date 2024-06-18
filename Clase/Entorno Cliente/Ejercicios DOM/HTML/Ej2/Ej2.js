window.onload = function() {
    var enlaces = document.getElementsByTagName('a');
    console.log("Número de enlaces de la página:", enlaces.length);

    var penultimoEnlace = enlaces[enlaces.length - 2];
    console.log("Dirección a la que enlaza el penúltimo enlace:", penultimoEnlace.href);

    var enlacesPrueba = document.querySelectorAll('a[href="http://prueba"]');
    console.log("Número de enlaces que enlazan a http://prueba:", enlacesPrueba.length);

    var tercerParrafo = document.getElementsByTagName('p')[2];
    var enlacesTercerParrafo = tercerParrafo.getElementsByTagName('a');
    console.log("Número de enlaces del tercer párrafo:", enlacesTercerParrafo.length);
}