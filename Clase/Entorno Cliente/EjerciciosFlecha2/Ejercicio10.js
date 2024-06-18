let calculaTiempo = (velocidad, distancia) =>{
    let tiempo = distancia / velocidad;
    return tiempo
}

console.log("Vas a tardar", calculaTiempo(120, 73000));