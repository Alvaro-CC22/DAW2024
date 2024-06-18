let textoAlReves = (texto) => {
    let alReves = [];

    for(let i = texto.length - 1; i >= 0; i--){
        alReves.push(texto.charAt(i));
    }
    return alReves.join('');
}

console.log(textoAlReves("hola mundo"));