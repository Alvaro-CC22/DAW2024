let pideParametros = (...parametros)  =>{
    return parametros.length;
}

console.log(pideParametros(1,2,3,4,5,6,7));
console.log(pideParametros('array','numero','funcion'));
console.log(pideParametros('a','b','c','b'));
console.log(pideParametros());