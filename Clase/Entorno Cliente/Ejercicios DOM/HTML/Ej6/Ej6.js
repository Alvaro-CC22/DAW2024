window.onload = function() {
var P = document.getElementsByTagName("p");

var enlace = document.createElement("a");
enlace.href = 'http://www.iesromerovargas.com/';
enlace.textContent = '+ info';

P[2].appendChild(enlace);

var nuevoP = document.createElement("p");
nuevoP.textContent = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem accusantium sint rem eos, esse veniam, nam tempore tenetur soluta tempora libero expedita alias sunt sequi impedit voluptate. Fugit, recusandae ut?";
nuevoP.style.color = "red";

P[2].parentNode.insertBefore(nuevoP, P[3]);

P[1].remove();
}