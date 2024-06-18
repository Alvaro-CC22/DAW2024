function tamanoVentanaNavegador(){
	// Adaptada de http://www.howtocreate.co.uk/tutorials/javascript/browserwindow
	var dimensiones = [];
	
	if(typeof(window.innerWidth) == 'number') {
		// No es IE
		dimensiones = [window.innerWidth, window.innerHeight];
	} else if(document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
		//IE 6 en modo estandar (no quirks)
		dimensiones = [document.documentElement.clientWidth, document.documentElement.clientHeight];
	} else if(document.body && (document.body.clientWidth || document.body.clientHeight)) {
		//IE en modo quirks
		dimensiones = [document.body.clientWidth, document.body.clientHeight];
	}
	
	return dimensiones;
}

document.addEventListener("mousedown",function(event){
    const tamanoVentana = tamanoVentanaNavegador();
    const mitadAncho = tamanoVentana[0] / 2;
    const mitadAlto = tamanoVentana[1] / 2;
    let infor;
    if(event.clientX < mitadAncho && event.clientY > mitadAlto){
        infor = "Abajo Izquierda";
    }
    else{
        if(event.clientX > mitadAncho && event.clientY > mitadAlto){
            infor = "Abajo Derecha";
        }
        else{
            if(event.clientX < mitadAncho && event.clientY < mitadAlto){
                infor = "Arriba Izquierda";
            }
            else{
                    infor = "Arriba Derecha";
            }
        }
    }
    document.getElementById("info").innerHTML = `Estas ${infor}`;
})

