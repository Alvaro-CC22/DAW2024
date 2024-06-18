window.onload = function() {
var a = document.getElementsByTagName("a");
var contador = 0;

for (var i = 0; i < a.length; i++) {

    if (a[i].href.includes("http")) {

        a[i].href = a[i].href.replace("http", "https");
    }

    if(a[i].getAttribute("class") === "importante"){
        a[i].setAttribute("name", "importante" + contador);
        contador++;
    }

}

var p = document.getElementsByTagName("p");

for (var i = 0; i < p.length; i++) {

    if (p[i].getAttribute("class") === "importante") {

        p[i].setAttribute("class", "resaltado");
    } else {

        p[i].setAttribute("class", "normal");
    }
}
}