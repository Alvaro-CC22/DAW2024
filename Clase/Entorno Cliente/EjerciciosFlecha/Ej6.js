// function crearAprendiz(nombre, planeta,edad,estatura,clasificarAprendiz){
//     let datosAprendiz={
//         nombre:nombre, planeta:planeta, edad:edad,estatura:estatura
        
//     }
//     clasificarAprendiz(datosAprendiz)
    
    
//     }
//     crearAprendiz('Alejo','tierra',16,1.63, function(clasifiaccion){
//         if(clasifiaccion.edad>=15){
//             console.log('Usted se va para la clase sable de luz')
//         }else{
//             console.log('Usted se va para la clase de la fuerza')
//         }
//     })

let crearAprendiz = (nombre, planeta,edad,estatura) => {
let datosAprendiz = {nombre:nombre, planeta:planeta, edad:edad, estatura:estatura}
if(datosAprendiz.edad >= 15){
    return('Usted se va para la clase sable de luz');
}
else{
    return('Usted se va para la clase sable de fuerza');
}
};

console.log(crearAprendiz('Álvaro', 'La Tierra', '22', '1.80 cm'))