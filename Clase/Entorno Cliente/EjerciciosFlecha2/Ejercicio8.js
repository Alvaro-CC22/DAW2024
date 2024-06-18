let empleados = [
    { nombre: "Carlos", sueldo: 2014 },
    { nombre: "María", sueldo: 4255 },
    { nombre: "Marta", sueldo: 1952 },
    { nombre: "Julián", sueldo: 1596 },
    { nombre: "Mauricio", sueldo: 2500 },
    { nombre: "Carla", sueldo: 3120 },
    { nombre: "Jose", sueldo: 3863 },
    { nombre: "Antonio", sueldo: 2516 }
];

let empleadoMasGana = empleados[0];
empleados.forEach(empleado => {
    if(empleado.sueldo > empleadoMasGana.sueldo){
        empleadoMasGana = empleado;
    }
        
});
console.log(`${empleadoMasGana.nombre} es el empleado con el sueldo mas alto con ${empleadoMasGana.sueldo}€`);