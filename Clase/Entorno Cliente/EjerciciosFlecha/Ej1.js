// // Declarando una funcion que calcule la distancia entre dos puntos
// function calcularDistancia(x1,y1,x2,y2){    
//     return (Math.sqrt(Math.pow(x2-x1,2) + Math.pow(y2-y1,2)))

// }

// // Llamar la funcion

// let distancia = calcularDistancia(0,0,12,0)
// console.log(`la distancia calculada fue ${distancia}`)

let calcularDistancia = (x1, x2, y1, y2) => Math.sqrt(Math.pow(x2-x1, 2) + Math.pow(y2-y1, 2))

console.log("La distancia calculada fue", calcularDistancia(12,25,24,67))