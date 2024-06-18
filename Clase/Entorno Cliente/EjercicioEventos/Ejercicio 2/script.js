function muestraInformacion(mensaje) {
	document.getElementById("info").innerHTML = '<h1>'+mensaje[0]+'</h1>';
	for(var i=1; i<mensaje.length; i++) {
		document.getElementById("info").innerHTML += '<p>'+mensaje[i]+'</p>';
	}
}
document.addEventListener("mousemove", function(event){
    let coordenadas = muestraPosicion(event);
    let cuadro = document.getElementById("info");

    cuadro.style.backgroundColor = "#FFFFFF";
    muestraInformacion(["Ratón", `Navegador[${coordenadas.navegador}]`,`Página[${coordenadas.pagina}]`])
})
function muestraPosicion(event){

    let pX = event.pageX;
    let pY = event.pageY;
    let cX = event.clientX;
    let cY = event.clientY;
    return {
        navegador: [cX, cY],
        pagina: [pX, pY]
    }
}

document.addEventListener("keydown", function(event){
    let tecla = event.key;
    let codigo = event.key.charCodeAt(0);
    let cuadro = document.getElementById("info");

    cuadro.style.backgroundColor = "#CCE6FF";
    muestraInformacion(["Teclado", `Carácter[${tecla}]`,`Código[${codigo}]`])
})

document.addEventListener("mousedown", function(event){
    let coordenadas = muestraPosicion(event);

    let cuadro = document.getElementById("info");

    cuadro.style.backgroundColor = "#FFFFCC";
    
    muestraInformacion(["Ratón", `Navegador[${coordenadas.navegador}]`,`Página[${coordenadas.pagina}]`])
})